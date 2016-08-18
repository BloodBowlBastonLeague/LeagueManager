<?php
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './../Forum/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);

include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'includes/functions_display.' . $phpEx);
include($phpbb_root_path . 'config.' . $phpEx);

  $con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);
  $postdata = file_get_contents("php://input");
  $request = json_decode($postdata);

if (!$con) { die('Could not connect: ' . mysqli_error()); }
  mysqli_set_charset($con,'utf8');
  $sql = "UPDATE site_matchs SET
          started = '".$request->started."',
          score_1 = '".$request->score_1."',
          nbsupporters_1 = '".$request->nbsupporters_1."',
          possessionball_1 = '".$request->possessionball_1."',
          occupationown_1 = '".$request->occupationown_1."',
          occupationtheir_1 = '".$request->occupationtheir_1."',
          sustainedcasualties_1 = '".$request->sustainedcasualties_1."',
          sustainedko_1 = '".$request->sustainedko_1."',
          sustainedinjuries_1 = '".$request->sustainedinjuries_1."',
          sustaineddead_1 = '".$request->sustaineddead_1."',
          score_2 = '".$request->score_2."',
          nbsupporters_2 = '".$request->nbsupporters_2."',
          possessionball_2 = '".$request->possessionball_2."',
          occupationown_2 = '".$request->occupationown_2."',
          occupationtheir_2 = '".$request->occupationtheir_2."',
          sustainedcasualties_2 = '".$request->sustainedcasualties_2."',
          sustainedko_2 = '".$request->sustainedko_2."',
          sustainedinjuries_2 = '".$request->sustainedinjuries_2."',
          sustaineddead_2 = '".$request->sustaineddead_2."',
          forum_url = '".$request->forum_url."',
          json =  '".str_replace("'","\'",$request->json)."'
          WHERE cyanide_id='".$request->cyanide_Id."'";
	$result = mysqli_query($con, $sql);

  $row =  mysqli_fetch_row(mysqli_query($con,"SELECT id FROM site_matchs WHERE cyanide_id='".$request->cyanide_Id."'"));

  echo $row[0];

  die();
?>
