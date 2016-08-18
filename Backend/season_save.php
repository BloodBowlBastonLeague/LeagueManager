<?php
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

    $league = mysqli_fetch_row(mysqli_query($con,"SELECT id FROM site_leagues WHERE game='BB2' AND name='".str_replace("'","\'",$request->league)."'"));
    $competition = mysqli_fetch_row(mysqli_query($con,"SELECT id FROM site_competitions WHERE cyanide_id='".$request->competition_id."'"));

    //Update
    if ( $competition[0] > 0 ){
    }
    else{
      $sql = "INSERT INTO site_competitions ( cyanide_id, league_id, param_name_format, game_name)
      VALUES (".$request->competition_id.",".$league[0].",'".$request->format."','".$request->competition."')";
      $con->query($sql);
    }
    echo $request->competition_id;
    die();
?>
