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
	$competition = mysqli_fetch_object($result);

    $var = [];
    $sql = 'SELECT
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
          SUM(sustainedcasualties_2 ) - SUM(sustainedcasualties_1) AS S,
          SUM( case when score_1 > score_2 then 3 else 0 end
              + case when score_1 = score_2 AND score_1 IS NOT NULL then 1 else 0 end
          ) AS Pts
          FROM (
          SELECT site_matchs.id AS m, site_teams.id AS id, site_teams.logo AS logo, site_teams.name AS team, site_teams.color_1 AS color_1, site_teams.color_2 AS color_2, site_coachs.name AS coach, score_1, score_2, sustainedcasualties_1, sustainedcasualties_2, sustaineddead_1, sustaineddead_2 FROM site_matchs
          LEFT JOIN site_teams ON site_teams.id=site_matchs.team_id_1
          INNER JOIN site_coachs ON site_coachs.id=site_teams.coach_id
          WHERE competition_id = '.$id.'
          UNION
          SELECT site_matchs.id AS m, site_teams.id AS id, site_teams.logo AS logo, site_teams.name AS team, site_teams.color_1 AS color_1, site_teams.color_2 AS color_2, site_coachs.name AS coach, score_2, score_1, sustainedcasualties_2, sustainedcasualties_1, sustaineddead_2, sustaineddead_1 FROM site_matchs
          LEFT JOIN site_teams ON site_teams.id=site_matchs.team_id_2
          INNER JOIN site_coachs ON site_coachs.id=site_teams.coach_id
          WHERE competition_id='.$id.'
          ) AS a
          GROUP BY id
          ORDER BY Pts DESC';
    $result = mysqli_query($con, $sql);
    while($data = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
      array_push($var, $data);
    }
    $i = 0;
    $result = mysqli_query($con, $sql);
  foreach($var as $var2) {

      if ( $var[$i][Pts] == $var[$i-1][Pts] ) {

        $sqlConfrontation = 'SELECT
          case when score_1 > score_2 then 2 else case when score_1 = score_2 then 1 else 0 end end
          FROM (
          SELECT site_teams.id, score_1, score_2 FROM site_matchs
          LEFT JOIN site_teams ON site_teams.id=site_matchs.team_id_1
          INNER JOIN site_coachs ON site_coachs.id=site_teams.coach_id
          WHERE competition_id = '.$id.' AND site_matchs.team_id_1 = '.$var[$i][id].' AND site_matchs.team_id_2 = '.$var[$i-1][id].'
          UNION
          SELECT site_teams.id, score_2, score_1 FROM site_matchs
          LEFT JOIN site_teams ON site_teams.id=site_matchs.team_id_2
          INNER JOIN site_coachs ON site_coachs.id=site_teams.coach_id
          WHERE competition_id='.$id.' AND site_matchs.team_id_2 = '.$var[$i][id].' AND site_matchs.team_id_1 = '.$var[$i-1][id].'
          ) AS a
          GROUP BY id';

          $row = mysqli_fetch_row(mysqli_query($con, $sqlConfrontation));
      }
      else{
        $row = [1];
      }

      $var[$i]['confrontation'] = $row[0];
      $i++;
    }

    $currentCompetition = "SELECT id FROM site_matchs WHERE competition_id=".$id;
    $playersStats = [];

    $scorers = new stdClass();
    $scorers->type = 'scorers';
    $scorers->title = 'Meilleurs marqueurs';
    $players = [];
    $resultScorers = mysqli_query($con,"SELECT p.id as player, p.name, t.id AS team_id, t.name AS team, t.logo, SUM(s.inflictedtouchdowns) AS TD, SUM(s.inflictedmetersrunning) AS yards, SUM(s.inflictedcatches) AS catches FROM site_players_stats AS s LEFT JOIN site_players AS p ON p.id=s.player_id LEFT JOIN site_teams AS t ON t.id=p.team_id WHERE s.inflictedtouchdowns>0 AND t.active=1 AND s.matchplayed=1 AND s.match_id IN (".$currentCompetition.") GROUP BY p.id ORDER BY SUM(s.inflictedtouchdowns) DESC");
    while($dataScorers = mysqli_fetch_array($resultScorers,MYSQLI_ASSOC)) {
      array_push($players, $dataScorers);
    }
    $scorers->players = $players;
    array_push($playersStats, $scorers);

    $tacklers = new stdClass();
    $tacklers->type = 'tacklers';
    $tacklers->title = 'Meilleurs bastonneurs';
    $players = [];
    $resultTacklers = mysqli_query($con,"SELECT p.id as player, p.name, t.id AS team_id, t.name AS team, t.logo, SUM(s.inflictedcasualties) + SUM(s.inflicteddead) AS injuries, SUM(s.inflictedcasualties) AS casualties, SUM(s.inflicteddead) AS dead FROM site_players_stats AS s LEFT JOIN site_players AS p ON p.id=s.player_id LEFT JOIN site_teams AS t ON t.id=p.team_id WHERE (s.inflictedcasualties>0 OR s.inflicteddead>0) AND t.active=1 AND s.matchplayed=1 AND s.match_id IN (".$currentCompetition.") GROUP BY p.id ORDER BY SUM(s.inflictedcasualties) + SUM(s.inflicteddead) DESC");
    while($dataTacklers = mysqli_fetch_array($resultTacklers,MYSQLI_ASSOC)) {
      array_push($players, $dataTacklers);
    }
    $tacklers->players = $players;
    array_push($playersStats, $tacklers);

    $throwers = new stdClass();
    $throwers->type = 'throwers';
    $throwers->title = 'Meilleurs passeurs';
    $players = [];
    $resultThrowers = mysqli_query($con,"SELECT p.id as player, p.name, t.id AS team_id, t.name AS team, t.logo, SUM(s.inflictedpasses) AS passes, SUM(s.inflictedmeterspassing) AS yards FROM site_players_stats AS s LEFT JOIN site_players AS p ON p.id=s.player_id LEFT JOIN site_teams AS t ON t.id=p.team_id WHERE s.inflictedpasses>0 AND t.active=1 AND s.matchplayed=1 AND s.match_id IN (".$currentCompetition.") GROUP BY p.id ORDER BY SUM(s.inflictedmeterspassing) DESC");
    while($dataThrowers = mysqli_fetch_array($resultThrowers,MYSQLI_ASSOC)) {
      array_push($players, $dataThrowers);
    }
    $throwers->players = $players;
    array_push($playersStats, $throwers);
    $competition->playersStats = $playersStats;

    $competition->standing = $var;

    echo json_encode($competition,JSON_NUMERIC_CHECK);
  die();
?>
