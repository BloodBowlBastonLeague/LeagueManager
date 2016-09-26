<?php

/**
 * Ajout d'un pronostic en base
 * @param $con la connexion à la BDD
 * @param $request les données à insérer
 */
function add_prognosis($conn, $request){
  if (!$conn) { die('Could not connect: ' . mysqli_error()); }
  mysqli_set_charset($conn,'utf8');
  //On récupère l'id du coach
  $sql = "SELECT id FROM site_coachs WHERE name='".$request->name."'";
  $res = mysqli_query($conn, $sql);
  $row = $res->fetch_assoc();

  $sql2 = "INSERT INTO site_bets VALUES ('".$request->id_match."', '".$row[id]."', '".$request->bets_1."', '".$request->bets_2."')";
  $result = mysqli_query($conn, $sql2);
  die();
}

/**
 * Mise à jour d'un pronostic en base
 * @param $conn la connexion à la BDD
 * @param $request les données à mettre à jour
 */
function update_prognosis($conn, $request){
  if (!$conn) { die('Could not connect: ' . mysqli_error()); }
  mysqli_set_charset($conn,'utf8');
  //On récupère l'id du coach
  $sql = "SELECT id FROM site_coachs WHERE name='".$request->name."'";
  $res = mysqli_query($conn, $sql);
  $row = $res->fetch_assoc();

  $sql2 = "UPDATE site_bets SET team_score_1 = '".$request->bets_1."', team_score_2 = '".$request->bets_2."' WHERE id_match='".$request->id_match."' AND id_coach='".$row[id]."'";
  $result = mysqli_query($conn, $sql2);
  die();
}

?>
