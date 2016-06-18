<?php
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
	$sql = "SELECT c.id, l.name AS league, c.pool, c.site_name, c.site_order, c.json  FROM site_competitions AS c INNER JOIN site_leagues AS l ON l.id=c.league_id WHERE c.active=1 ORDER BY site_order";
	$result = mysqli_query($con, $sql);
	while($data = mysqli_fetch_array($result,MYSQL_ASSOC)) {

    $data[json] = json_decode($data[json]);
    $var2 = [];
    $sql2 = 'SELECT
        id,
        logo,
        team,
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
        SELECT site_matchs.id AS m, site_teams.id AS id, site_teams.logo AS logo, site_teams.name AS team, site_coachs.name AS coach, score_1, score_2, sustainedinjuries_1, sustainedinjuries_2, sustaineddead_1, sustaineddead_2 FROM site_matchs
        LEFT JOIN site_teams ON site_teams.id=site_matchs.team_id_1
        INNER JOIN site_coachs ON site_coachs.id=site_teams.coach_id
        WHERE competition_id = '.$data[id].' AND site_matchs.json IS NOT NULL
        UNION
        SELECT site_matchs.id AS m, site_teams.id AS id, site_teams.logo AS logo, site_teams.name AS team, site_coachs.name AS coach, score_2, score_1, sustainedinjuries_2, sustainedinjuries_1, sustaineddead_2, sustaineddead_1 FROM site_matchs
        LEFT JOIN site_teams ON site_teams.id=site_matchs.team_id_2
        INNER JOIN site_coachs ON site_coachs.id=site_teams.coach_id
        WHERE competition_id='.$data[id].' AND site_matchs.json IS NOT NULL
        ) AS a
        GROUP BY id
        ORDER BY Pts DESC, TD DESC, TDfor DESC, S DESC';
    $result2 = mysqli_query($con, $sql2);
    while($data2 = mysqli_fetch_array($result2,MYSQL_ASSOC)) {
      array_push($var2, $data2);
    }

    $data[json] = $var2;
    array_push($var, $data);
	}

  echo json_encode($var);
  die();
?>
