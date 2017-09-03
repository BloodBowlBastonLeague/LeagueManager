<?php
$id = $_GET['id'];

define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './../Forum/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);

include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'includes/functions_display.' . $phpEx);
include($phpbb_root_path . 'config.' . $phpEx);

$con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);

if (!$con) { die('Could not connect: ' . mysqli_error()); }
  mysqli_set_charset($con,'utf8');
  $var = [];
  $sql = 'SELECT DISTINCT(round)
    FROM site_matchs
	  WHERE competition_id='.$id.'
    ORDER BY round';
  $result = mysqli_query($con, $sql);
  while($data = mysqli_fetch_array($result,MYSQLI_ASSOC)){
    $var2 = [];
    $sql2 = 'SELECT site_matchs.id, site_matchs.cyanide_id, site_matchs.contest_id, round,
      team_id_1, t1.name as name_1, t1.logo as logo_1, score_1,
      team_id_2, t2.name as name_2, t2.logo as logo_2, score_2
      FROM site_matchs
	    LEFT JOIN site_teams as t1 ON t1.id=site_matchs.team_id_1
      LEFT JOIN site_teams as t2 ON t2.id=site_matchs.team_id_2
	    WHERE competition_id='.$id.' AND round='.$data[round];
	  $result2 = mysqli_query($con, $sql2);
    while($data2 = mysqli_fetch_array($result2,MYSQLI_ASSOC)) {

      //Ajout des pronos
      $prono=[];
      $data2[bets]=[];
      $sqlProno="SELECT match_id, coach_id, team_score_1, team_score_2, stake FROM site_bets
      WHERE match_id=".$data2[id];
      $resultProno = $con->query($sqlProno);
      while($dataProno = $resultProno->fetch_assoc()) {
	       $data2[bets][]=$dataProno;
      }

      array_push($var2, $data2);
    }
    $data[matchs] = $var2;
    $var3 = [];
    $sql3 = "SELECT CASE WHEN c.competition_mode='Coupe' THEN MAX(m.round) ELSE MIN(m.round) END
      FROM site_matchs AS m
      INNER JOIN site_competitions AS c ON c.id = m.competition_id
	    WHERE m.competition_id=".$id." AND m.started IS NULL";
	  $result3 = mysqli_query($con, $sql3);
    while($var3 = mysqli_fetch_row($result3)) {
     $data[currentDay] = $var3[0];
    }

    array_push($var, $data);
  }


  echo json_encode($var,JSON_NUMERIC_CHECK);
  die();
?>
