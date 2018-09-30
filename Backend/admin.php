<?php

$action = $_GET["action"];

define('PHPBB_ROOT_PATH','./../Forum/');

include('config.php');

$postdata = file_get_contents("php://input");
$params = json_decode($postdata);

include('competition.php');
include('season.php');
include('forum.php');
include('player.php');
include('team.php');


switch ($action) {
  case "forumUpdate":
    forum_update($con);
    break;
  case "competitionAdd":
    competition_add($con, $Cyanide_Key, $params);
    break;
  case "seasonArchive":
    season_archive($con);
    break;
  default:
    echo "Erreur!";
    break;
};


?>
