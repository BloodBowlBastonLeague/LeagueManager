<?php

//Create player
function player_create($con, $teamID, $cyanideIDTeam, $player){
    if( $player->id ){
      $sqlCreate = "INSERT INTO site_players (cyanide_id, team_id, cyanide_id_team, param_name_type, name, level, xp, attributes, skills, dead, casualties)
      VALUES (".$player->id.",".$teamID.",".$cyanideIDTeam.",'".$player->type."','".str_replace("'","\'",$player->name)."',".$player->level.",".$player->xp.",'".json_encode($player->attributes)."','".json_encode($player->skills)."',0,'".json_encode($player->casualties_state)."')";
      $con->query($sqlCreate);
    };
};

//Update player
function player_update($con, $teamID, $cyanideIDTeam, $player){
    $sqlUpdate = "UPDATE site_players SET
      team_id = ".$teamID.",
      cyanide_id_team = ".$cyanideIDTeam.",
      level = ".$player->level.",
      xp = CASE WHEN ".$player->xp." > 0 THEN ".$player->xp." ELSE xp END,
      attributes = '".json_encode($player->attributes)."',
      skills = '".json_encode($player->skills)."',
      casualties = '".json_encode($player->casualties_state)."',
      fired = 0,
      dead = IFNULL('".$player->stats->sustaineddead."',0)
      WHERE cyanide_id = ".$player->id;
    $con->query($sqlUpdate);
};

//Fire a player
function player_fire($con, $cyanideID){
    $sqlFire = "UPDATE site_players SET fired = 1 WHERE cyanide_id=".$cyanideID;
    $con->query($sqlFire);
};

//Save player stats for a match
function player_save_stats($con, $player, $cyanideIDMatch){
    $matchBBBL = $con->query("SELECT id FROM site_matchs WHERE cyanide_id = ".$cyanideIDMatch)->fetch_row();
    $playerBBBL = $con->query("SELECT id FROM site_players WHERE cyanide_id = ".$player->id)->fetch_row();
    //Save players stats
    if($playerBBBL[0]){
        $sqlSaveStats = "INSERT INTO site_players_stats (player_id, cyanide_id_player, match_id,  cyanide_id_match,matchplayed, mvp, inflictedpasses, inflictedcatches, inflictedinterceptions, inflictedtouchdowns, inflictedcasualties, inflictedstuns, inflictedko, inflictedinjuries, inflicteddead, inflictedtackles, inflictedmeterspassing, inflictedmetersrunning, sustainedinterceptions, sustainedcasualties, sustainedstuns, sustainedko, sustainedinjuries, sustainedtackles, sustaineddead)
        VALUES (".$playerBBBL[0].",".$player->id.",".$matchBBBL[0].",'".$cyanideIDMatch."',".$player->matchplayed.",".$player->mvp.",".$player->stats->inflictedpasses.",".$player->stats->inflictedcatches.",".$player->stats->inflictedinterceptions.",".$player->stats->inflictedtouchdowns.",".$player->stats->inflictedcasualties.",".$player->stats->inflictedstuns.",".$player->stats->inflictedko.",".$player->stats->inflictedinjuries.",".$player->stats->inflicteddead.",".$player->stats->inflictedtackles.",".$player->stats->inflictedmeterspassing.",".$player->stats->inflictedmetersrunning.",".$player->stats->sustainedinterceptions.",".$player->stats->sustainedcasualties.",".$player->stats->sustainedstuns.",".$player->stats->sustainedko.",".$player->stats->sustainedinjuries.",".$player->stats->sustainedtackles.",".$player->stats->sustaineddead.")";
        $con->query($sqlSaveStats);
    };
};

?>
