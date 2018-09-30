<?php
$action = $_GET["action"];
$id = $_GET['id'];

define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './../Forum/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);

include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'includes/functions_display.' . $phpEx);
include($phpbb_root_path . 'config.' . $phpEx);

$con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);

switch ($action) {
  case "upcomingGames":
    upcomingGames($con);
    break;
  default:
    competition($con,$id);
    break;
}


function upcomingGames($con){
  mysqli_set_charset($con,'utf8');

  $fixtures = [];
  $sqlCompetitions = "SELECT DISTINCT(DATE_FORMAT(m.started,'%Y-%m-%d')) AS day
    FROM site_matchs AS m
    LEFT JOIN site_competitions AS c ON c.id=m.competition_id
    WHERE c.active=1 AND m.cyanide_id IS NULL AND m.started>NOW()
    ORDER BY m.started";
  $resultCompetitions = $con->query($sqlCompetitions);
  while($competitions = $resultCompetitions->fetch_object()){
    $competitions->matchs = [];
    $sqlMatchs = "SELECT m.id, DATE_FORMAT(m.started,'%Y%m%dT%H%i%sZ') AS planned,
      c.league_name, m.round,
      t1.name as name_1, t1.logo as logo_1,
      t2.name as name_2, t2.logo as logo_2
      FROM site_matchs AS m
      LEFT JOIN site_competitions AS c ON c.id=m.competition_id
      LEFT JOIN site_teams AS t1 ON t1.id=m.team_id_1
      LEFT JOIN site_teams AS t2 ON t2.id=m.team_id_2
      WHERE m.cyanide_id IS NULL AND m.started IS NOT NULL AND DATE_FORMAT(m.started,'%Y-%m-%d')='".$data[day]."'
      ORDER BY c.site_order";
    $resultMatchs = $con->query($sqlMatchs);
    while($dataMatchs = $resultMatchs->fetch_object()){
      array_push($competitions->matchs, $dataMatchs);
    }
    array_push($fixtures, $competitions);
  }
  echo json_encode($fixtures,JSON_NUMERIC_CHECK);
}


function competition($con,$id){
  mysqli_set_charset($con,'utf8');
  $var = [];
  $sql = 'SELECT DISTINCT(round)
    FROM site_matchs
	  WHERE competition_id='.$id.'
    ORDER BY round';
  $result = mysqli_query($con, $sql);
  while($data = mysqli_fetch_array($result,MYSQLI_ASSOC)){
    $var2 = [];
    $sql2 = "SELECT site_matchs.id, site_matchs.cyanide_id, site_matchs.contest_id, DATE_FORMAT(site_matchs.started,'%Y%m%dT%H%i%sZ') AS started, round,
      t1.coach_id as coach_id_1, team_id_1, t1.name as name_1, t1.logo as logo_1, score_1,
      t2.coach_id as coach_id_2, team_id_2, t2.name as name_2, t2.logo as logo_2, score_2
      FROM site_matchs
	    LEFT JOIN site_teams as t1 ON t1.id=site_matchs.team_id_1
      LEFT JOIN site_teams as t2 ON t2.id=site_matchs.team_id_2
	    WHERE competition_id=".$id." AND round=".$data[round];
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
	    WHERE m.competition_id=".$id." AND m.cyanide_id IS NULL";
	  $result3 = mysqli_query($con, $sql3);
    while($var3 = mysqli_fetch_row($result3)) {
     $data[currentDay] = $var3[0];
    }

    array_push($var, $data);
  }


  echo json_encode($var,JSON_NUMERIC_CHECK);
  die();
}

?>
