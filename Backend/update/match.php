<?php

function match_date($con,$params){
	mysqli_set_charset($con,'utf8');
	$sqlMatch = "UPDATE site_matchs SET started = str_to_date('".$params->started."','%d/%m/%Y %H:%i') WHERE id=".$params->id;
	echo $sqlMatch;
	$con->query($sqlMatch);
	$con->close();
}
?>
