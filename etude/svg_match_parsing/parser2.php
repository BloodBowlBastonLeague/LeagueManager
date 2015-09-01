<?php
require 'cli/CliColor.class.php';

function node_count($list) {
    if (get_class($list) !== 'DOMNodeList') {throw new Exception("Not a node_list");}
    return $list->length;
}


$dom = new DomDocument('1.0','utf-8');
$dom->preserveWhiteSpace = false;
$dom->load('files/test_match.svg1.xml');

$replay = $dom->childNodes->item(0);

$nb_replay_step = $replay->childNodes->length;


$num_replay_step = 0;
foreach ($replay->childNodes as $replay_step) {

    print "---------------------------------------------------------\n";

    $num_replay_step++;
    print $replay_step->nodeName."\t\t".$num_replay_step.'/'.$nb_replay_step."\n";

    // Chronomètre
    $turn_clocks = $replay_step->getElementsByTagName('TurnClock');
    if (node_count($turn_clocks)) {
        foreach ($turn_clocks as $turn_clock) {
            if (0 != (int) $turn_clock->nodeValue) {
                print "\t\tTurnClock\t".($turn_clock->nodeValue/1000)."s\n";
            }
        }
    }
    unset($turn_clocks);


    // RulesEventGameFinished
    $match_results = $replay_step->getElementsByTagName('MatchResult');
    if (node_count($match_results)) {
        $match_result = $match_results->item(0);
        print "\t".$match_result->nodeName."\n";
        
        // Listing ss_nodes
        // foreach ($match_result->childNodes as $cnode) {print $cnode->nodeName.',';}print "\n";


        // USELESS
        // CompletionStatus,ShowCashGainPopup,UseLobbyTeams,PrematchInterruption,Session,
        // CoachResults,
        $coach_results = $match_result->getElementsByTagName('CoachResult');
        foreach ($coach_results as $coach_result) {
            print "\t\t".$coach_result->nodeName."\n";
            print "\t\t\t".'SpirallingExpenses:'.$coach_result->getElementsByTagName('SpirallingExpenses')->item(0)->nodeValue.';';
            print 'IdCoach:'.$coach_result->getElementsByTagName('IdCoach')->item(0)->nodeValue.';';
            print 'PopularityBeforeMatch:'.$coach_result->getElementsByTagName('PopularityBeforeMatch')->item(0)->nodeValue.';';
            print 'PopularityGain:'.$coach_result->getElementsByTagName('PopularityGain')->item(0)->nodeValue.';';
            print 'NbSupporters:'.$coach_result->getElementsByTagName('NbSupporters')->item(0)->nodeValue.';';
            print 'CashSpentInducements:'.$coach_result->getElementsByTagName('CashSpentInducements')->item(0)->nodeValue.';';
            print 'CashBeforeMatch:'.$coach_result->getElementsByTagName('CashBeforeMatch')->item(0)->nodeValue.';';
            print 'CashEarnedBeforeConcession:'.$coach_result->getElementsByTagName('CashEarnedBeforeConcession')->item(0)->nodeValue.';';
            print 'IdTeam:'.$coach_result->getElementsByTagName('IdTeam')->item(0)->nodeValue.';';
            print 'WinningsDice:'.$coach_result->getElementsByTagName('WinningsDice')->item(0)->nodeValue.';';
            print 'CashEarned:'.$coach_result->getElementsByTagName('CashEarned')->item(0)->nodeValue.';';
            print "\n";

            $team_data = $coach_result->getElementsByTagName('TeamData')->item(0);
            print "\t\t\t".$team_data->nodeName."\n";

            print "\t\t\t\t".'Cheerleaders:'.$team_data->getElementsByTagName('Cheerleaders')->item(0)->nodeValue.';';
            print 'TreasuryBeforeInducements:'.$team_data->getElementsByTagName('TreasuryBeforeInducements')->item(0)->nodeValue.';';
            print 'Name:'.$team_data->getElementsByTagName('Name')->item(0)->nodeValue.';';
            print 'AssistantCoaches:'.$team_data->getElementsByTagName('AssistantCoaches')->item(0)->nodeValue.';';
            print 'Popularity:'.$team_data->getElementsByTagName('Popularity')->item(0)->nodeValue.';';
            print 'Apothecary:'.$team_data->getElementsByTagName('Apothecary')->item(0)->nodeValue.';';
            print 'TeamId:'.$team_data->getElementsByTagName('TeamId')->item(0)->nodeValue.';';
            print 'Value:'.$team_data->getElementsByTagName('Value')->item(0)->nodeValue.';';
            print 'IdRace:'.$team_data->getElementsByTagName('IdRace')->item(0)->nodeValue.';';
            print 'Treasury:'.$team_data->getElementsByTagName('Treasury')->item(0)->nodeValue.';';
            print 'Reroll:'.$team_data->getElementsByTagName('Reroll')->item(0)->nodeValue.';';
            print 'Logo:'.$team_data->getElementsByTagName('Logo')->item(0)->nodeValue.';';
            print 'CoachSlot:'.$team_data->getElementsByTagName('CoachSlot')->item(0)->nodeValue.';';
            print 'TeamColor:'.$team_data->getElementsByTagName('TeamColor')->item(0)->nodeValue.';';
            print "\n";
           

            $players_result = $coach_result->getElementsByTagName('PlayerResults')->item(0);
            print "\t\t\t".$players_result->nodeName."\n";
            $players_data = $players_result->getElementsByTagName('PlayerResult');

            foreach ($players_data as $player_data) {
                print "\t\t\t\t\t".'PlayerType:'.$player_data->getElementsByTagName('PlayerType')->item(0)->nodeValue.';';
                print 'TdByConcession:'.$player_data->getElementsByTagName('TdByConcession')->item(0)->nodeValue.';';
                print 'Casualty1:'.$player_data->getElementsByTagName('Casualty1')->item(0)->nodeValue.';';
                print 'MVPByConcession:'.$player_data->getElementsByTagName('MVPByConcession')->item(0)->nodeValue.';';
                print 'Casualty2:'.$player_data->getElementsByTagName('Casualty2')->item(0)->nodeValue.';';
                print 'Xp:'.$player_data->getElementsByTagName('Xp')->item(0)->nodeValue.';';

                print 'InflictedCasualties:'.$player_data->getElementsByTagName('InflictedCasualties')->item(0)->nodeValue.';';
                print 'InflictedStuns:'.$player_data->getElementsByTagName('InflictedStuns')->item(0)->nodeValue.';';
                print 'InflictedPasses:'.$player_data->getElementsByTagName('InflictedPasses')->item(0)->nodeValue.';';
                print 'SustainedInterceptions:'.$player_data->getElementsByTagName('SustainedInterceptions')->item(0)->nodeValue.';';
                print 'InflictedMetersPassing:'.$player_data->getElementsByTagName('InflictedMetersPassing')->item(0)->nodeValue.';';
                print 'InflictedTackles:'.$player_data->getElementsByTagName('InflictedTackles')->item(0)->nodeValue.';';
                print 'SustainedTackles:'.$player_data->getElementsByTagName('SustainedTackles')->item(0)->nodeValue.';';
                print 'InflictedKO:'.$player_data->getElementsByTagName('InflictedKO')->item(0)->nodeValue.';';
                print 'SustainedInjuries:'.$player_data->getElementsByTagName('SustainedInjuries')->item(0)->nodeValue.';';
                print 'SustainedKO:'.$player_data->getElementsByTagName('SustainedKO')->item(0)->nodeValue.';';
                print 'SustainedDead:'.$player_data->getElementsByTagName('SustainedDead')->item(0)->nodeValue.';';
                print 'MatchPlayed:'.$player_data->getElementsByTagName('MatchPlayed')->item(0)->nodeValue.';';
                print 'InflictedDead:'.$player_data->getElementsByTagName('InflictedDead')->item(0)->nodeValue.';';
                print 'MVP:'.$player_data->getElementsByTagName('MVP')->item(0)->nodeValue.';';
                print 'InflictedInterceptions:'.$player_data->getElementsByTagName('InflictedInterceptions')->item(0)->nodeValue.';';
                print 'InflictedCatches:'.$player_data->getElementsByTagName('InflictedCatches')->item(0)->nodeValue.';';
                print 'SustainedCasualties:'.$player_data->getElementsByTagName('SustainedCasualties')->item(0)->nodeValue.';';
                print 'InflictedInjuries:'.$player_data->getElementsByTagName('InflictedInjuries')->item(0)->nodeValue.';';
                print 'ID:'.$player_data->getElementsByTagName('ID')->item(0)->nodeValue.';';
                print 'SustainedStuns:'.$player_data->getElementsByTagName('SustainedStuns')->item(0)->nodeValue.';';
                print 'InflictedMetersRunning:'.$player_data->getElementsByTagName('InflictedMetersRunning')->item(0)->nodeValue.';';
                print 'InflictedTouchdowns:'.$player_data->getElementsByTagName('InflictedTouchdowns')->item(0)->nodeValue.';';
                print 'IdPlayerListing:'.$player_data->getElementsByTagName('IdPlayerListing')->item(0)->nodeValue.';';
                print 'Ma:'.$player_data->getElementsByTagName('Ma')->item(0)->nodeValue.';';
                print 'Name:'.$player_data->getElementsByTagName('Name')->item(0)->nodeValue.';';
                print 'Ag:'.$player_data->getElementsByTagName('Ag')->item(0)->nodeValue.';';
                print 'Level:'.$player_data->getElementsByTagName('Level')->item(0)->nodeValue.';';
                print 'Job:'.$player_data->getElementsByTagName('Job')->item(0)->nodeValue.';';
                print 'Number:'.$player_data->getElementsByTagName('Number')->item(0)->nodeValue.';';
                print 'Experience:'.$player_data->getElementsByTagName('Experience')->item(0)->nodeValue.';';
                print 'IdHead:'.$player_data->getElementsByTagName('IdHead')->item(0)->nodeValue.';';
                print 'ListCasualties:'.$player_data->getElementsByTagName('ListCasualties')->item(0)->nodeValue.';';
                print 'Contract:'.$player_data->getElementsByTagName('Contract')->item(0)->nodeValue.';';
                print 'TeamId:'.$player_data->getElementsByTagName('TeamId')->item(0)->nodeValue.';';
                print 'Value:'.$player_data->getElementsByTagName('Value')->item(0)->nodeValue.';';
                print 'Av:'.$player_data->getElementsByTagName('Av')->item(0)->nodeValue.';';
                print 'St:'.$player_data->getElementsByTagName('St')->item(0)->nodeValue.';';
                print 'ListSkills:'.$player_data->getElementsByTagName('ListSkills')->item(0)->nodeValue.';';
                print 'Id:'.$player_data->getElementsByTagName('Id')->item(0)->nodeValue.';';
                print 'IdPlayerTypes:'.$player_data->getElementsByTagName('IdPlayerTypes')->item(0)->nodeValue.';';
                print "\n";
            }


        }


        // ShowXpSpGainPopup,
        // ReconnectionToOpponent,
        // Row,

    }
    unset($match_results);

}