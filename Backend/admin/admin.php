<?php
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './../../Forum/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);

$action = $_GET["action"];

include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'includes/functions_display.' . $phpEx);
include($phpbb_root_path . 'config.' . $phpEx);

include('competition.php');
include('season.php');
include('forum.php');
include('team.php');

$con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);


switch ($action) {
  case "forumUpdate":
    forum_update($con);
    break;
  case "competitionAdd":
    competition_add($con, $request);
    break;
  case "seasonArchive":
    season_archive($con);
    break;
  default:
    echo "Erreur!";
    break;
};


?>
