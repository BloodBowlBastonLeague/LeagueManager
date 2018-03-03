<?php

//Fetch team info
function team_fetch($con,$id){

    //Get team info
    $sqlTeam = "SELECT * FROM site_teams WHERE id=".$id;
    $resultTeam = $con->query($sqlTeam);
    $team = $resultTeam->fetch_object();

    //Get current competition
    $sqlCompetition = "SELECT MAX(m.competition_id) AS id, c.game_name AS name FROM site_matchs AS m INNER JOIN site_competitions AS c ON c.id = m.competition_id WHERE (m.team_id_1=".$id." OR m.team_id_2=".$id.") LIMIT 1";
    $resultCompetition = $con->query($sqlCompetition);
    $competition = $resultCompetition->fetch_object();
    $team->competition = $competition;

    //Get players
    $players = [];
    $sqlPlayers = "SELECT id, name, param_name_type AS position, attributes, skills, casualties, level, xp, dead, fired   FROM site_players WHERE team_id=".$id;
    $resultPlayers = $con->query($sqlPlayers);
    while($dataPlayers = $resultPlayers->fetch_assoc()) {

        $sqlStats = "SELECT SUM(matchplayed) AS matchplayed, SUM(mvp) AS mvp, SUM(inflictedpasses) AS inflictedpasses, SUM(inflictedcatches) AS inflictedcatches, SUM(inflictedinterceptions) AS inflictedinterceptions, SUM(inflictedtouchdowns) AS inflictedtouchdowns, SUM(inflictedcasualties) AS inflictedcasualties, SUM(inflictedstuns) AS inflictedstuns, SUM(inflictedko) AS inflictedko, SUM(inflictedinjuries) AS inflictedinjuries, SUM(inflicteddead) AS inflicteddead, SUM(inflictedtackles) AS inflictedtackles, SUM(inflictedmeterspassing) AS inflictedmeterspassing, SUM(inflictedmetersrunning) AS inflictedmetersrunning, SUM(sustainedinterceptions) AS sustainedinterceptions, SUM(sustainedcasualties) AS sustainedcasualties, SUM(sustainedstuns) AS sustainedstuns, SUM(sustainedko) AS sustainedko, SUM(sustainedinjuries) AS sustainedinjuries, SUM(sustainedtackles) AS sustainedtackles, sustaineddead FROM site_players_stats WHERE player_id=".$dataPlayers[id]." GROUP BY player_id";
        $resultStats = $con->query($sqlStats);
        $stats = $resultStats->fetch_object();

        $dataPlayers[stats] = $Stats;
        array_push($players, $dataPlayers);
    }
    $team->players = $players;

    //Get coach
    $sqlCoach = 'SELECT name FROM site_coachs WHERE id='.$team->coach_id;
    $resultCoach = $con->query($sqlCoach);
    $coach = $resultCoach->fetch_row();
    $team->coach = $coach[0];

};

//Update team info
function team_update($con,$params){

    $request = 'http://web.cyanide-studio.com/ws/bb2/team/?key='.$params[0].'&id='.$params[1];
    $response  = file_get_contents($request);
    $json = json_decode($response);
    $team = $json->team;
    $roster = $json->roster;

    //Get current DB info
    $team_bbbl = $con->query("SELECT id FROM site_teams WHERE cyanide_id = ".$team->id)->fetch_row();
    $players_control = [];
    $players_control_query = $con->query("SELECT id FROM site_players WHERE cyanide_id IS NOT NULL AND dead != 1 AND fired != 1 AND team_id = ".$team_bbbl[0]);
    while($row = $players_control_query->fetch_array(MYSQLI_NUM)){
    $players_control[] = $row[0];
    };

    //Update team info
    $sql_team = "UPDATE site_teams SET
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
    $con->query($sql_team);

    foreach ( $roster as $player ) {
        //Save players
        $sqlPlayerID = "SELECT id FROM site_players WHERE name='".str_replace("'","\'",$player->name)."' AND team_id = ".$team_bbbl[0];
        $resultPlayerID = $con->query($sqlPlayerID);
        $playerID = $resultPlayerID->fetch_row();
        //Update
        if ( $playerID[0] > 0 ){
            $sqlUpdatePlayer = "UPDATE site_players SET
              cyanide_id = ".$player->id.",
              level = ".$player->level.",
              xp = CASE WHEN ".$player->xp." > 0 THEN ".$player->xp." ELSE xp END,
              attributes = '".json_encode($player->attributes)."',
              skills = '".json_encode($player->skills)."',
              casualties = '".json_encode($player->casualties_state)."',
              dead = IFNULL('".$player->stats->sustaineddead."',0)
              WHERE id = ".$playerID[0];
            $con->query($sqlUpdatePlayer);
            $playersControl = array_diff($playersControl, array($playerID[0]));
        }
        //Create
        else {
            if( $player->id ){
                $sql_player = "INSERT INTO site_players (cyanide_id, team_id, param_name_type, name, level, xp, attributes, skills, dead, casualties)
                VALUES (".$player->id.",".$team_bbbl[0].",'".$player->type."','".str_replace("'","\'",$player->name)."',".$player->level.",".$player->xp.",'".json_encode($player->attributes)."','".json_encode($player->skills)."',0,'".json_encode($player->casualties_state)."')";
                $con->query($sql_player);
            }
        };
    }

    //Update fired/sold players
    foreach ( $players_control as $player ){
        $sql_fired = "UPDATE site_players SET fired = 1 WHERE id=".$player;
        $con->query($sql_fired);
    }

    //managing old teams
    $sql_fired = "UPDATE site_players SET fired = 1 WHERE team_id = ".$team_bbbl[0]." AND cyanide_id IS NULL";
    $con->query($sql_fired);

    return $team_bbbl[0];
};

?>
