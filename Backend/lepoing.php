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

  $sqlLepoing = "SELECT l.id, l.publication_date, l.team_id, t.color_1, t.color_2, t.name AS team_name, l.team_article, l.player_id_1, p1.name AS player_name_1, l.player_article_1, l.player_id_2, p2.name AS player_name_2, l.player_article_2, t.coach_id, c.name AS coach_name, l.coach_article, l.anecdote_title, l.anecdote_article
  FROM site_lepoing AS l
  LEFT JOIN site_teams AS t ON t.id=l.team_id
  LEFT JOIN site_players AS p1 ON p1.id=l.player_id_1
  LEFT JOIN site_players AS p2 ON p2.id=l.player_id_2
  LEFT JOIN site_coachs AS c ON c.id=t.coach_id
  WHERE l.id=".$id;
  $resultLepoing = mysqli_query($con, $sqlLepoing);
  $lepoing = mysqli_fetch_object($resultLepoing);


  echo json_encode($lepoing);
  die();}
?>
