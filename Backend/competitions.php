<?php

$active = $_GET['active'];
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
	$sql = "SELECT c.id,
        c.game,
        c.season,
        c.league_name AS division,
        c.pool,
        c.param_name_format AS format,
        c.game_name AS name,
        c.site_order,
        c.competition_mode,
        c.started,
        c.site_name,
        c.champion
        FROM site_competitions AS c WHERE c.active>=".$active." order by c.site_order";
	$result = mysqli_query($con, $sql);
	while( $data = mysqli_fetch_array($result,MYSQLI_ASSOC) ) {

    $var2 = [];
    $sql2 = 'SELECT
        id,
        logo,
        team,
        color_1,
        color_2,
        coach,
        COUNT(case when score_1 > score_2 then 1 end) AS V,
        COUNT(case when score_1 = score_2 then 1 end) AS N,
        COUNT(case when score_2 > score_1 then 1 end) AS D,
        SUM(score_1) AS TDfor,
        SUM(score_1) - SUM(score_2) AS TD,
        SUM(sustainedcasualties_2 ) + SUM(sustaineddead_2) - SUM(sustainedcasualties_1) - SUM(sustaineddead_1) AS S,
        SUM( case when score_1 > score_2 then 3 else 0 end
            + case when score_1 = score_2 then 1 else 0 end
        ) AS Pts
        FROM (
        SELECT site_matchs.id AS m, site_teams.id AS id, site_teams.logo AS logo, site_teams.name AS team, site_teams.color_1 AS color_1, site_teams.color_2 AS color_2, site_coachs.name AS coach, score_1, score_2, sustainedcasualties_1, sustainedcasualties_2, sustaineddead_1, sustaineddead_2 FROM site_matchs
        LEFT JOIN site_teams ON site_teams.id=site_matchs.team_id_1
        INNER JOIN site_coachs ON site_coachs.id=site_teams.coach_id
        WHERE competition_id = '.$data[id].' AND site_matchs.started IS NOT NULL
        UNION
        SELECT site_matchs.id AS m, site_teams.id AS id, site_teams.logo AS logo, site_teams.name AS team, site_teams.color_1 AS color_1, site_teams.color_2 AS color_2, site_coachs.name AS coach, score_2, score_1, sustainedcasualties_2, sustainedcasualties_1, sustaineddead_2, sustaineddead_1 FROM site_matchs
        LEFT JOIN site_teams ON site_teams.id=site_matchs.team_id_2
        INNER JOIN site_coachs ON site_coachs.id=site_teams.coach_id
        WHERE competition_id='.$data[id].' AND site_matchs.started IS NOT NULL
        ) AS a
        GROUP BY id
        ORDER BY Pts DESC, TD DESC, TDfor DESC, S DESC';

    $result2 = mysqli_query($con, $sql2);

    if ($result2->num_rows==0) {
      $sql2 = 'SELECT
          id,
          logo,
          team,
          color_1,
          color_2,
          coach,
          0 AS V,
          0 AS N,
          0 AS D,
          0 AS TDfor,
          0 AS TD,
          0 AS S,
          0 AS Pts
          FROM (
          SELECT site_matchs.id AS m, site_teams.id AS id, site_teams.logo AS logo, site_teams.name AS team, site_teams.color_1 AS color_1, site_teams.color_2 AS color_2, site_coachs.name AS coach  FROM site_matchs
          LEFT JOIN site_teams ON site_teams.id=site_matchs.team_id_1
          INNER JOIN site_coachs ON site_coachs.id=site_teams.coach_id
          WHERE competition_id = '.$data[id].'
          UNION
          SELECT site_matchs.id AS m, site_teams.id AS id, site_teams.logo AS logo, site_teams.name AS team, site_teams.color_1 AS color_1, site_teams.color_2 AS color2, site_coachs.name AS coach  FROM site_matchs
          LEFT JOIN site_teams ON site_teams.id=site_matchs.team_id_2
          INNER JOIN site_coachs ON site_coachs.id=site_teams.coach_id
          WHERE competition_id='.$data[id].'
          ) AS a
          GROUP BY id';

      $result2 = mysqli_query($con, $sql2);}
    while($data2 = mysqli_fetch_array($result2,MYSQLI_ASSOC)) {
      array_push($var2, $data2);
    }

    $data[standing] = $var2;

    $var3 = [];
    $sql3 = 'SELECT DISTINCT(round)
      FROM site_matchs
      WHERE competition_id='.$data[id];
    $result3 = mysqli_query($con, $sql3);
    while($data3 = mysqli_fetch_array($result3,MYSQLI_ASSOC)){
      $var4 = [];
      $sql4 = 'SELECT site_matchs.id, site_matchs.started, round,
        team_id_1, t1.logo as logo_1, score_1,
        team_id_2, t2.logo as logo_2, score_2
        FROM site_matchs
        LEFT JOIN site_teams as t1 ON t1.id=site_matchs.team_id_1
        LEFT JOIN site_teams as t2 ON t2.id=site_matchs.team_id_2
        WHERE competition_id='.$data[id].' AND round='.$data3[round];
      $result4 = mysqli_query($con, $sql4);
      while($data4 = mysqli_fetch_array($result4,MYSQLI_ASSOC)) {
        array_push($var4, $data4);
      }
      $data3[matchs] = $var4;

      array_push($var3, $data3);
    }

    $data[calendar] = $var3;

    array_push($var, $data);
	}

  echo json_encode($var);
  die();
?>
