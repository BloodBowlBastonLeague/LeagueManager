<?php

$action = $_GET["action"];

include('config.php');

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

include('competition.php');
include('statistics.php');



switch ($action) {
    case "boot":
        $competitions = competition_fetch_all($con);
        break;
    case "competition":
        $competition = competition_fetch($con, $request->id);
        $competition = competition_stats($con, $competition);
        echo json_encode($competition,JSON_NUMERIC_CHECK);
        break;
    default:
        echo "Erreur!";
        break;
};
?>
