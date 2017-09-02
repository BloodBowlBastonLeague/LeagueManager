<?php
//Update team info
function team_update($con,$params){

	$request = 'http://web.cyanide-studio.com/ws/bb2/team/?key='.$params[0].'&id='.$params[1];
	$response  = file_get_contents($request);
	$json = json_decode($response);
	$team = $json->team;
	$roster = $json->roster;

	mysqli_set_charset($con,'utf8');
	//Get current DB info
	$team_bbbl = $con->query("SELECT id FROM site_teams WHERE cyanide_id = ".$team->id)->fetch_row();
	$players_control = [];
	$players_control_query = $con->query("SELECT id FROM site_players WHERE cyanide_id IS NOT NULL AND dead != 1 AND fired != 1 AND team_id = ".$team_bbbl[0]);
	while($row = $players_control_query->fetch_array(MYSQLI_NUM)){
		$players_control[] = $row[0];
	};

	//Update team info
	$sql_team = "UPDATE site_teams SET
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
			$player_bbbl_query = $con->query("SELECT id FROM site_players WHERE name='".str_replace("'","\'",$player->name)."' AND team_id = ".$team_bbbl[0]);
			$player_bbbl = $player_bbbl_query->fetch_row();
			//Update
			if ( $player_bbbl[0] > 0 ){
				$sql_player = "UPDATE site_players SET
					cyanide_id = ".$player->id.",
					level = ".$player->level.",
					xp = CASE WHEN ".$player->xp." > 0 THEN ".$player->xp." ELSE xp END,
					attributes = '".json_encode($player->attributes)."',
					skills = '".json_encode($player->skills)."',
					casualties = '".json_encode($player->casualties_state)."',
					dead = IFNULL('".$player->stats->sustaineddead."',0)
					WHERE id = ".$player_bbbl[0];
				$con->query($sql_player);
				$players_control = array_diff($players_control, array($player_bbbl[0]));
			}
			//Create
			else {
				if( $player->id ){
					$sql_player = "INSERT INTO site_players (cyanide_id, team_id, param_name_type, name, level, xp, attributes, skills, dead, casualties)
						VALUES (".$player->id.",".$team_bbbl[0].",'".$player->type."','".str_replace("'","\'",$player->name)."',".$player->level.",".$player->xp.",'".json_encode($player->attributes)."','".json_encode($player->skills)."',IFNULL('".$player->stats->sustaineddead."',0),'".json_encode($player->casualties_state)."')";
						echo $sql_player."<br>";
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
