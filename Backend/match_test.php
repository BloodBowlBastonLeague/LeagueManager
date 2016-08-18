<?php
$id = $_GET['id'];
$uuid = $_GET['uuid'];
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './../Forum/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);

include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'includes/functions_display.' . $phpEx);
include($phpbb_root_path . 'config.' . $phpEx);

  $con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);
  $postdata = file_get_contents("php://input");
  $request = json_decode($postdata);

if (!$con) { die('Could not connect: ' . mysqli_error()); }
  mysqli_set_charset($con,'utf8');
  $sql = "UPDATE site_matchs SET cyanide_id ='".$uuid."' WHERE contest_id=".$id;
	mysqli_query($con, $sql);

	$sql = "SELECT started, cyanide_id, contest_id FROM site_matchs WHERE contest_id=".$id;
	$match = mysqli_fetch_object(mysqli_query($con, $sql));

  echo json_encode($match);

  die();
?>
