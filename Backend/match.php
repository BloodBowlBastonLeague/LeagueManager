<?php

//Retrieve match info
function match_fetch($con,$id){
    mysqli_set_charset($con,'utf8');

    $sqlMatch = "SELECT site_matchs.cyanide_id,
          site_matchs.contest_id,
          site_matchs.competition_id,
          site_matchs.forum_url,
          site_matchs.stadium,
          site_matchs.round,
          DATE_ADD(site_matchs.started, INTERVAL 500 YEAR) AS started,
          site_matchs.json,
          site_matchs.team_id_1,
          site_matchs.team_id_2,
          t1.name AS team_1_name,
          t2.name AS team_2_name,
          t1.logo AS team_1_logo,
          t2.logo AS team_2_logo,
          t1.color_1 AS team_1_color_1,
          t1.color_2 AS team_1_color_2,
          t2.color_1 AS team_2_color_1,
          t2.color_2 AS team_2_color_2,
          t1.coach_id AS coach_id_1,
          t2.coach_id AS coach_id_2
          FROM site_matchs
          LEFT JOIN site_teams as t1 ON t1.id=site_matchs.team_id_1
          LEFT JOIN site_teams as t2 ON t2.id=site_matchs.team_id_2
          LEFT JOIN site_coachs as c1 ON c1.id=t1.coach_id
          LEFT JOIN site_coachs as c2 ON c2.id=t2.coach_id
          WHERE site_matchs.id=".$id;

    $resultMatch = $con->query($sqlMatch);
    $match = $resultMatch->fetch_object();


    $match->bets = [];
    $sqlBets = "SELECT p.match_id, m.score_1, m.score_2, p.team_score_1, p.team_score_2, c.name FROM site_matchs AS m, site_bets AS p, site_coachs AS c WHERE c.id=p.coach_id AND p.match_id=m.id AND match_id=".$id;
    $resultBets = $con->query($sqlBets);

    while($dataBets = $resultBets->fetch_assoc()) {
        array_push($match->bets, $dataBets);

    };

    echo json_encode($match);

};

//Set date
function match_set_date($con, $params){
    mysqli_set_charset($con,'utf8');
    $sqlMatch = "UPDATE site_matchs SET started = str_to_date('".$params->started."','%d/%m/%Y %H:%i') WHERE id=".$params->id;
    $con->query($sqlMatch);
    $con->close();
};

//Save match
function match_save($con, $Cyanide_Key, $params, $reset){

    $request = 'http://web.cyanide-studio.com/ws/bb2/match/?key='.$Cyanide_Key.'&uuid='.$params[0];
    $response  = file_get_contents($request);
    $json = str_replace("\\","\\\\",$response);
    $matchDetails = json_decode($response);

    //Save match
    $sqlMatch = "UPDATE site_matchs SET
      cyanide_id = '".$matchDetails->uuid."',
      started = '".$matchDetails->match->started."',
      score_1 = '".$matchDetails->match->teams[0]->score."',
      nbsupporters_1 = '".$matchDetails->match->teams[0]->nbsupporters."',
      possessionball_1 = '".$matchDetails->match->teams[0]->possessionball."',
      occupationown_1 = '".$matchDetails->match->teams[0]->occupationown."',
      occupationtheir_1 = '".$matchDetails->match->teams[0]->occupationtheir."',
      sustainedcasualties_1 = '".$matchDetails->match->teams[0]->sustainedcasualties."',
      sustainedko_1 = '".$matchDetails->match->teams[0]->sustainedko."',
      sustainedinjuries_1 = '".$matchDetails->match->teams[0]->sustainedinjuries."',
      sustaineddead_1 = '".$matchDetails->match->teams[0]->sustaineddead."',
      score_2 = '".$matchDetails->match->teams[1]->score."',
      nbsupporters_2 = '".$matchDetails->match->teams[1]->nbsupporters."',
      possessionball_2 = '".$matchDetails->match->teams[1]->possessionball."',
      occupationown_2 = '".$matchDetails->match->teams[1]->occupationown."',
      occupationtheir_2 = '".$matchDetails->match->teams[1]->occupationtheir."',
      sustainedcasualties_2 = '".$matchDetails->match->teams[1]->sustainedcasualties."',
      sustainedko_2 = '".$matchDetails->match->teams[1]->sustainedko."',
      sustainedinjuries_2 = '".$matchDetails->match->teams[1]->sustainedinjuries."',
      sustaineddead_2 = '".$matchDetails->match->teams[1]->sustaineddead."',
      json = '".str_replace("'","\'",$json)."'
      WHERE contest_id=".$params[1];
    $con->query($sqlMatch);

    if($reset == 1){
        $con->query("DELETE FROM site_players_stats WHERE cyanide_id_match='".$matchDetails->uuid."'");
    };

    foreach ($matchDetails->match->teams as $team){
        //update team
        $teamBBBL = team_update($con, $Cyanide_Key, $team->idteamlisting);
        //add players stats
        foreach ($team->roster as $player) {
            if($player->id){
                player_stats_save($con, $player, $matchDetails->uuid);
            }
        };
    };
};
?>
