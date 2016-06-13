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

	$sql = 'SELECT * FROM site_teams WHERE id='.$id;
	$result = mysqli_query($con, $sql);
	while($obj = mysqli_fetch_object($result)) {
    $team = $obj;
	}

  $Players = [];
  $sqlPlayers = 'SELECT p.id, p.name, t.translation AS position, p.attributes, p.skills, p.level, p.xp FROM site_players AS p LEFT JOIN site_param AS t ON t.name=p.param_name_type WHERE team_id='.$id;
  $resultPlayers = mysqli_query($con, $sqlPlayers);
  while($objPlayers = mysqli_fetch_object($resultPlayers)) {
   array_push($Players, $objPlayers);
  }
  $team->players = $Players;

  $Articles = [];
  $sqlArticles = 'SELECT * FROM site_teams_rp WHERE team_id='.$id;
  $resultArticles = mysqli_query($con, $sqlArticles);
  while($objArticles = mysqli_fetch_object($resultArticles)) {
   array_push($Articles, $objArticles);
  }
  $team->articles = $Articles;

  $Coach = [];
  $sqlCoach = 'SELECT name FROM site_coachs WHERE id='.$team->coach_id;
  $resultCoach = mysqli_query($con, $sqlCoach);
  while($Coach = mysqli_fetch_row($resultCoach)) {
   $team->coach = $Coach[0];
  }

  echo json_encode($team);
  die();
?>
