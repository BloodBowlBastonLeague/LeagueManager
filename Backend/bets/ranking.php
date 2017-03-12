<?php

/**
 * genere le classement d'une ligue
 * @param $ligue la ligue
 * @return le score de chaque coach au format json
 */
function ranking($con, $competition){
  $res=Array();

  $sql="SELECT p.match_id FROM site_matchs AS m, site_bets AS p WHERE p.match_id=m.id AND m.competition_id=".$competition;
  $result = $con->query($sql);
  $tmp=Array();

  while($match = $result->fetch_assoc()) {
    $a = 0;
    $b = 0;
    $e = 0;

    $sql2="SELECT p.match_id, m.score_1, m.score_2, p.team_score_1, p.team_score_2, c.name FROM site_matchs AS m, site_bets AS p, site_coachs AS c WHERE c.id=p.coach_id AND p.match_id=m.id AND m.score_1 IS NOT NULL AND match_id=".$match["match_id"];
    $result2 = $con->query($sql2);
    //Pour chaque match, on calcul les côtes.
    while($bet = $result2->fetch_assoc()) {
      if ($bet["score_1"] == $bet["score_2"]){
        $e++; }
      else if ($bet["score_1"] > $bet["score_2"]){
        $a++; }
      else{
        $b++; }
    }

    $total = $a + $b + $e;
    $quote_1 = ($a > 0) ? round(1/($a/$total),2) : 0;
    $quote_2 = ($b > 0) ? round(1/($b/$total),2) : 0;
    $quote_e = ($e > 0) ? round(1/($e/$total),2) : 0;

    $result3 = $con->query($sql2);
    while($bet2 = $result3->fetch_assoc()) {

      $tmp[$bet2["name"]]+=point($bet2["score_1"], $bet2["score_2"], $bet2["team_score_1"], $bet2["team_score_2"], $quote_1, $quote_2, $quote_e);
    }
  }

  //INFO DU JSON
  foreach($tmp as $k => $v){
    $res[]=array("name" => utf8_encode($k), "score" => $v);
  }

  $con->close();
  return json_encode($res,JSON_PRETTY_PRINT| JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHEST);
}

/**
 * Calcul des points gagnés en fonction d'un score et d'un prono
 * @param $score1 score du match pour l'équipe 1
 * @param $score2 score du match pour l'équipe 2
 * @param $prono1 prono du match pour l'équipe 1
 * @param $prono2 prono du match pour l'équipe 2
 * @return les points gagnés
 */
function point($score1, $score2, $prono1, $prono2, $quote_1, $quote_2, $quote_e ){
  $res=0;
  // Bonus si pronostic exact
  if($score1==$prono1 && $score2==$prono2){
    $bonus = 2;
  }
  else {
    $bonus = 1;
  }

  // Victoire 1
  if($score1>$score2){
    $res = $quote_1 * $bonus;
  }
  // Victoire 2
  else if($score1 < $score2){
    $res = $quote_2 * $bonus;
  }
  // Match nul
  else if($score1 == $score2){
    $res = $quote_e * $bonus;
  }
  return $res;
}

?>
