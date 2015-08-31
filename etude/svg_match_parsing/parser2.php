<?php
require 'cli/CliColor.class.php';


$dom = new DomDocument('1.0','utf-8');
$dom->load('files/test_match.svg1.xml');

$replay = $dom->childNodes->item(0);

$num_replay_step = 0;
foreach ($replay->childNodes as $replay_step) {
    if ("#text" == $replay_step->nodeName) {
        // print_r($replay_step->nodeValue);
        continue;
    }
    $num_replay_step++;
    print $replay_step->nodeName."\t".$num_replay_step."\n";


    $turn_clocks = $replay_step->getElementsByTagName('TurnClock');
    if (empty($turn_clocks)) {
        print CliColor::get("NO TURN CLOCK",'light_red')."\n";
        continue;
    }
    foreach ($turn_clocks as $turn_clock) {
        print "\t\tTurnClock\t".($turn_clock->nodeValue/1000)."s\n";
    }
}