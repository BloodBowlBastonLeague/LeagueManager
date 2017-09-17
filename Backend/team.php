<?php
$id = $_GET['id'];
if(is_numeric($id) == 1){

define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './../Forum/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);

include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'includes/functions_display.' . $phpEx);
include($phpbb_root_path . 'config.' . $phpEx);

  $con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);

  if (!$con) { die('Could not connect: ' . mysqli_error()); }
  mysqli_set_charset($con,'utf8');

	$sql = "SELECT * FROM site_teams WHERE id=".$id;
	$result = mysqli_query($con, $sql);
	$team = mysqli_fetch_object($result);

  $sqlCompetition = "SELECT MAX(m.competition_id) AS id, c.game_name AS name FROM site_matchs AS m INNER JOIN site_competitions AS c ON c.id = m.competition_id WHERE (m.team_id_1=".$id." OR m.team_id_2=".$id.") LIMIT 1";
  $resultCompetition = mysqli_query($con, $sqlCompetition);
  $Competition = mysqli_fetch_object($resultCompetition);
  $team->competition = $Competition;

  $Players = [];
  $sqlPlayers = "SELECT id, name, param_name_type AS position, attributes, skills, casualties, level, xp, dead, fired FROM site_players WHERE team_id=".$id;

  $resultPlayers = mysqli_query($con, $sqlPlayers);
  while($dataPlayers = mysqli_fetch_array($resultPlayers,MYSQLI_ASSOC)) {

    $sqlStats = "SELECT SUM(matchplayed) AS matchplayed, SUM(mvp) AS mvp, SUM(inflictedpasses) AS inflictedpasses, SUM(inflictedcatches) AS inflictedcatches, SUM(inflictedinterceptions) AS inflictedinterceptions, SUM(inflictedtouchdowns) AS inflictedtouchdowns, SUM(inflictedcasualties) AS inflictedcasualties, SUM(inflictedstuns) AS inflictedstuns, SUM(inflictedko) AS inflictedko, SUM(inflictedinjuries) AS inflictedinjuries, SUM(inflicteddead) AS inflicteddead, SUM(inflictedtackles) AS inflictedtackles, SUM(inflictedmeterspassing) AS inflictedmeterspassing, SUM(inflictedmetersrunning) AS inflictedmetersrunning, SUM(sustainedinterceptions) AS sustainedinterceptions, SUM(sustainedcasualties) AS sustainedcasualties, SUM(sustainedstuns) AS sustainedstuns, SUM(sustainedko) AS sustainedko, SUM(sustainedinjuries) AS sustainedinjuries, SUM(sustainedtackles) AS sustainedtackles, sustaineddead FROM site_players_stats WHERE player_id=".$dataPlayers[id]." GROUP BY player_id";
    $resultStats = mysqli_query($con,$sqlStats);
    $Stats = mysqli_fetch_object($resultStats);

    $dataPlayers[stats] = $Stats;
    array_push($Players, $dataPlayers);
  }
  $team->players = $Players;

  $Articles = [];
  $sqlArticles = "SELECT * FROM site_teams_rp WHERE team_id=".$id;
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

  echo json_encode($team,JSON_NUMERIC_CHECK);
  die();}
?>
