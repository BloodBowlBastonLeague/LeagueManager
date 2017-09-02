<?php
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './../Forum/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);

include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'includes/functions_display.' . $phpEx);
include($phpbb_root_path . 'config.' . $phpEx);

  $con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);

if (!$con) { die('Could not connect: ' . mysqli_error()); }
  mysqli_set_charset($con,'utf8');

  $result = mysqli_query($con,'SELECT name, translation FROM site_parameters');
  while($obj = mysqli_fetch_object($result)) {
    $param[] = $obj;
	}
  echo json_encode($param);
  die();
?>
