<?php

/**
 * Ajout d'un pronostic en base
 * @param $con la connexion à la BDD
 * @param $request les données à insérer
 */
function add_prognosis($con, $request){
  if (!$con) { die('Could not connect: ' . mysqli_error()); }
  mysqli_set_charset($con,'utf8');

  //On insère son pari dans la base
  $day = date("Y-m-d H:i:s");
  $sql2 = "INSERT INTO site_bets (match_id,coach_id,team_score_1,team_score_2, stake, create_date) VALUES ('".$request->id_match."', '".$row[id]."', '".$request->bets_1."', '".$request->bets_2."', '".$request->stake."', '".$day."')";
  echo $sql2."\n"; //for debug
  $result = mysqli_query($con, $sql2);


  //on update l'argent disponible du coach
  $sql3 = "UPDATE site_coachs SET gold = gold-".$request->stake." WHERE coach_id='".$request->coach_id."'";
  echo $sql3."\n"; //for debug
  $result = mysqli_query($con, $sql3);
  die();
}

/**
 * Mise à jour d'un pronostic en base
 * @param $conn la connexion à la BDD
 * @param $request les données à mettre à jour
 */
function update_prognosis($con, $request){
  if (!$con) { die('Could not connect: ' . mysqli_error()); }
  mysqli_set_charset($con,'utf8');

  //on update l'argent dispo du coach
  $sqlOldBet = "SELECT gold from site_bets WHERE match_id='".$request->id_match."' AND coach_id='".$row[id]."'";
  $resOldBet = mysqli_query($con, $sqlOldBet);
  echo $sqlOldBet."\n"; //for debug
  $OldBet = $resOldBet->fetch_assoc();
  $remaining_gold= $row[gold] + $row2[gold] - $request->stake;
  $sqlGold = "UPDATE site_coachs SET gold = gold + ".$OldBet." - ".$request->stake."' WHERE id='".$row[id]."'";
  echo $sql3."\n"; //for debug
  $resGold = mysqli_query($con, $sqlGold);

//TODO Gestion des erreurs (pas assez de fonds)

  //on update le pari déjà fait
  $day = date("Y-m-d H:i:s");
  $sqlNewBet = "UPDATE site_bets SET team_score_1 = '".$request->bets_1."', team_score_2 = '".$request->bets_2."', gold = '".$request->stake."', modify_date = '".$day."' WHERE match_id='".$request->id_match."' AND coach_id='".$row[id]."'";
  echo $sqlNewBet."\n"; //for debug
  $resNewBet = mysqli_query($con, $sqlNewBet);

  die();
}

/**
 * Paiement des joueurs
 * @param $con la connexion à la BDD
 *
 */
function pay_players($con){
  echo "PAYER LES JOUEURS\n";
  $sql="SELECT b.match_id, b.coach_id, b.team_score_1, b.team_score_2, b.gold, b.date_added, m.score_1, m.score_2, m.started FROM site_matchs AS m, site_bets AS b WHERE b.gold >0 AND m.score_1 IS NOT NULL AND b.match_id = m.id";
  $res = mysqli_query($con, $sql);
  while($row = $res->fetch_assoc()) {
    echo $row[coach_id]." bets ".$row[gold]. " on match ".$row[match_id]."\n";
    $reward=$row[gold];
    $diff1=$row[team_score_1] - $row[team_score_2];
    $diff2=$row[score_1] - $row[score_2];
    $odds=0;
    echo "DIFF: ".$diff1.", ".$diff2."\n"; // For debug
    // Calcul de la cote seulement si pari réussi
    if( ($diff1>0 && $diff2>0) || ($diff1<0 && $diff2<0) || ($diff1==0 && $diff2==0)){
      $odds=winner_odds($row[match_id], $con);
    }
    echo "ODDS: ".$odds."\n"; // For debug
    if($row[started] >= $row[date_added] && $row[gold]>0 && $odds>0){
      echo "Pari OK\n";

      //Calcul du gain
      $reward = round($reward*$odds, 0);
      //Ajustement des golds du coach
      /* Pas necessaire
      $sql2="SELECT gold FROM site_coachs WHERE id='".$row[coach_id]."'";
      echo $sql2."\n"; //for debug
      $res2=mysqli_query($con, $sql2);
      $row2=$res2->fetch_assoc();
      $new_balance=$row2[gold]+$reward;*/
      $sql3="UPDATE site_coachs SET gold=gold+".$reward." WHERE id='".$row[coach_id]."'";
      echo $sql3."\n"; //for debug
      $res3=mysqli_query($con, $sql3);
    }
    else{
      //Si perdu on stocke la mise perdu pour information
      $reward=$reward * -1;
    }
    //Update du pari (mise à 0 et reward stockée)
    $sql4="UPDATE site_bets SET gold=0, reward='".$reward."' WHERE coach_id='".$row[coach_id]."' AND match_id='".$row[match_id]."'";
    echo $sql4."\n"; //for debug
    $res4 = mysqli_query($con, $sql4);
  }
  die();
}

/**
 * Calcul de la cote gagnante d'un match
 * @param $match le match concerné
 * @param $con la connexion à la BDD
 */
function winner_odds($match, $con){
  $a = 0;
  $b = 0;
  $e = 0;

  //On recup toute les paris sur le match
  $sql="SELECT m.score_1, m.score_2, p.team_score_1, p.team_score_2 FROM site_matchs AS m, site_bets AS p WHERE m.id='".$match."' AND p.match_id=m.id AND m.score_1 IS NOT NULL";
  $res = $con->query($sql);
  //Pour chaque match, on calcul les côtes.
  while($bet = $res->fetch_assoc()) {
    if ($bet["team_score_1"] == $bet["team_score_2"]){
      $e++; }
    else if ($bet["team_score_1"] > $bet["team_score_2"]){
      $a++; }
    else{
      $b++; }
  }

  $total = $a + $b + $e;

  //on cherche le gagnant
  if($bet["score_1"] > $bet["score_2"]){
    $win=$a;
  }
  else if($bet["score_1"] < $bet["score_2"]){
    $win=$b;
  }
  else{
    $win=$e;
  }
  // on retourne la cote gagnante
  return round(1/($win/$total),2);
}


?>
