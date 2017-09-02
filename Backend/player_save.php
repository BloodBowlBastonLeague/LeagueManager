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

    $match = mysqli_fetch_row(mysqli_query($con,"SELECT id FROM site_matchs WHERE cyanide_id = '".$request->match_id."'"));
    $team = mysqli_fetch_row(mysqli_query($con,"SELECT id FROM site_teams WHERE cyanide_id = '".$request->team_id."'"));
    $row = mysqli_fetch_row(mysqli_query($con,"SELECT id FROM site_players WHERE name='".str_replace("'","\'",$request->name)."' AND dead !=1 AND  team_id = ".$team[0] ));

    //Update
    if ( strlen($row[0]) > 0){
      mysqli_query($con, "UPDATE site_players SET injured = IFNULL(".$request->injured.",0) WHERE id = ".$row[0]);
	    $sql = "UPDATE site_players SET team_id = ".$team[0].",
          level = ".$request->level.",
          xp = ".$request->xp.",
          attributes = '".$request->attributes."',
          skills = '".$request->skills."',
          dead = ".$request->dead.",
          injured = IFNULL(".$request->injured.",0)
          WHERE id = ".$row[0];
	    $result = mysqli_query($con, $sql);
      $player = $row[0];
    }
    else{
      $sql = "INSERT INTO site_players (team_id, param_name_type, name, level, xp, attributes, skills, dead, injured) VALUES (   ".$team[0].",'".$request->type."','".str_replace("'","\'",$request->name)."',".$request->level.",".$request->xp.",'".$request->attributes."','".$request->skills."',".$request->dead.",".$request->injured.")";
      $con->query($sql);
      $player = $con->insert_id;
    }

    $sql2 = "INSERT INTO site_players_stats (player_id, match_id, matchplayed, mvp, inflictedpasses, inflictedcatches, inflictedinterceptions, inflictedtouchdowns, inflictedcasualties, inflictedstuns, inflictedko, inflictedinjuries, inflicteddead, inflictedtackles, inflictedmeterspassing, inflictedmetersrunning, sustainedinterceptions, sustainedcasualties, sustainedstuns, sustainedko, sustainedinjuries, sustainedtackles, sustaineddead)
    VALUES (".$player.",".$match[0].",".$request->matchplayed.",".$request->mvp.",".$request->inflictedpasses.",".$request->inflictedcatches.",".$request->inflictedinterceptions.",".$request->inflictedtouchdowns.",".$request->inflictedcasualties.",".$request->inflictedstuns.",".$request->inflictedko.",".$request->inflictedinjuries.",".$request->inflicteddead.",".$request->inflictedtackles.",".$request->inflictedmeterspassing.",".$request->inflictedmetersrunning.",".$request->sustainedinterceptions.",".$request->sustainedcasualties.",".$request->sustainedstuns.",".$request->sustainedko.",".$request->sustainedinjuries.",".$request->sustainedtackles.",".$request->sustaineddead.")";
    $con->query($sql2);

    die();
?>
