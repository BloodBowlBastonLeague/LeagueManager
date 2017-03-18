<?php
function season_archive($con){
  if (!$con) { die('Could not connect: ' . mysqli_error()); }
  mysqli_set_charset($con,'utf8');
    $sqlCompetitions = "UPDATE site_competitions SET active=0";
    $con->query($sqlCompetitions);

    $sqlTeams = "UPDATE site_teams SET active=0";
    $con->query($sqlTeams);

    $sqlCoachs = "UPDATE site_coachs SET active=0";
    $con->query($sqlCoachs);

    echo "Saison archivée.";
}
?>
