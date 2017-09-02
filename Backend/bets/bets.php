<?php
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './../../Forum/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);

$action= $_GET["action"];
$competition=$_GET["competition"];

include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'includes/functions_display.' . $phpEx);
include($phpbb_root_path . 'config.' . $phpEx);

include('prognosis.php');
include('ranking.php');

$con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

switch ($action) {

case "addBet":
  add_prognosis($con, $request);
  break;
case "updateBet":
  update_prognosis($con, $request);
  break;
case "pay":
  pay_players($con);
  break;
case "ranking":
  echo ranking($con, $competition);
  break;
default:
  echo "action invalid!";
  break;
}

?>
