<?php
$id = $_GET['id'];
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './../Forum/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);

include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'includes/functions_display.' . $phpEx);
include($phpbb_root_path . 'config.' . $phpEx);

$con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);

if (!$con) { die('Could not connect: ' . mysqli_error()); }
mysqli_set_charset($con,'utf8');

$sqlMatch = "SELECT site_matchs.cyanide_id,
					site_matchs.competition_id,
					site_matchs.forum_url,
					site_matchs.stadium,
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
					c1.name AS coach_1,
					c2.name AS coach_2
					FROM site_matchs
					LEFT JOIN site_teams as t1 ON t1.id=site_matchs.team_id_1
					LEFT JOIN site_teams as t2 ON t2.id=site_matchs.team_id_2
					LEFT JOIN site_coachs as c1 ON c1.id=t1.coach_id
					LEFT JOIN site_coachs as c2 ON c2.id=t2.coach_id
					WHERE site_matchs.id=".$id;
$resultMatch = mysqli_query($con, $sqlMatch);
while($dataMatch = mysqli_fetch_object($resultMatch)) {
	$var = $dataMatch;
	$var->bets = [];
	$sqlBets = "SELECT p.match_id, m.score_1, m.score_2, p.team_score_1, p.team_score_2, c.name FROM site_matchs AS m, site_bets AS p, site_coachs AS c WHERE c.id=p.coach_id AND p.match_id=m.id AND match_id=".$id;
	$resultBets = mysqli_query($con, $sqlBets);
	while($dataBets = mysqli_fetch_array($resultBets,MYSQLI_ASSOC)) {

		array_push($var->bets, $dataBets);
	}
}

	echo json_encode($var);
	die();
?>
