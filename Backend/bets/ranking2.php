<?php

/**
 * genere le classement d'une ligue
 * @param $ligue la ligue
 * @return le score de chaque coach au format json
 */
function ranking($con, $competition){
  $res=Array();

  $sql="SELECT * FROM site_matchs AS m, site_bets AS p, site_coachs AS c WHERE c.id=p.coach_id AND p.match_id=m.id AND m.score_1 IS NOT NULL AND m.competition_id=".$competition;
  echo $sql;
  $result = $con->query($sql);
  $tmp=Array();

  //Pour chaque pronos, on ajoute des points au score du coach concerné.
  while($row = $result->fetch_assoc()) {
    $s1=$row["score_1"];
    $s2=$row["score_2"];
    $p1=$row["team_score_1"];
    $p2=$row["team_score_2"];
    $tmp[$row["name"]]+=point($s1, $s2, $p1, $p2);
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
function point($score1, $score2, $prono1, $prono2){
  $res=0;
  if($score1==$prono1 && $score2==$prono2) // PRONO EXACT
    $res=3;
  else if((($score1 - $score2) * ($prono1 - $prono2))>0) //VAINQUEUR CORRECT
    $res=2;
  else if(($score1 - $score2)==0 && ($prono1 - $prono2)==0) // MATCH NUL
    $res=2;
  return $res;
}

?>
