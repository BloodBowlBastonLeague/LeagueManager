<?php

//Fetch team info
function team_fetch($con,$id){

    //Get team info
    $sqlTeam = "SELECT * FROM site_teams WHERE cyanide_id=".$id;
    $resultTeam = $con->query($sqlTeam);
    $team = $resultTeam->fetch_object();

    //Get current competition
    $sqlCompetition = "SELECT MAX(m.competition_id) AS id, c.game_name AS name FROM site_matchs AS m INNER JOIN site_competitions AS c ON c.id = m.competition_id WHERE (m.team_id_1=".$team->id." OR m.team_id_2=".$team->id.") LIMIT 1";
    $resultCompetition = $con->query($sqlCompetition);
    $competition = $resultCompetition->fetch_object();
    $team->competition = $competition;

    //Get players
    $players = [];
    $sqlPlayers = "SELECT id, name, param_name_type AS position, attributes, skills, casualties, level, xp, dead, fired FROM site_players WHERE team_id=".$team->id;
    $resultPlayers = $con->query($sqlPlayers);
    while($dataPlayers = $resultPlayers->fetch_object()) {
        $sqlStats = "SELECT SUM(matchplayed) AS matchplayed, SUM(mvp) AS mvp, SUM(inflictedpasses) AS inflictedpasses, SUM(inflictedcatches) AS inflictedcatches, SUM(inflictedinterceptions) AS inflictedinterceptions, SUM(inflictedtouchdowns) AS inflictedtouchdowns, SUM(inflictedcasualties) AS inflictedcasualties, SUM(inflictedstuns) AS inflictedstuns, SUM(inflictedko) AS inflictedko, SUM(inflictedinjuries) AS inflictedinjuries, SUM(inflicteddead) AS inflicteddead, SUM(inflictedtackles) AS inflictedtackles, SUM(inflictedmeterspassing) AS inflictedmeterspassing, SUM(inflictedmetersrunning) AS inflictedmetersrunning, SUM(sustainedinterceptions) AS sustainedinterceptions, SUM(sustainedcasualties) AS sustainedcasualties, SUM(sustainedstuns) AS sustainedstuns, SUM(sustainedko) AS sustainedko, SUM(sustainedinjuries) AS sustainedinjuries, SUM(sustainedtackles) AS sustainedtackles, sustaineddead FROM site_players_stats WHERE player_id=".$dataPlayers->id." GROUP BY player_id";
        $resultStats = $con->query($sqlStats);
        $stats = $resultStats->fetch_object();

        $dataPlayers->stats = $stats;

        array_push($players, $dataPlayers);

    }
    $team->players = $players;

    //Get coach
    $sqlCoach = 'SELECT name FROM site_coachs WHERE id='.$team->coach_id;
    $resultCoach = $con->query($sqlCoach);
    $coach = $resultCoach->fetch_row();
    $team->coach = $coach[0];

    echo json_encode($team,JSON_NUMERIC_CHECK);


};

//Create new team
function team_create($con, $Cyanide_Key, $id){
    $request = 'http://web.cyanide-studio.com/ws/bb2/team/?key='.$Cyanide_Key.'&id='.$id;
    $response  = file_get_contents($request);
    $json = json_decode($response);
    $team = $json->team;
    $roster = $json->roster;

    $sqlCreate = "INSERT INTO site_teams ( name, cyanide_id, coach_id, param_id_race, active, apothecary, assistantcoaches,  cheerleaders, cash, rerolls, popularity, value, stadiumname, stadium_level, leitmotiv, logo, json)
    VALUES ('".str_replace("'","\'",$team->name)."', '".$team->cyanide_id."', '".$team->coach_id."', '".$team->idraces."', '1', '".$team->apothecary."', '".$team->assistantcoaches."', '".$team->cheerleaders."', '".$team->cash."', '".$team->rerolls."', '".$team->popularity."', '".$team->value."', '".str_replace("'","\'",$team->stadiumname)."', ".$team->stadiumlevel.", '".str_replace("'","\'",$team->leitmotiv)."', '".$team->logo."',  '".$team->json."')";
    $con->query($sqlCreate);

    team_roster($con, $team->id, $roster);

};

//Update team
function team_update($con, $Cyanide_Key, $id){

    $request = 'http://web.cyanide-studio.com/ws/bb2/team/?key='.$Cyanide_Key.'&id='.$id;
    $response  = file_get_contents($request);
    $json = json_decode($response);
    $team = $json->team;
    $roster = $json->roster;

    //Update team info
    $sqlTeam = "UPDATE site_teams SET
      param_id_race = ".$team->idraces.",
      apothecary = ".$team->apothecary.",
      assistantcoaches = ".$team->assistantcoaches.",
      cheerleaders = ".$team->cheerleaders.",
      cash = '".$team->cash."',
      rerolls = '".$team->rerolls."',
      popularity = ".$team->popularity.",
      value = ".$team->value.",
      stadium_level = ".$team->stadiumlevel.",
      leitmotiv = '".str_replace("'","\'",$team->leitmotiv)."'
      WHERE cyanide_id = '".$team->id."'";
    $con->query($sqlTeam);

    team_roster($con, $team->id, $roster);

};

//Update roster
function team_roster($con, $teamID, $roster){
    //Get current roster and store it to control players to remove
    $teamBBBL = $con->query("SELECT id FROM site_teams WHERE cyanide_id = ".$teamID)->fetch_row();
    $rosterControl = [];
    $sqlRosterControl = $con->query("SELECT cyanide_id FROM site_players WHERE dead != 1 AND fired != 1 AND team_id = ".$teamBBBL[0]);
    while($row = $sqlRosterControl->fetch_array(MYSQLI_NUM)){
        array_push($rosterControl, (int) $row[0]);
    };

    foreach ( $roster as $player ) {
        $sqlPlayerBBBL = "SELECT id FROM site_players WHERE cyanide_id = ".$player->id;
        $resultPlayerBBBL = $con->query($sqlPlayerBBBL);
        $playerBBBL = $resultPlayerBBBL->fetch_row();
        //Update
        if ( $playerBBBL[0] > 0 ){
            player_update($con, $teamBBBL[0], $teamID, $player);
            //Remove player from control
            $rosterControl = array_diff($rosterControl, [(int) $player->id]);
        }
        //Create
        else {
            player_create($con, $teamBBBL[0], $teamID, $player);
        };
    };

    //Update fired/sold players
    foreach ( $rosterControl as $player ){
        player_fire($con, $player);
    };
};

?>
