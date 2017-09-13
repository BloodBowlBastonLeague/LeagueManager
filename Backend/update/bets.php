<?php

/**
 * Ajout d'un pronostic en base
 * @param $con la connexion à la BDD
 * @param $params les données à insérer
 */
function bet_add($con, $params){
  if (!$con) { die('Could not connect: ' . mysqli_error()); }
  mysqli_set_charset($con,'utf8');

  //On insère son pari dans la base
  $sqlBetNew = "INSERT INTO site_bets (match_id,coach_id,team_score_1,team_score_2, stake) VALUES (".$params->match_id.", ".$params->coach_id.", ".$params->bets_1.", ".$params->bets_2.", ".$params->stake.")";
  //echo $sqlBetNew."\n"; //for debug
  $resBetNew = $con->query($sqlBetNew);


  //on update l'argent disponible du coach
  $sqlCoachUpdate = "UPDATE site_coachs SET gold = gold - ".$params->stake." WHERE id=".$params->coach_id;
  //echo $sqlCoachUpdate."\n"; //for debug
  $resCoachUpdate = $con->query($sqlCoachUpdate);

  die();
}

/**
 * Mise à jour d'un pronostic en base
 * @param $con la connexion à la BDD
 * @param $params les données à mettre à jour
 */
function bet_update($con, $params){
  if (!$con) { die('Could not connect: ' . mysqli_error()); }
  mysqli_set_charset($con,'utf8');

  //on update l'argent dispo du coach
  $sqlBetOld = "SELECT id, stake from site_bets WHERE match_id=".$params->match_id." AND coach_id=".$params->coach_id;
  $resBetOld = $con->query($sqlBetOld);
  //echo $sqlBetOld."\n"; //for debug
  $BetOld = $resBetOld->fetch_assoc();
  //echo $BetOld;
  $sqlCoachUpdate = "UPDATE site_coachs SET gold = gold + ".$BetOld[stake]." - ".$params->stake." WHERE id=".$params->coach_id;
  //echo $sqlCoachUpdate."\n"; //for debug
  $resCoachUpdate = $con->query($sqlCoachUpdate);

  //TODO Gestion des erreurs (pas assez de fonds)

  //on update le pari déjà fait
  $sqlBetNew = "UPDATE site_bets SET team_score_1 = ".$params->bets_1.", team_score_2 = ".$params->bets_2.", stake = ".$params->stake.", modify_date = now() WHERE id=".$BetOld[id];
  echo $sqlBetNew."\n"; //for debug
  $resBetNew = $con->query($sqlBetNew);

  die();
}

/**
 * genere le paiement des gains d'une competition
 * @param $con la connexion à la BDD
 * @param $competition ID de la competition
 */
 function payment($con, $competition){

   $sqlMatchs = "SELECT id FROM site_matchs WHERE started IS NOT NULL AND competition_id=".$competition;
   $resultMatchs = $con->query($sqlMatchs);

   while($match = $resultMatchs->fetch_assoc()) {
     $a = 0;
     $b = 0;
     $e = 0;
     $sqlBets="SELECT b.id, b.match_id, b.coach_id, m.score_1, m.score_2, b.team_score_1, b.team_score_2, b.stake
     FROM site_matchs AS m
     LEFT JOIN site_bets AS b ON b.match_id=m.id
     WHERE match_id=".$match["id"];
     $resultBets = $con->query($sqlBets);

     //Pour chaque match, on calcul les côtes.
     while($bet = $resultBets->fetch_assoc()) {
       if ($bet["team_score_1"] == $bet["team_score_2"]){
         $e++; }
       else if ($bet["team_score_1"] > $bet["team_score_2"]){
         $a++; }
       else{
         $b++; }
     }
     $total = $a + $b + $e;
     $odd_1 = ($a > 0) ? round(1/($a/$total),2) : 0; //Victoire equipe 1
     $odd_2 = ($b > 0) ? round(1/($b/$total),2) : 0; //Victoire equipe 2
     $odd_e = ($e > 0) ? round(1/($e/$total),2) : 0; //Match nul

     //Distribution des gains
     $resultBets2 = $con->query($sqlBets);
     while($bet2 = $resultBets2->fetch_assoc()) {

       $reward = reward($bet2["score_1"], $bet2["score_2"], $bet2["team_score_1"], $bet2["team_score_2"], $odd_1, $odd_2, $odd_e, $bet2["stake"]);

       //Update du pari
       $sqlBetUpdate="UPDATE site_bets SET reward = ROUND(".$reward.",0), modify_date=NOW() WHERE id=".$bet2[id];
       //echo $sqlBetUpdate."\n"; //for debug
       $resBetUpdate = $con->query($sqlBetUpdate);

       //Mise à jour de la gagnotte du coach
       $sqlCoachUpdate="UPDATE site_coachs SET gold = gold + ROUND(".$reward.",0) WHERE id=".$bet2[coach_id];
       //echo $sqlCoachUpdate."\n"; //for debug
       $resCoachUpdate = $con->query($sqlCoachUpdate);
     }
   }

   $con->close();

}

/**
 * Calcul des gains en fonction d'un score et d'un prono
 * @param $score_1 score du match pour l'équipe 1
 * @param $score_2 score du match pour l'équipe 2
 * @param $prono_1 prono du match pour l'équipe 1
 * @param $prono_2 prono du match pour l'équipe 2
 * @param $odd_1 cote pour la victoire équipe 1
 * @param $odd_2 cote pour la victoire équipe 2
 * @param $odd_e cote pour un match nul
 * @param $stake mise
 * @return gains
 */
function reward($score_1, $score_2, $prono_1, $prono_2, $odd_1, $odd_2, $odd_e, $stake){
  $res = 0;
  // Bonus si pronostic exact
  if($score_1==$prono_1 && $score_2==$prono_2){
    $bonus = 2;
  }
  else {
    $bonus = 1;
  }

  // Victoire 1
  if($score_1 > $score_2 && $prono_1 > $prono_2){
    $res = $stake * $odd_1 * $bonus;
  }
  // Victoire 2
  else if($score_1 < $score_2 && $prono_1 < $prono_2){
    $res = $stake * $odd_2 * $bonus;
  }
  // Match nul
  else if($score_1 == $score_2 && $prono_1 == $prono_2){
    $res = $stake * $odd_e * $bonus;
  }
  return $res;
}

/**
 * genere le classement des parieurs d'une competition
 * @param $con la connexion à la BDD
 * @param $competition ID de la competition
 */
function ranking($con, $competition){
  $res=Array();

  $sqlCoachs = "SELECT c.id, c.name, SUM(CASE WHEN b.reward=0 THEN -stake ELSE b.reward END) AS earnings
  FROM site_matchs AS m
  INNER JOIN site_bets AS b ON b.match_id = m.id
  LEFT JOIN site_coachs AS c ON c.id = b.coach_id
  WHERE competition_id = ".$competition." AND m.cyanide_id IS NOT NULL
  GROUP BY c.id";
  $resultCoachs = $con->query($sqlCoachs);

  while($coach = mysqli_fetch_array($resultCoachs,MYSQLI_ASSOC)) {
    array_push($res, $coach);
  }

  $con->close();
  return json_encode($res);
}

?>
