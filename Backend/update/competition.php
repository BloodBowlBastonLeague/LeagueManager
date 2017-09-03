<?php
function competition_update($con,$params){
	mysqli_set_charset($con,'utf8');

	$request = 'http://web.cyanide-studio.com/ws/bb2/contests/?key='.$params[0].'&competition='.urlencode($params[1]).'&status=played&league=BBBL';
	$response  = file_get_contents($request);
	$played = json_decode($response);

	foreach ($played->upcoming_matches as $game) {

		if(in_array($game->contest_id, $params[2])){


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

	payment($con, $params[1]);

};
?>
