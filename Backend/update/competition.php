<?php
function competition_update($con,$params){
	var_dump($params);
	if(count($params[4]) != 0){
		echo "string";
		competition_update_matches($con,$params);
	}
	elseif ($params[5] == 'swiss') {
		competition_next_day($con,$params);
	}
};

function competition_update_matches($con,$params){
	mysqli_set_charset($con,'utf8');

	$request = 'http://web.cyanide-studio.com/ws/bb2/contests/?key='.$params[0].'&league='.urlencode($params[1]).'&competition='.urlencode($params[2]).'&status=played';
	$response  = file_get_contents($request);
	$played = json_decode($response);

	foreach ($played->upcoming_matches as $game) {
		var_dump($game->contest_id);
		if(in_array($game->contest_id, $params[3])){

			$request_2 = 'http://web.cyanide-studio.com/ws/bb2/match/?key='.$params[0].'&uuid='.$game->match_uuid;
			$response_2  = file_get_contents($request_2);
			$json_2 = str_replace("\\","\\\\",$response_2);
			$game_details = json_decode($response_2);

			//Save match
			$sql_match = "UPDATE site_matchs SET
				cyanide_id = '".$game_details->uuid."',
				started = '".$game_details->match->started."',
				score_1 = '".$game_details->match->teams[0]->score."',
				nbsupporters_1 = '".$game_details->match->teams[0]->nbsupporters."',
				possessionball_1 = '".$game_details->match->teams[0]->possessionball."',
				occupationown_1 = '".$game_details->match->teams[0]->occupationown."',
				occupationtheir_1 = '".$game_details->match->teams[0]->occupationtheir."',
				sustainedcasualties_1 = '".$game_details->match->teams[0]->sustainedcasualties."',
				sustainedko_1 = '".$game_details->match->teams[0]->sustainedko."',
				sustainedinjuries_1 = '".$game_details->match->teams[0]->sustainedinjuries."',
				sustaineddead_1 = '".$game_details->match->teams[0]->sustaineddead."',
				score_2 = '".$game_details->match->teams[1]->score."',
				nbsupporters_2 = '".$game_details->match->teams[1]->nbsupporters."',
				possessionball_2 = '".$game_details->match->teams[1]->possessionball."',
				occupationown_2 = '".$game_details->match->teams[1]->occupationown."',
				occupationtheir_2 = '".$game_details->match->teams[1]->occupationtheir."',
				sustainedcasualties_2 = '".$game_details->match->teams[1]->sustainedcasualties."',
				sustainedko_2 = '".$game_details->match->teams[1]->sustainedko."',
				sustainedinjuries_2 = '".$game_details->match->teams[1]->sustainedinjuries."',
				sustaineddead_2 = '".$game_details->match->teams[1]->sustaineddead."',
				json = '".str_replace("'","\'",$json_2)."'
				WHERE contest_id=".$game->contest_id;
				echo $sql_match."/r/n";
			$con->query($sql_match);

			$match = $game_details->match;
			foreach ($match->teams as $team){
				$team_param = array($params[0],$team->idteamlisting);

				//update team
				$team_bbbl_id = team_update($con,$team_param);
				//add stats
				foreach ($team->roster as $player) {
					if($player->id) {
						$player_bbbl = $con->query("SELECT id FROM site_players WHERE cyanide_id = ".$player->id)->fetch_row();
					}
					else {
						$player_bbbl = $con->query("SELECT id FROM site_players WHERE name='".str_replace("'","\'",$player->name)."' AND team_id = ".$team_bbbl_id)->fetch_row();
					}

					$match_bbbl = $con->query("SELECT id FROM site_matchs WHERE cyanide_id = '".$game_details->uuid."'")->fetch_row();

					//Save players stats
					if($player_bbbl[0]){

						$sql_player_stats = "INSERT INTO site_players_stats (player_id, match_id, matchplayed, mvp, inflictedpasses, inflictedcatches, inflictedinterceptions, inflictedtouchdowns, inflictedcasualties, inflictedstuns, inflictedko, inflictedinjuries, inflicteddead, inflictedtackles, inflictedmeterspassing, inflictedmetersrunning, sustainedinterceptions, sustainedcasualties, sustainedstuns, sustainedko, sustainedinjuries, sustainedtackles, sustaineddead)
						VALUES (".$player_bbbl[0].",".$match_bbbl[0].",".$player->matchplayed.",".$player->mvp.",".$player->stats->inflictedpasses.",".$player->stats->inflictedcatches.",".$player->stats->inflictedinterceptions.",".$player->stats->inflictedtouchdowns.",".$player->stats->inflictedcasualties.",".$player->stats->inflictedstuns.",".$player->stats->inflictedko.",".$player->stats->inflictedinjuries.",".$player->stats->inflicteddead.",".$player->stats->inflictedtackles.",".$player->stats->inflictedmeterspassing.",".$player->stats->inflictedmetersrunning.",".$player->stats->sustainedinterceptions.",".$player->stats->sustainedcasualties.",".$player->stats->sustainedstuns.",".$player->stats->sustainedko.",".$player->stats->sustainedinjuries.",".$player->stats->sustainedtackles.",".$player->stats->sustaineddead.")";

						$con->query($sql_player_stats);
					}
				};
			};
		}

	}

	payment($con, $params[3]);

};

function competition_next_day($con,$params){

	$request = "http://web.cyanide-studio.com/ws/bb2/contests/?key=".$params[0]."&league=".urlencode($params[1])."&competition=".urlencode($params[2])."&exact=1&status=scheduled&round=".$params[6];
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
		echo $sqlMatch;
		$con->query($sqlMatch);
	}

};

?>
