<?php

$action = $_GET["action"];
define('PHPBB_ROOT_PATH','./../Forum/');

include('config.php');

$postdata = file_get_contents("php://input");
$params = json_decode($postdata);

include('parameters.php');
include('competition.php');
include('statistics.php');
include('team.php');

switch ($action) {
    case "archives":
        $competitions = competition_fetch_all($con,0);
        echo json_encode($competitions);
        break;
    case "boot":
        $league = new stdClass();
        $league->parameters = parameters($con);
        $league->stats = league($con);
        $league->competitions = competition_fetch_all($con,1);
        echo json_encode($league,JSON_NUMERIC_CHECK);
        break;
    case "competition":
        $competition = competition_fetch($con, $params->id);
        $competition = competition_stats($con, $competition);
        echo json_encode($competition,JSON_NUMERIC_CHECK);
        break;
    case "competitionUpdate":
        competition_update($con,$params);
        break;
    case "team":
        team_fetch($con,$params->id);
        echo json_encode($team,JSON_NUMERIC_CHECK);
        break;
    default:
        echo "Erreur!";
        break;
};
?>
