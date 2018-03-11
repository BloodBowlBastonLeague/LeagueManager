<?php
//Get all competitions
function competition_fetch_all($con,$active){

    $competitions = [];
    $sql = "SELECT id FROM site_competitions WHERE active=".$active." ORDER BY started DESC";
    $result = $con->query($sql);

    while( $ids = $result->fetch_row()){
      $competition = competition_fetch($con, $ids[0]);
      array_push($competitions, $competition);
    }

    return $competitions;
};

//Get competition
function competition_fetch($con, $id){

    $sql = "SELECT c.id, c.competition_id_parent, c.league_name AS division, c.game, c.pool, c.site_name, c.site_order, c.season, c.active, c.competition_mode, c.game_name, c.champion, c.param_name_format AS format, (SELECT COUNT(*) FROM site_matchs WHERE competition_id=".$id." AND cyanide_id IS NULL) AS matchesLeft FROM site_competitions AS c  WHERE c.id = ".$id;
    $result = $con->query($sql);
    $competition = $result->fetch_object();

    if($competition->competition_mode!='Sponsors'){
        $competition->standing = competition_standing($con, $id);
    }
    else{
        $competition->standing = sponsors_standing($con, $id);
    };
    return $competition;

};

//Get competition standing
function competition_standing($con, $id){
    $standing = [];
    $sqlStanding = 'SELECT
          id,
          cyanide_id,
          logo,
          team,
          color_1,
          color_2,
          coach,
          COUNT(case when score_1 > score_2 then 1 end) AS V,
          COUNT(case when score_1 = score_2 then 1 end) AS N,
          COUNT(case when score_2 > score_1 then 1 end) AS D,
          SUM(score_1) AS TDfor,
          SUM(score_1) - SUM(score_2) AS TD,
          SUM(sustainedcasualties_2 ) - SUM(sustainedcasualties_1) AS S,
          SUM( case when score_1 > score_2 then 3 else 0 end
              + case when score_1 = score_2 AND score_1 IS NOT NULL then 1 else 0 end
          ) AS Pts,
          SUM(score_1) - SUM(score_2) + SUM(sustainedcasualties_2 ) - SUM(sustainedcasualties_1) AS TDS,
          0 AS confrontation
          FROM (
          SELECT site_matchs.id AS m, site_teams.id AS id, site_teams.cyanide_id AS cyanide_id, site_teams.logo AS logo, site_teams.name AS team, site_teams.color_1 AS color_1, site_teams.color_2 AS color_2, site_coachs.name AS coach, score_1, score_2, sustainedcasualties_1, sustainedcasualties_2, sustaineddead_1, sustaineddead_2 FROM site_matchs
          LEFT JOIN site_teams ON site_teams.id=site_matchs.team_id_1
          INNER JOIN site_coachs ON site_coachs.id=site_teams.coach_id
          WHERE competition_id = '.$id.'
          UNION
          SELECT site_matchs.id AS m, site_teams.id AS id, site_teams.cyanide_id AS cyanide_id, site_teams.logo AS logo, site_teams.name AS team, site_teams.color_1 AS color_1, site_teams.color_2 AS color_2, site_coachs.name AS coach, score_2, score_1, sustainedcasualties_2, sustainedcasualties_1, sustaineddead_2, sustaineddead_1 FROM site_matchs
          LEFT JOIN site_teams ON site_teams.id=site_matchs.team_id_2
          INNER JOIN site_coachs ON site_coachs.id=site_teams.coach_id
          WHERE competition_id='.$id.'
          ) AS a
          WHERE LENGTH(coach)>0
          GROUP BY id
          ORDER BY Pts DESC, V DESC, TDS DESC';

    $resultStanding = $con->query($sqlStanding);
    while($dataStanding = $resultStanding->fetch_assoc()) {
        array_push($standing, $dataStanding);
    }

    //Managing exaequo
    $limit = count($competition->standing);
    for($i = 0; $i <= $limit-1; $i++) {
        if ( $competition->standing[$i][Pts] == $competition->standing[$i-1][Pts] ) {
            $sqlConfrontation = 'SELECT
            case when score_1 > score_2 then 2 else case when score_1 = score_2 AND score_1 IS NOT NULL then 1 else 0 end end
            FROM (
            SELECT site_teams.id, score_1, score_2 FROM site_matchs
            LEFT JOIN site_teams ON site_teams.id=site_matchs.team_id_1
            INNER JOIN site_coachs ON site_coachs.id=site_teams.coach_id
            WHERE competition_id = '.$competition->id.' AND site_matchs.team_id_1 = '.$competition->standing[$i][id].' AND site_matchs.team_id_2 = '.$competition->standing[$i-1][id].'
            UNION
            SELECT site_teams.id, score_2, score_1 FROM site_matchs
            LEFT JOIN site_teams ON site_teams.id=site_matchs.team_id_2
            INNER JOIN site_coachs ON site_coachs.id=site_teams.coach_id
            WHERE competition_id='.$competition->id.' AND site_matchs.team_id_2 = '.$competition->standing[$i][id].' AND site_matchs.team_id_1 = '.$competition->standing[$i-1][id].'
            ) AS a
            GROUP BY id';
            $result = $con->query($sqlConfrontation);
            $row = $result->fetch_row();
        }
        else{
            $row = [1];
        }
      $standing[$i]['confrontation'] = $row[0];
    }
    return $standing;

};

//Get competition statistics
function competition_stats($con,$competition){
    //Leaderboard
    $competition->playersStats = [];

    $stats = ['scorer','thrower','tackler','killer','intercepter','catcher','punchingball'];
    foreach($stats as $stat){
        array_push($competition->playersStats, leaders($con,[$stat,$competition->id]));
    }
    return $competition;
};

//Update Competition
function competition_update($con,$params){
    if(count($params[4]) != 0){
        competition_update_matches($con,$params);
    }
    elseif ($params[5] == 'swiss') {
        competition_next_day($con,$params);
    }
};

//Update matches
function competition_update_matches($con,$params){
    $request = 'http://web.cyanide-studio.com/ws/bb2/contests/?key='.$params[0].'&league='.urlencode($params[1]).'&competition='.urlencode($params[2]).'&status=played&round='.$params[6];
    $response  = file_get_contents($request);
    $played = json_decode($response);

    foreach ($played->upcoming_matches as $game) {
        if(in_array($game->contest_id, $params[4])){
            match_save($con, $params[0], [$game->match_uuid,$game->contest_id], 0);
        }
    }

    payment($con, $params[3]);

};

//Swiss format insert next day
function competition_next_day($con,$params){

    $nextRound = $params[6]+1;
    $request = "http://web.cyanide-studio.com/ws/bb2/contests/?key=".$params[0]."&league=".urlencode($params[1])."&competition=".urlencode($params[2])."&exact=1&status=scheduled&round=".$nextRound;
    $response  = file_get_contents($request);
    $schedule = json_decode($response);

    //Saving matches
    foreach ($schedule->upcoming_matches as $match) {
        $teams = [];
        foreach ($match->opponents as $key=>$opponent) {
          $sqlTeam = "SELECT id FROM site_teams WHERE cyanide_id = '".$opponent->team->id."'";
          $resultTeam = $con->query($sqlTeam);
          $team = $resultTeam->fetch_row();
          if ( $team[0] == 0){
              $sqlTeam= "INSERT INTO site_teams ( name, cyanide_id, coach_id, active, value, leitmotiv, logo)
              VALUES ('".str_replace("'","\'",$opponent->team->name)."',  '".$opponent->team->id."',  '".$coach_id."', '1','".$opponent->team->value."','".str_replace("'","\'",$opponent->team->motto)."', '".$opponent->team->logo."')";
              $con->query($sqlTeam);
              $teams[$key] = $con->insert_id;
          }
          else {
              $sqlTeam = "UPDATE site_teams SET active=1 WHERE cyanide_id=".$opponent->team->id;
              $con->query($sqlTeam);
              $teams[$key] = $team[0];
          };
      }

      $sqlMatch = "INSERT INTO site_matchs (contest_id, competition_id, round, team_id_1, team_id_2)
      VALUES (".$match->contest_id.",".$params[3].",".$match->round.",".$teams[0].",".$teams[1].")";
      $con->query($sqlMatch);
    }

};

?>
