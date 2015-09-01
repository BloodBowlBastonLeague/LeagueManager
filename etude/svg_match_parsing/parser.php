<?php
// Parsing d'un xml de match pour en étudier les données

// Les balises GameInfos sont toujours identiques le nom du stade peut changer ainsi que le temps imparti et les state
// State à 1 semble signifier "avant match" ; 2 : "en match" ; 3 : "après match" ce qui explique le changement de clock 120000 ms avant match et 240000 ms en match ; 3 semble signifier 2ème mi-temps ou 2ème coach ; ou pas
require 'cli/CliColor.class.php';


$dom = new DomDocument('1.0','utf-8');
$dom->preserveWhiteSpace = false;
$dom->load('files/test_match.xml');

$replay = $dom->childNodes->item(0);
print $replay->nodeName."\n";


$num_replay_step = 0;
foreach ($replay->childNodes as $replay_step) {
    if ("#text" == $replay_step->nodeName) {
        // print_r($replay_step->nodeValue);
        continue;
    }
    $num_replay_step++;
    print $replay_step->nodeName."\t".$num_replay_step."\n";
    foreach ($replay_step->childNodes as $node) {
        // print "\t".$node->nodeName."\n";
    }

    $game_info = $replay_step->getElementsByTagName('GameInfos')->item(0);
    if (!empty($game_info)) {
        print "\tGameInfos\n";
        // print_r($game_info);  

        $turn_clock = $game_info->getElementsByTagName('TurnClock')->item(0);
        if (!empty($turn_clock)) {
            print "\t\tTurnClock\t".($turn_clock->nodeValue/1000)."s\n";
        }
        $coaches_infos = $game_info->getElementsByTagName('CoachesInfos')->item(0);
        if (!empty($coaches_infos)) {
            print "\t\t".$coaches_infos->nodeName."\n";

                                                                                                                                                                                                                                                                                                                                                                

            foreach ($coaches_infos->childNodes as $node) {
                print "\t\t\t".$node->nodeName."\n";
            }
            print "\t\t/CoachesInfos\n";
        }

        // rest of GameInfos
        foreach ($game_info->childNodes as $node) {
            if ('TurnClock' == $node->nodeName) {continue;}
            // print "\t\t".$node->nodeName."\n";
        }

        print "\t/GameInfos\n";
    }
    

    print "/".$replay_step->nodeName."\n";

    die("Un seul step\n");

}