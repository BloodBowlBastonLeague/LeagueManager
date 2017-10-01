<?php
function forum_update($con){
	if (!$con) { die('Could not connect: ' . mysqli_error()); }
	mysqli_set_charset($con,'utf8');
	$css = "";
	$sql = "SELECT c.name, c.user_id, t.logo, t.color_1, t.color_2, t.param_id_race, t.id AS team_id, t.name, d.league_name
					FROM site_teams AS t
					INNER JOIN site_coachs AS c ON c.id=t.coach_id
					LEFT JOIN site_parameters AS p ON p.id=t.param_id_race
					LEFT JOIN site_competitions AS d ON d.id=(SELECT competition_id FROM site_matchs WHERE (team_id_1=t.id OR team_id_2=t.id) ORDER BY id DESC LIMIT 1)
					WHERE t.active=1";
	$result = mysqli_query($con, $sql);
	while($team = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
		//Update forum database
		$sqlProfile = "UPDATE forum_profile_fields_data SET pf_race=".$team[param_id_race].", pf_equipe='<a href=\"http://bbbl.fr/#/team/".$team[team_id]."\" target=\"_blank\">".$team[name]."</a>' WHERE user_id=".$team[user_id];
		$con->query($sqlProfile);
		$sqlRank = "UPDATE forum_users SET user_rank=(SELECT rank_id FROM forum_ranks WHERE rank_title='".$team[league_name]."') WHERE user_id=".$team[user_id];
		$con->query($sqlRank);

		//Prepare css content
		$css .= ".casque-logo.coach".$team[user_id]."{ background: url('/resources/logo/Logo_".$team[logo].".png') bottom right no-repeat; background-size:contain; }
		.color".$team[user_id]."-1{ fill:".$team[color_1]."; }
		.color".$team[user_id]."-2{ fill:".$team[color_2]."; }
		\n";
	}
	//Create css
	file_put_contents('../../css/teams.css', $css);
	$json = new stdClass;
	$json->result = "success";
	$json->message = "Forum et CSS mis à jour.";
	echo json_encode($json);

}
?>
