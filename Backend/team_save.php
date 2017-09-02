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

    $row = mysqli_fetch_row(mysqli_query($con,"SELECT id FROM site_teams WHERE cyanide_id = '".$request->cyanide_id."'"));
    //Update
    if ( $row[0] > 0){
	    $sql = "UPDATE site_teams SET
          apothecary = ".$request->apothecary.",
          assistantcoaches = ".$request->assistantcoaches.",
          cheerleaders = ".$request->cheerleaders.",
          cash = '".$request->cash."',
          rerolls = '".$request->rerolls."',
          popularity = ".$request->popularity.",
          value = ".$request->value.",
          stadiumname = '".str_replace("'","\'",$request->stadiumname)."',
          leitmotiv = '".str_replace("'","\'",$request->leitmotiv)."'
          WHERE cyanide_id = '".$request->cyanide_id."'";
    }
    //Creation
    else{
      $sql= "INSERT INTO site_teams ( name, cyanide_id, coach_id, param_id_race, active, apothecary, assistantcoaches, cheerleaders, cash, rerolls, popularity, value, stadiumname, leitmotiv, logo, json)
      VALUES ('".str_replace("'","\'",$request->name)."', '".$request->cyanide_id."', '".$request->coach_id."', '".$request->param_id_race."', '1', '".$request->apothecary."', '".$request->assistantcoaches."', '".$request->cheerleaders."', '".$request->cash."', '".$request->rerolls."', '".$request->popularity."', '".$request->value."', '".str_replace("'","\'",$request->stadiumname)."', '".str_replace("'","\'",$request->leitmotiv)."', '".$request->logo."',  '".$request->json."')";
    }

    $con->query($sql);

    if ( $row[0] > 0){
      echo $row[0];
    }
    else {
      echo $con->insert_id;
    }

    die();
?>
