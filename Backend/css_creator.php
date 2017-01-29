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

	$sql = 'SELECT c.name, c.user_id, t.logo, t.color_1, t.color_2, t.param_id_race, t.id AS team_id, t.name
          FROM site_teams AS t
          LEFT JOIN site_coachs AS c ON c.id=t.coach_id
          LEFT JOIN site_parameters AS p ON p.id=t.param_id_race
          WHERE t.active=1';
	$result = mysqli_query($con, $sql);
	while($team = mysqli_fetch_array($result,MYSQL_ASSOC)) {

    $sql2 = 'UPDATE forum_profile_fields_data SET pf_race='.$team[param_id_race].', pf_equipe="<a href=\"http://bbbl.fr/#/team/'.$team[team_id].'\" target=\"_blank\">'.$team[name].'</a>" WHERE user_id='.$team[user_id];
    $result2 = mysqli_query($con, $sql2);
    echo $sql2;
    echo ".casque-logo.coach".$team[user_id]."{ background: url('/resources/logo/Logo_".$team[logo].".png') bottom right no-repeat; background-size:80px 80px; }<br/>
    .color".$team[user_id]."-1{ fill:".$team[color_1]."; }<br/>
    .color".$team[user_id]."-2{ fill:".$team[color_2]."; }<br/><br/>";
	}

  die();
?>
