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

    $row = mysqli_fetch_row(mysqli_query($con,"SELECT id FROM site_players WHERE name='".str_replace("'","\'",$request->name)."'"));
    //Update
    if ( $row[0] > 0){
	    $sql = "UPDATE site_players SET team_id = ".$request->team_id.",
          level = ".$request->level.",
          xp = ".$request->xp.",
          attributes = '".$request->attributes."',
          skills = '".$request->skills."',
          dead = ".$request->dead.",
          injured = ".$request->injured."
          WHERE name='".str_replace("'","\'",$request->name)."'";
	    $result = mysqli_query($con, $sql);
      $sql2 = "INSERT INTO site_players_stats (player_id, match_id, matchplayed, mvp, inflictedpasses, inflictedcatches, inflictedinterceptions, inflictedtouchdowns, inflictedcasualties, inflictedstuns, inflictedko, inflictedinjuries, inflicteddead, inflictedtackles, inflictedmeterspassing, inflictedmetersrunning, sustainedinterceptions, sustainedcasualties, sustainedstuns, sustainedko, sustainedinjuries, sustainedtackles, sustaineddead)
      VALUES (".$row[0].",".$request->match_id.",".$request->matchplayed.",".$request->mvp.",".$request->inflictedpasses.",".$request->inflictedcatches.",".$request->inflictedinterceptions.",".$request->inflictedtouchdowns.",".$request->inflictedcasualties.",".$request->inflictedstuns.",".$request->inflictedko.",".$request->inflictedinjuries.",".$request->inflicteddead.",".$request->inflictedtackles.",".$request->inflictedmeterspassing.",".$request->inflictedmetersrunning.",".$request->sustainedinterceptions.",".$request->sustainedcasualties.",".$request->sustainedstuns.",".$request->sustainedko.",".$request->sustainedinjuries.",".$request->sustainedtackles.",".$request->sustaineddead.")";
      $con->query($sql2);
    }
    else{
      $sql = "INSERT INTO site_players (team_id, param_name_type, name, level, xp, attributes, skills, dead, injured) VALUES (   ".$request->team_id.",'".$request->type."','".str_replace("'","\'",$request->name)."',".$request->level.",".$request->xp.",'".$request->attributes."','".$request->skills."',".$request->dead.",".$request->injured.")";
      if ($con->query($sql) === TRUE) {
        $sql2 = "INSERT INTO site_players_stats (player_id, match_id, matchplayed, mvp, inflictedpasses, inflictedcatches, inflictedinterceptions, inflictedtouchdowns, inflictedcasualties, inflictedstuns, inflictedko, inflictedinjuries, inflicteddead, inflictedtackles, inflictedmeterspassing, inflictedmetersrunning, sustainedinterceptions, sustainedcasualties, sustainedstuns, sustainedko, sustainedinjuries, sustainedtackles, sustaineddead)
        VALUES (".$con->insert_id.",".$request->match_id.",".$request->matchplayed.",".$request->mvp.",".$request->inflictedpasses.",".$request->inflictedcatches.",".$request->inflictedinterceptions.",".$request->inflictedtouchdowns.",".$request->inflictedcasualties.",".$request->inflictedstuns.",".$request->inflictedko.",".$request->inflictedinjuries.",".$request->inflicteddead.",".$request->inflictedtackles.",".$request->inflictedmeterspassing.",".$request->inflictedmetersrunning.",".$request->sustainedinterceptions.",".$request->sustainedcasualties.",".$request->sustainedstuns.",".$request->sustainedko.",".$request->sustainedinjuries.",".$request->sustainedtackles.",".$request->sustaineddead.")";
        $con->query($sql2);
      }
    }
    echo $sql2;


    die();
?>
