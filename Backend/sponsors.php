<?php

function sponsor_fetch($con, $id){
    $sqlSponsor = "SELECT * FROM site_sponsors WHERE id=".$id;
    $resultSponsor = $con->query($sqlSponsor);
    $sponsor = $resultSponsor->fetch_object();
    return $sponsor;
};


function sponsor_fetch_all($con){
    $sponsors=[];
    $sqlSponsors = "SELECT * FROM site_sponsors";
    $resultSponsors = $con->query($sqlSponsors);
    while($dataSponsors = $resultSponsors->fetch_object()){
      array_push($sponsors, $dataSponsors);
    }
    return $sponsors;
};


function sponsor_fetch_teams($con, $sponsorID){
    $teams = [];
    $sqlTeams = "SELECT * FROM site_teams WHERE sponsor_id=".$sponsorID;
    $resultTeams = $con->query($sqlTeams);
    while($dataTeams = $resultTeams->fetch_object()) {
        $dataTeams->coach = coach_fetch($con, $dataTeams->coach_id);
        array_push($teams, $dataTeams);
    }
    return $teams;
};


function sponsors_standing($con, $competitionID){

    //$sponsors = sponsor_fetch_all($con);

    //foreach ($sponsors as $sponsor) {
    $sponsors=[];
    $sqlSponsors = "SELECT * FROM site_sponsors";
    $resultSponsors = $con->query($sqlSponsors);
    while($sponsor = $resultSponsors->fetch_object()){
        $scores = [];
        $sponsor->Pts = 0;
        $sponsor->V = 0;
        $sponsor->N = 0;
        $sponsor->pD = 0;
        $sponsor->D = 0;
        //Fetch matchs results
        $sqlScores = "SELECT
            COUNT(case when score_1 > score_2 then 1 end) AS matchV,
            COUNT(case when score_1 = score_2 then 1 end) AS matchN,
            COUNT(case when score_2 > score_1 then 1 end) AS matchD,
            SUM(score_1) AS TDfor,
            SUM(score_1) - SUM(score_2) AS TD,
            SUM(sustainedcasualties_2 ) + SUM(sustaineddead_2) - SUM(sustainedcasualties_1) - SUM(sustaineddead_1) AS S
            FROM (
                SELECT c.id AS sponsorsMatch, score_1, score_2, sustainedcasualties_1, sustainedcasualties_2, sustaineddead_1, sustaineddead_2
                FROM site_matchs AS m
                LEFT JOIN site_teams AS t ON t.id=m.team_id_1
                INNER JOIN site_competitions AS c ON c.id=m.competition_id
                WHERE t.sponsor_id = ".$sponsor->id." AND c.competition_id_parent=".$competitionID."
                UNION
                SELECT c.id AS sponsorsMatch, score_2, score_1, sustainedcasualties_2, sustainedcasualties_1, sustaineddead_2, sustaineddead_1
                FROM site_matchs AS m
                LEFT JOIN site_teams AS t ON t.id=m.team_id_2
                INNER JOIN site_competitions AS c ON c.id=m.competition_id
                WHERE t.sponsor_id = ".$sponsor->id." AND c.competition_id_parent=".$competitionID."
            ) AS a
            GROUP BY sponsorsMatch";
        $resultScores = $con->query($sqlScores);

        while( $score = $resultScores->fetch_object() ){
            //Sponsor point calculation
            //"small" loss
            if( ($score->matchV==1 &&  $score->matchN==2 &&  $score->matchD=2) ||
                ($score->matchV==0 &&  $score->matchN==4 &&  $score->matchD=2) ||
                ($score->matchV==2 &&  $score->matchN==0 &&  $score->matchD=3) ){
                $score->Pts = 1;
                $score->pD = 1;
            }
            //Win
            elseif( $score->matchV > $score->matchD ){
                $score->Pts = 4;
                $score->V = 1;
            }
            //Draw
            elseif( $score->matchV == $score->matchD ){
                $score->Pts = 2;
                $score->N = 1;
            }
            //Loss
            else{
              $score->Pts = 0;
              $score->D = 1;
            };
            $sponsor->scores = $score;
            $sponsor->V += $score->V;
            $sponsor->N += $score->N;
            $sponsor->pD += $score->pD;
            $sponsor->D += $score->D;
        }

        array_push($sponsors, $sponsor);
    };

    return $sponsors;
};


function sponsors_calendar($con, $competitionID){
    $calendar = [];
    $sqlRounds = "SELECT DISTINCT(round) FROM site_competitions WHERE competition_id_parent=".$competitionID." ORDER BY round";
    $resultRounds = $con->query($sqlRounds);
    while($round = $resultRounds->fetch_object()){
        $matchs = [];
        $sqlMatchs = "SELECT id FROM site_competitions WHERE competition_id_parent=".$competitionID." AND round=".$round->round;
        $resultMatchs = $con->query($sqlMatchs);
        while($match = $resultMatchs->fetch_object()){
            $match = sponsorsMatch_fetch($con, $match->id, 0);
            array_push($matchs,$match);
        };
        $round->matchs = $matchs;
        array_push($calendar, $round);
    };
    echo json_encode($calendar,JSON_NUMERIC_CHECK);

};


function sponsorsMatch_fetch($con, $competitionID, $teams){
    $sqlCompetition = "SELECT id, site_name, site_order, season, active, competition_mode, game_name, sponsor_id_1, sponsor_id_2
      FROM site_competitions AS c
      WHERE id = ".$competitionID;
    $resultCompetition = $con->query($sqlCompetition);
    $competition = $resultCompetition->fetch_object();
    $sponsorsIDs = [$competition->sponsor_id_1,$competition->sponsor_id_2];
    //Fetch sponsors & teams
    $sponsors = sponsorsMatch_fetch_sponsors($con, [$competition->sponsor_id_1,$competition->sponsor_id_2],$teams);


    foreach ($sponsors as $sponsor) {
        $sqlScore = "SELECT SUM(case when score_1 > score_2 then 1 else 0 end) AS score
        FROM (
            SELECT c.id AS t, score_1, score_2
            FROM site_matchs AS m
            LEFT JOIN site_teams AS t ON t.id=m.team_id_1
            INNER JOIN site_competitions AS c ON c.id=m.competition_id
            WHERE t.sponsor_id = ".$sponsor->id." AND c.id=".$competitionID."
            UNION
            SELECT c.id AS t, score_2, score_1
            FROM site_matchs AS m
            LEFT JOIN site_teams AS t ON t.id=m.team_id_2
            INNER JOIN site_competitions AS c ON c.id=m.competition_id
            WHERE t.sponsor_id = ".$sponsor->id." AND c.id=".$competitionID."
        ) AS a";
        $resultScore = $con->query($sqlScore);
        $score = $resultScore->fetch_row();
        $sponsor->score = $score[0];
    }
    $competition->sponsors = $sponsors;
    return $competition;
};


function sponsorsMatch_fetch_sponsors($con, $ids, $teams){
    $sponsors=[];
    //Set ordering to fix display
    $ordering = ($ids[0]<$ids[1]) ? 'ASC' : 'DESC';
    $sqlSponsors = "SELECT * FROM site_sponsors WHERE id IN (".$ids[0].",".$ids[1].") ORDER BY id ".$ordering;
    $resultSponsors = $con->query($sqlSponsors);
    while($dataSponsors = $resultSponsors->fetch_object()){
        if($teams==1){
            $dataSponsors->teams = sponsor_fetch_teams($con, $dataSponsors->id);
        }
        array_push($sponsors, $dataSponsors);
    }
    return $sponsors;
};


?>
