<?php
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './../Forum/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);

include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'includes/functions_display.' . $phpEx);
include($phpbb_root_path . 'config.' . $phpEx);

  $con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);
  if (!$con) { die('Could not connect: ' . mysqli_error());  }
  mysqli_set_charset($con,'utf8');

  $postdata = file_get_contents("php://input");
  $params = json_decode($postdata);

  $request = 'http://web.cyanide-studio.com/ws/bb2/contests/?key='.$params[0].'&competition='.urlencode($params[1]).'&status=played&league=BBBL';
  $response  = file_get_contents($request);
  $played = json_decode($response);

foreach ($played->upcoming_matches as $game) {
  if(in_array($game->contest_id, $params[2])){


    $request_2 = 'http://web.cyanide-studio.com/ws/bb2/match/?key='.$params[0].'&uuid='.$game->match_uuid;
    $response_2  = file_get_contents($request_2);
    $game_details = json_decode($response_2);


  //Save match
  $sql_match = "UPDATE site_matchs SET
    cyanide_id = '".$game_details->uuid."',
    started = '".$game_details->match->started."',
    score_1 = '".$game_details->match->teams[0]->score."',
    nbsupporters_1 = '".$game_details->match->teams[0]->nbsupporters."',
    possessionball_1 = '".$game_details->match->teams[0]->possessionball."',
    occupationown_1 = '".$game_details->match->teams[0]->occupationown."',
    occupationtheir_1 = '".$game_details->match->teams[0]->occupationtheir."',
    sustainedcasualties_1 = '".$game_details->match->teams[0]->sustainedcasualties."',
    sustainedko_1 = '".$game_details->match->teams[0]->sustainedko."',
    sustainedinjuries_1 = '".$game_details->match->teams[0]->sustainedinjuries."',
    sustaineddead_1 = '".$game_details->match->teams[0]->sustaineddead."',
    score_2 = '".$game_details->match->teams[1]->score."',
    nbsupporters_2 = '".$game_details->match->teams[1]->nbsupporters."',
    possessionball_2 = '".$game_details->match->teams[1]->possessionball."',
    occupationown_2 = '".$game_details->match->teams[1]->occupationown."',
    occupationtheir_2 = '".$game_details->match->teams[1]->occupationtheir."',
    sustainedcasualties_2 = '".$game_details->match->teams[1]->sustainedcasualties."',
    sustainedko_2 = '".$game_details->match->teams[1]->sustainedko."',
    sustainedinjuries_2 = '".$game_details->match->teams[1]->sustainedinjuries."',
    sustaineddead_2 = '".$game_details->match->teams[1]->sustaineddead."',
    json = '".str_replace("'","\'",$response_2)."'
    WHERE contest_id=".$game->contest_id;
	$con->query($sql_match);

  //Save team
  foreach ($game_details->teams as $team) {
    $row = mysqli_fetch_row(mysqli_query($con,"SELECT id FROM site_teams WHERE cyanide_id = '".$team->id."'"));
    //Update
    if ( $row[0] > 0){
      $sql_team = "UPDATE site_teams SET
        apothecary = ".$team->apothecary.",
        assistantcoaches = ".$team->assistantcoaches.",
        cheerleaders = ".$team->cheerleaders.",
        cash = '".$team->cash."',
        rerolls = '".$team->rerolls."',
        popularity = ".$team->popularity.",
        value = ".$team->value.",
        stadium_level = ".$team->stadiumlevel.",
        leitmotiv = '".str_replace("'","\'",$team->leitmotiv)."'
        WHERE cyanide_id = '".$team->id."'";
      $con->query($sql_team);
    }
    //Creation
    else{
      $sql_team= "INSERT INTO site_teams ( name, cyanide_id, coach_id, param_id_race, active, apothecary, assistantcoaches, cheerleaders, cash, rerolls, popularity, value, stadium_name, stadium_level, leitmotiv, logo, json)
        VALUES ('".str_replace("'","\'",$team->name)."', '".$team->cyanide_id."', '".$team->coach_id."', '".$team->param_id_race."', '1', '".$team->apothecary."', '".$team->assistantcoaches."', '".$team->cheerleaders."', '".$team->cash."', '".$team->rerolls."', '".$team->popularity."', '".$team->value."', '".str_replace("'","\'",$team->stadiumname)."', '".$team->stadiumlevel."', '".str_replace("'","\'",$team->leitmotiv)."', '".$team->logo."',  '".$team->json."')";
      $con->query($sql_team);
    };
  };

  $match = $game_details->match;
  foreach ($match->teams as $team){
    $team_bbbl = mysqli_fetch_row(mysqli_query($con,"SELECT id FROM site_teams WHERE cyanide_id = ".$team->idteamlisting));
    $team_bbbl_id = $team_bbbl[0];

    foreach ($team->roster as $player) {
      //Save players
     $player_bbbl = mysqli_fetch_row(mysqli_query($con,"SELECT id FROM site_players WHERE name='".str_replace("'","\'",$player->name)."' AND dead !=1 AND team_id = ".$team_bbbl_id));

      //Update
      if ( $player_bbbl[0] > 0){
        $sql_reset_injuries = "UPDATE site_players SET injured=0 WHERE team_id = ".$team_bbbl_id;
        $con->query($sql_reset_injuries);
        $sql_player = "UPDATE site_players SET team_id = ".$team_bbbl_id.",
          level = ".$player->level.",
          xp = ".$player->xp.",
          attributes = '".json_encode($player->attributes)."',
          skills = '".json_encode($player->skills)."',
          injuries = '".json_encode($player->casualties_state)."',
          dead = ".$player->stats->sustaineddead.",
          injured = CASE WHEN LENGTH('".json_encode($player->casualties_sustained)."') = 2 THEN 0 ELSE
                      CASE WHEN '".json_encode($player->casualties_sustained)."' LIKE '%BadlyHurt%' THEN 0 ELSE 1 END
                    END
          WHERE id = ".$player_bbbl[0];
          echo $sql_player;
        $con->query($sql_player);
        $player_bbbl_id = $player_bbbl[0];
      }
      else {
        $sql_player = "INSERT INTO site_players (team_id, param_name_type, name, level, xp, attributes, skills, dead, injured)
          VALUES (".$team_bbbl_id.",'".$player->type."','".str_replace("'","\'",$player->name)."',".$player->level.",".$player->xp.",'".json_encode($player->attributes)."','".json_encode($player->skills)."',".$player->stats->sustaineddead.",".$player->stats->sustainedcasualties.")";
        echo $sql_player;
        $con->query($sql_player);
        $player_bbbl_id = $con->insert_id;
      };
      $match_bbbl = mysqli_fetch_row(mysqli_query($con,"SELECT id FROM site_matchs WHERE cyanide_id = '".$game_details->uuid."'"));
      $sql_player_stats = "INSERT INTO site_players_stats (player_id, match_id, matchplayed, mvp, inflictedpasses, inflictedcatches, inflictedinterceptions, inflictedtouchdowns, inflictedcasualties, inflictedstuns, inflictedko, inflictedinjuries, inflicteddead, inflictedtackles, inflictedmeterspassing, inflictedmetersrunning, sustainedinterceptions, sustainedcasualties, sustainedstuns, sustainedko, sustainedinjuries, sustainedtackles, sustaineddead)
        VALUES (".$player_bbbl_id.",".$match_bbbl[0].",".$player->matchplayed.",".$player->mvp.",".$player->stats->inflictedpasses.",".$player->stats->inflictedcatches.",".$player->stats->inflictedinterceptions.",".$player->stats->inflictedtouchdowns.",".$player->stats->inflictedcasualties.",".$player->stats->inflictedstuns.",".$player->stats->inflictedko.",".$player->stats->inflictedinjuries.",".$player->stats->inflicteddead.",".$player->stats->inflictedtackles.",".$player->stats->inflictedmeterspassing.",".$player->stats->inflictedmetersrunning.",".$player->stats->sustainedinterceptions.",".$player->stats->sustainedcasualties.",".$player->stats->sustainedstuns.",".$player->stats->sustainedko.",".$player->stats->sustainedinjuries.",".$player->stats->sustainedtackles.",".$player->stats->sustaineddead.")";
      $con->query($sql_player_stats);
    };
  };
}

}
  die();
?>
