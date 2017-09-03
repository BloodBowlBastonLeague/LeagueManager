<?php
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './../../Forum/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);

$action = $_GET["action"];

include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'includes/functions_display.' . $phpEx);
include($phpbb_root_path . 'config.' . $phpEx);

include('team.php');
include('competition.php');
include('../bets.php');

$con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);
$postdata = file_get_contents("php://input");
$params = json_decode($postdata);

switch ($action) {
  case "competitionUpdate":
    competition_update($con,$params);
    break;
  case "teamUpdate":
    team_update($con,$params);
    break;
  default:
    echo "Erreur!";
    break;
};

?>
