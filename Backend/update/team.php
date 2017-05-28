<?php
function team_get($params,$con,$callback){
  $request = 'http://web.cyanide-studio.com/ws/bb2/team/?key='.$params[0].'&id='.$params[1];
  $response  = file_get_contents($request);
  $json = json_decode($response);
  $team = $json->team;
  $roster = $json->roster;
  call_user_func($callback($con,$team,$roster,1));
};

function team_update($con,$team,$roster,$fired){
  mysqli_set_charset($con,'utf8');
  if( $team->idteamlisting ){ $team->id = $team->idteamlisting; };
  //Get current DB info
  $team_bbbl = mysqli_fetch_row($con->query("SELECT id FROM site_teams WHERE cyanide_id = ".$team->id));
  $team_bbbl_id = $team_bbbl[0];
  $players_control = mysqli_fetch_array(mysqli_query($con,"SELECT cyanide_id FROM site_players WHERE team_id = ".$team_bbbl_id),MYSQLI_ASSOC);

  //Update team info
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

    foreach ( $roster as $player ) {
      //Save players
      $player_bbbl = mysqli_fetch_row(mysqli_query($con,"SELECT id FROM site_players WHERE name='".str_replace("'","\'",$player->name)."' AND dead !=1 AND team_id = ".$team_bbbl_id));
      //Update
      if ( $player_bbbl[0] > 0 ){
        $sql_player = "UPDATE site_players SET
          cyanide_id = ".$player->id.",
          level = ".$player->level.",
          xp = CASE WHEN ".$player->xp." > 0 THEN ".$player->xp." ELSE xp END,
          attributes = '".json_encode($player->attributes)."',
          skills = '".json_encode($player->skills)."',
          casualties = '".json_encode($player->casualties_state)."',
          dead = IFNULL('".$player->stats->sustaineddead."',0)
          WHERE id = ".$player_bbbl[0];
        $con->query($sql_player);
        $players_control = array_diff($players_control, array($player_bbbl[0]));
      }
      //Create
      else {
        if( $player->skills !== '["Loner"]' && strpos($player->name, 'CHAMPION') == false){

          $sql_player = "INSERT INTO site_players (cyanide_id, team_id, param_name_type, name, level, xp, attributes, skills, dead, casualties)
            VALUES (".$player->id.",".$team_bbbl_id.",'".$player->type."','".str_replace("'","\'",$player->name)."',".$player->level.",".$player->xp.",'".json_encode($player->attributes)."','".json_encode($player->skills)."',IFNULL(".$player->stats->sustaineddead.",0),'".json_encode($player->casualties_state)."')";
          $con->query($sql_player);
        }
      };
    }
    if ( $fired = 1 ){
      //Update fired/sold players
      foreach ( $players_control as $player ){
        $sql_fired = "UPDATE site_players SET fired = 1 WHERE id=".$player;
        $con->query($sql_fired);
      }

      //managing old teams
      $sql_fired = "UPDATE site_players SET fired = 1 WHERE team_id = ".$team_bbbl_id." AND cyanide_id IS NULL";
      $con->query($sql_fired);
    }
    return $team_bbbl_id;
};

?>
