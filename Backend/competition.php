<?php
function competition_fetch_all($con){

    $sql = "SELECT id FROM site_competitions WHERE active=1";
    $result = $con->query($sql);
    $ids = $result->fetch_row();

    $competitions = [];

    foreach ($ids as $id) {
        $competition = competition_fetch($con, $id);
        array_push($competitions, $competition);
    }
    echo json_encode($competitions);
    die();
};


function competition_fetch($con, $id){

    $sql = "SELECT c.id, c.league_name AS division, c.game, c.pool, c.site_name, c.site_order, c.season, c.active, c.competition_mode, c.game_name, c.champion  FROM site_competitions AS c  WHERE c.id = ".$id;
    $result = $con->query($sql);
    $competition = $result->fetch_object();

    //Standing
    $competition->standing = [];
    $sqlStanding = 'SELECT
          id,
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
          SELECT site_matchs.id AS m, site_teams.id AS id, site_teams.logo AS logo, site_teams.name AS team, site_teams.color_1 AS color_1, site_teams.color_2 AS color_2, site_coachs.name AS coach, score_1, score_2, sustainedcasualties_1, sustainedcasualties_2, sustaineddead_1, sustaineddead_2 FROM site_matchs
          LEFT JOIN site_teams ON site_teams.id=site_matchs.team_id_1
          INNER JOIN site_coachs ON site_coachs.id=site_teams.coach_id
          WHERE competition_id = '.$competition->id.'
          UNION
          SELECT site_matchs.id AS m, site_teams.id AS id, site_teams.logo AS logo, site_teams.name AS team, site_teams.color_1 AS color_1, site_teams.color_2 AS color_2, site_coachs.name AS coach, score_2, score_1, sustainedcasualties_2, sustainedcasualties_1, sustaineddead_2, sustaineddead_1 FROM site_matchs
          LEFT JOIN site_teams ON site_teams.id=site_matchs.team_id_2
          INNER JOIN site_coachs ON site_coachs.id=site_teams.coach_id
          WHERE competition_id='.$competition->id.'
          ) AS a
          GROUP BY id
          ORDER BY Pts DESC, V DESC, TDS DESC';

    $resultStanding = $con->query($sqlStanding);
    while($dataStanding = $resultStanding->fetch_assoc()) {
      array_push($competition->standing, $dataStanding);
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
      $competition->standing[$i]['confrontation'] = $row[0];

    }

    return $competition;
    /*
    //Leaderboard
    $competition->playersStats = [];

    $stats = ['scorer','thrower','tackler','killer','intercepter','catcher','punchingball'];
    foreach($stats as $stat){
        array_push($competition->playersStats, leaders($con,[$stat,$competition->id]));
    }

    echo json_encode($competition,JSON_NUMERIC_CHECK);*/
};

function competition_stats($con,$competition){
  //Leaderboard
  $competition->playersStats = [];

  $stats = ['scorer','thrower','tackler','killer','intercepter','catcher','punchingball'];
  foreach($stats as $stat){
      array_push($competition->playersStats, leaders($con,[$stat,$competition->id]));
  }
  return $competition;
};


?>
