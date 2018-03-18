<?php
function competition_add($con, $Cyanide_Key, $competition){
    //Test if competition exist
    if($competition->cyanide_id != 'NULL'){
      $resultTest = $con->query("SELECT id FROM site_competitions WHERE cyanide_id='".$competition->cyanide_id."'");
      $test_competition = $resultTest->fetch_row();
    }
    else {
      $test_competition = [0];
    };

    if ( $test_competition[0] == 0 ){

        //Saving competition
        $sql = "INSERT INTO site_competitions ( cyanide_id, league_name, param_name_format, champion, pool, game_name, season, competition_mode, site_order, site_name, active, started, competition_id_parent, sponsor_id_1, sponsor_id_2, round)
        VALUES (".$competition->cyanide_id.",'".$competition->league_name."','".$competition->format."','".$competition->champion."','".$competition->pool."','".$competition->game_name."',CONCAT('".$competition->season." ', YEAR(DATE_ADD(NOW(), INTERVAL 500 YEAR)) ),'".$competition->competition_mode."',".$competition->site_order.",'".$competition->site_name."','1',NOW(),".$competition->competition_id_parent.",".$competition->sponsor_id_1.",".$competition->sponsor_id_2.",".$competition->round.")";
        $con->query($sql);
        $competition_id = $con->insert_id;

        if($competition->competition_mode!='Sponsors'){
            competition_add_matchs($con, $Cyanide_Key, $competition_id, $competition);
        };

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

};


function competition_add_matchs($con, $Cyanide_Key, $competitionID, $competition){
    $teams = [];
    $coachs = [];
    //Saving matches
    foreach ($competition->matches as $match) {
        $match->teamBBBL = [];
        //Test if coach and team exists
        foreach ($match->opponents as $key=>$opponent) {

            $test_coach = $con->query("SELECT id FROM site_coachs WHERE cyanide_id = '".$opponent->coach->id."'")->fetch_row();
            if(in_array($opponent->coach->id,$coachs)==false){
                if ( $test_coach[0] == 0){
                    $sqlCoach = "INSERT INTO site_coachs ( name, cyanide_id, active ) VALUES ('".$opponent->coach->name."','".$opponent->coach->id."',1)";
                    $con->query($sqlCoach);
                    array_push($coachs,$opponent->coach->id);
                }
                else {
                    $sqlCoach = "UPDATE site_coachs SET active=1 WHERE cyanide_id=".$opponent->coach->id;
                    $con->query($sqlCoach);
                    array_push($coachs,$opponent->coach->id);
                };
            }

            $test_team = $con->query("SELECT id FROM site_teams WHERE cyanide_id = '".$opponent->team->id."'")->fetch_row();
            if(in_array($opponent->team->id,$teams)==false){
                if ( $test_team[0] == 0){
                    team_create($con, $Cyanide_Key, $opponent->team->id);
                    array_push($teams,$opponent->team->id);
                }
                else {
                    team_update($con, $Cyanide_Key, $opponent->team->id, $test_team[0]);
                    array_push($teams,$opponent->team->id);
                  };
            }
            array_push($match->teamBBBL,$test_team[0]);
        }
        //add match
        $sqlMatch = "INSERT INTO site_matchs (contest_id, competition_id, round, team_id_1, team_id_2)
        VALUES (".$match->contest_id.",".$competitionID.",'".$match->round."',".$match->teamBBBL[0].",".$match->teamBBBL[1].")";
        $con->query($sqlMatch);
    }

};
?>
