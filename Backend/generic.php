<?php
$category = $_GET['category'];

define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './../Forum/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);

include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'includes/functions_display.' . $phpEx);
include($phpbb_root_path . 'config.' . $phpEx);

include('statistics.php');

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


//Leaderboard
$leagueStats->playersStats = [];

$stats = ['scorer','thrower','tackler','killer','intercepter','catcher','punchingball'];
foreach($stats as $stat){
    array_push($leagueStats->playersStats, leaders($con,[$stat,$id]));
}

$leagueStats->matchesLeft = $matchesLeft[0];

echo json_encode($leagueStats);
die();
?>
