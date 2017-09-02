<?php
$category = $_GET['category'];

define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './../Forum/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);

include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'includes/functions_display.' . $phpEx);
include($phpbb_root_path . 'config.' . $phpEx);

$con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);

if (!$con) { die('Could not connect: ' . mysqli_error()); }
mysqli_set_charset($con,'utf8');

$matchesLeft = mysqli_fetch_row(mysqli_query($con,'SELECT COUNT(*) FROM site_matchs WHERE cyanide_id IS NULL AND competition_id IN (SELECT id FROM site_competitions WHERE active=1)'));

$leagueStats = mysqli_fetch_object(mysqli_query($con,'SELECT SUM(sustainedcasualties) AS casualties ,SUM(sustaineddead) AS death,SUM(inflictedtouchdowns) AS TD FROM site_players_stats'));
$coachs =  mysqli_fetch_row(mysqli_query($con,'SELECT COUNT(*) FROM site_coachs WHERE active=1'));
$leagueStats->coachs = $coachs[0];
$matches =  mysqli_fetch_row(mysqli_query($con,'SELECT COUNT(*) FROM site_matchs WHERE started IS NOT NULL'));
$leagueStats->matches =  $matches[0];

$currentCompetition = "SELECT id FROM site_matchs WHERE competition_id IN (SELECT id FROM site_competitions WHERE active=1)";

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

$leagueStats->matchesLeft = $matchesLeft[0];
$leagueStats->playersStats = $playersStats;

echo json_encode($leagueStats);
die();
?>
