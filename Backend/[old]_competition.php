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

	$sql = "SELECT c.id, c.league_name AS division, c.game, c.pool, c.site_name, c.site_order, c.season, c.json, c.active, c.competition_mode, c.game_name, c.champion  FROM site_competitions AS c  WHERE c.id = ".$id;
	$result = mysqli_query($con, $sql);
	$data = mysqli_fetch_object($result);

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
          WHERE competition_id = '.$id.' AND site_matchs.started IS NOT NULL
          UNION
          SELECT site_matchs.id AS m, site_teams.id AS id, site_teams.logo AS logo, site_teams.name AS team, site_teams.color_1 AS color_1, site_teams.color_2 AS color_2, site_coachs.name AS coach, score_2, score_1, sustainedcasualties_2, sustainedcasualties_1, sustaineddead_2, sustaineddead_1 FROM site_matchs
          LEFT JOIN site_teams ON site_teams.id=site_matchs.team_id_2
          INNER JOIN site_coachs ON site_coachs.id=site_teams.coach_id
          WHERE competition_id='.$id.' AND site_matchs.started IS NOT NULL
          ) AS a
          GROUP BY id
          ORDER BY Pts DESC, TD DESC, TDfor DESC, S DESC';
    $result2 = mysqli_query($con, $sql2);

    if ($result2->num_rows==0) {
      $sql2 = 'SELECT
          id,
          logo,
          team,
          coach,
          0 AS V,
          0 AS N,
          0 AS D,
          0 AS TDfor,
          0 AS TD,
          0 AS S,
          0 AS Pts
          FROM (
          SELECT site_matchs.id AS m, site_teams.id AS id, site_teams.logo AS logo, site_teams.name AS team, site_coachs.name AS coach  FROM site_matchs
          LEFT JOIN site_teams ON site_teams.id=site_matchs.team_id_1
          INNER JOIN site_coachs ON site_coachs.id=site_teams.coach_id
          WHERE competition_id = '.$id.'
          UNION
          SELECT site_matchs.id AS m, site_teams.id AS id, site_teams.logo AS logo, site_teams.name AS team, site_coachs.name AS coach  FROM site_matchs
          LEFT JOIN site_teams ON site_teams.id=site_matchs.team_id_2
          INNER JOIN site_coachs ON site_coachs.id=site_teams.coach_id
          WHERE competition_id='.$id.'
          ) AS a
          GROUP BY id';
      $result2 = mysqli_query($con, $sql2);}
    while($data2 = mysqli_fetch_array($result2,MYSQL_ASSOC)) {
      array_push($var2, $data2);
    }

      $data->standing = $var2;

  echo json_encode($data);
  die();
?>
