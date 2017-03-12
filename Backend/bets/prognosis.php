<?php

/**
 * Ajout d'un pronostic en base
 * @param $con la connexion à la BDD
 * @param $request les données à insérer
 */
function add_prognosis($con, $request){
  if (!$con) { die('Could not connect: ' . mysqli_error()); }
  mysqli_set_charset($con,'utf8');
  //On récupère l'id du coach
  $sql = "SELECT id FROM site_coachs WHERE name='".$request->name."'";
  $res = mysqli_query($con, $sql);
  $row = $res->fetch_assoc();

  $sql2 = "INSERT INTO site_bets (match_id,coach_id,team_score_1,team_score_2) VALUES ('".$request->id_match."', '".$row[id]."', '".$request->bets_1."', '".$request->bets_2."')";
  $result = mysqli_query($con, $sql2);
  echo $sql2;
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
  //On récupère l'id du coach
  $sql = "SELECT id FROM site_coachs WHERE name='".$request->name."'";
  $res = mysqli_query($con, $sql);
  $row = $res->fetch_assoc();

  $sql2 = "UPDATE site_bets SET team_score_1 = '".$request->bets_1."', team_score_2 = '".$request->bets_2."' WHERE id_match='".$request->id_match."' AND id_coach='".$row[id]."'";
  $result = mysqli_query($con, $sql2);
  die();
}

?>
