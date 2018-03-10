<?php
function competition_add($con, $competition){
  if (!$con) { die('Could not connect: ' . mysqli_error()); }
    mysqli_set_charset($con,'utf8');
    //Test if competition exist
    $test_competition = mysqli_fetch_row(mysqli_query($con,"SELECT id FROM site_competitions WHERE cyanide_id='".$competition->matches[0]->competition_id."'"));

    if ( $test_competition[0] == 0 ){
      //Saving competition
      $sql = "INSERT INTO site_competitions ( cyanide_id, league_name, param_name_format, champion, pool, game_name, season, competition_mode, site_order, site_name, active, started)
        VALUES (".$competition->matches[0]->competition_id.",'".$competition->league_name."','".$competition->matches[0]->format."','".$competition->champion."','".$competition->pool."','".$competition->matches[0]->competition."',CONCAT('".$competition->season." ', YEAR(DATE_ADD(NOW(), INTERVAL 500 YEAR)) ),'".$competition->competition_mode."',".$competition->site_order.",'".$competition->site_name."','1',NOW())";
        $con->query($sql);
        $competition_id = $con->insert_id;
    }
    else {
      $sql = "SELECT id FROM site_competitions WHERE cyanide_id=".$competition->matches[0]->competition_id;
      $res = $con->query($sql);
      $row = $res->fetch_array();
      $competition_id = $row[0];
    }

      //Saving matches
      foreach ($competition->matches as $match) {
        //Test if coach and team exists
        $teams = [];
        foreach ($match->opponents as $key=>$opponent) {
          $test_coach = mysqli_fetch_row(mysqli_query($con,"SELECT id FROM site_coachs WHERE cyanide_id = '".$opponent->coach->id."'"));
          if ( $test_coach[0] == 0){
            $sqlCoach = "INSERT INTO site_coachs ( name, cyanide_id, active ) VALUES ('".$opponent->coach->name."','".$opponent->coach->id."',1)";
            $con->query($sqlCoach);
            $coach_id = $con->insert_id;
          }
          else {
            $sqlCoach = "UPDATE site_coachs SET active=1 WHERE cyanide_id=".$opponent->coach->id;
            $con->query($sqlCoach);
            $coach_id = $test_coach[0];
          };
          //Add missing team
          $test_team = mysqli_fetch_row(mysqli_query($con,"SELECT id FROM site_teams WHERE cyanide_id = '".$opponent->team->id."'"));
          if ( $test_team[0] == 0){
            $sqlTeam= "INSERT INTO site_teams ( name, cyanide_id, coach_id, active, value, leitmotiv, logo)
            VALUES ('".str_replace("'","\'",$opponent->team->name)."',  '".$opponent->team->id."',  '".$coach_id."', '1','".$opponent->team->value."','".str_replace("'","\'",$opponent->team->motto)."', '".$opponent->team->logo."')";
            $con->query($sqlTeam);
            $teams[$key] = $con->insert_id;
            //Update team with race and players
            team_update($con,$opponent->team->id);
          }
          else {
            $sqlTeam = "UPDATE site_teams SET active=1 WHERE cyanide_id=".$opponent->team->id;
            $con->query($sqlTeam);
            $teams[$key] = $test_team[0];
          };
        }
        //add match
        $sqlMatch = "INSERT INTO site_matchs (contest_id, competition_id, round, team_id_1, team_id_2)
        VALUES (".$match->contest_id.",".$competition_id.",'".$match->round."',".$teams[0].",".$teams[1].")";
        $con->query($sqlMatch);


      }
      $json = new stdClass;
      $json->result = "success";
      $json->message = "Compétition créée (bordel! 3 e...)";
      echo json_encode($json);

    }
    else {
      $json = new stdClass;
      $json->result = "failure";
      $json->message = "La compétition existe déjà";
      echo json_encode($json);
    }

}
?>
