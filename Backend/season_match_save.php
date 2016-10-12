<?php
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './../Forum/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);

include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'includes/functions_display.' . $phpEx);
include($phpbb_root_path . 'config.' . $phpEx);

$con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);
if (!$con) { die('Could not connect: ' . mysqli_error()); }

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

mysqli_set_charset($con,'utf8');

$competition = mysqli_fetch_row(mysqli_query($con,"SELECT id FROM site_competitions WHERE cyanide_id='".$request->competition_id."'"));


    $coach = mysqli_fetch_row(mysqli_query($con,"SELECT id FROM site_coachs WHERE cyanide_id = '".$request->coach_id_1."'"));
    $row = mysqli_fetch_row(mysqli_query($con,"SELECT id FROM site_teams WHERE cyanide_id = '".$request->team_id_1."'"));
    //Update
    if ( $row[0] == 0){
      $sql1= "INSERT INTO site_teams ( name, cyanide_id, coach_id, active,  value, leitmotiv, logo)
      VALUES ('".str_replace("'","\'",$request->team_name_1)."',  '".$request->team_id_1."',  '".$coach[0]."', '1','".$request->team_value_1."','".str_replace("'","\'",$request->team_motto_1)."', '".$request->team_logo_1."')";
      $con->query($sql1);
    }

    $coach = mysqli_fetch_row(mysqli_query($con,"SELECT id FROM site_coachs WHERE cyanide_id = '".$request->coach_id_2."'"));
    $row = mysqli_fetch_row(mysqli_query($con,"SELECT id FROM site_teams WHERE cyanide_id = '".$request->team_id_2."'"));
    //Update
    if ( $row[0] == 0){
      $sql2= "INSERT INTO site_teams ( name, cyanide_id, coach_id, active, value, leitmotiv, logo)
      VALUES ('".str_replace("'","\'",$request->team_name_2)."', '".$request->team_id_2."', '".$coach[0]."', '1','".$request->team_value_2."','".str_replace("'","\'",$request->team_motto_2)."', '".$request->team_logo_2."')";
      $con->query($sql2);
    }


    $team_1 = mysqli_fetch_row(mysqli_query($con,"SELECT id FROM site_teams WHERE cyanide_id=".$request->team_id_1.""));
    $team_2 = mysqli_fetch_row(mysqli_query($con,"SELECT id FROM site_teams WHERE cyanide_id=".$request->team_id_2.""));


$sql = "INSERT INTO site_matchs (contest_id, competition_id, round, team_id_1, team_id_2)
VALUES (".$request->contest_id.",".$competition[0].",'".$request->round."',".$team_1[0].",".$team_2[0].")";
$con->query($sql);

echo $sql1." ;".$sql2." ;".$sql;
die();
?>
