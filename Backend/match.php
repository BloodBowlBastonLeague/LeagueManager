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

  $sql = 'SELECT site_matchs.cyanide_id,
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
          WHERE site_matchs.id='.$id;
	$result = mysqli_query($con, $sql);
	while($obj = mysqli_fetch_object($result)) {
    $var = $obj;
	}

  echo json_encode($var);
  die();
?>
