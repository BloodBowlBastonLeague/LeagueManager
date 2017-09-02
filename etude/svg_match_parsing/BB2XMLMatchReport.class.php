<?php
class BB2XMLMatchReport {
    private $path;
    private $match;
    private $team_home;
    private $team_away;

    public function getPath() {return $this->path;}
    public function setPath($value) {$this->path = $value;}
    public function getNbStep() {return $this->nb_step;}
    public function setNbStep($value) {$this->nb_step = $value;}

    public function getHomeTeamId() {return $this->team_home['IdTeam'];}
    public function getHomeTeamName() {return $this->team_home['Name'];}

    public function getAwayTeamId() {return $this->team_away['IdTeam'];}
    public function getAwayTeamName() {return $this->team_away['Name'];}

    public function __call($name,$arguments) {
        if (strpos($name,'get') === 0) {
            $name = substr($name, 3);
            if (isset($this->match[$name])) {return $this->match[$name];}
            // print __METHOD__.':'.__LINE__."\n";
            if (strpos($name, 'Home') === 0) {
                // print __METHOD__.':'.__LINE__."\n";
                $name = substr($name, 4);
                if (isset($this->team_home[$name])) {return $this->team_home[$name];}
            }
            if (strpos($name, 'Away') === 0) {
                // print __METHOD__.':'.__LINE__."\n";
                $name = substr($name, 4);
                if (isset($this->team_away[$name])) {return $this->team_away[$name];}
            }
        }
        throw new Exception("function $name not exists");
    }

    public function __construct($path) {
        if (!$path || !is_file($path)) {throw new Exception("Fichier match report invalide");}
        $this->setPath($path);
        $dom_doc = new DomDocument('1.0','utf-8');
        $dom_doc->preserveWhiteSpace = false;
        $dom_doc->load($path);
        $dom_replay = $dom_doc->childNodes->item(0);

        $this->setNbStep($dom_replay->childNodes->length);

        // RulesEventGameFinished
        $match_results = $dom_replay->getElementsByTagName('MatchResult');
        $match_result = $match_results->item(0);
        
        // CoachResults,
        $coach_results = $match_result->getElementsByTagName('CoachResult');
        foreach ($coach_results as $coach_result) {
            $team['IdTeam'] =                 (int) $coach_result->getElementsByTagName('IdTeam')                       ->item(0)->nodeValue;
            $team['SpirallingExpenses'] =           $coach_result->getElementsByTagName('SpirallingExpenses')           ->item(0)->nodeValue;
            $team['IdCoach'] =                      $coach_result->getElementsByTagName('IdCoach')                      ->item(0)->nodeValue;
            $team['PopularityBeforeMatch'] =        $coach_result->getElementsByTagName('PopularityBeforeMatch')        ->item(0)->nodeValue;
            $team['PopularityGain'] =               $coach_result->getElementsByTagName('PopularityGain')               ->item(0)->nodeValue;
            $team['NbSupporters'] =                 $coach_result->getElementsByTagName('NbSupporters')                 ->item(0)->nodeValue;
            $team['CashSpentInducements'] =         $coach_result->getElementsByTagName('CashSpentInducements')         ->item(0)->nodeValue;
            $team['CashBeforeMatch'] =              $coach_result->getElementsByTagName('CashBeforeMatch')              ->item(0)->nodeValue;
            $team['CashEarnedBeforeConcession'] =   $coach_result->getElementsByTagName('CashEarnedBeforeConcession')   ->item(0)->nodeValue;
            $team['WinningsDice'] =                 $coach_result->getElementsByTagName('WinningsDice')                 ->item(0)->nodeValue;
            $team['CashEarned'] =                   $coach_result->getElementsByTagName('CashEarned')                   ->item(0)->nodeValue;

            $team_data = $coach_result->getElementsByTagName('TeamData')->item(0);

            $team['Cheerleaders'] =                 $team_data->getElementsByTagName('Cheerleaders')                    ->item(0)->nodeValue;
            $team['TreasuryBeforeInducements'] =    $team_data->getElementsByTagName('TreasuryBeforeInducements')       ->item(0)->nodeValue;
            $team['Name'] =                         $team_data->getElementsByTagName('Name')                            ->item(0)->nodeValue;
            $team['AssistantCoaches'] =             $team_data->getElementsByTagName('AssistantCoaches')                ->item(0)->nodeValue;
            $team['Popularity'] =                   $team_data->getElementsByTagName('Popularity')                      ->item(0)->nodeValue;
            $team['Apothecary'] =                   $team_data->getElementsByTagName('Apothecary')                      ->item(0)->nodeValue;
            $team['TeamId'] =                 (int) $team_data->getElementsByTagName('TeamId')                          ->item(0)->nodeValue;
            $team['Value'] =                        $team_data->getElementsByTagName('Value')                           ->item(0)->nodeValue;
            $team['IdRace'] =                       $team_data->getElementsByTagName('IdRace')                          ->item(0)->nodeValue;
            $team['Treasury'] =                     $team_data->getElementsByTagName('Treasury')                        ->item(0)->nodeValue;
            $team['Reroll'] =                       $team_data->getElementsByTagName('Reroll')                          ->item(0)->nodeValue;
            $team['Logo'] =                         $team_data->getElementsByTagName('Logo')                            ->item(0)->nodeValue;
            $team['CoachSlot'] =                    $team_data->getElementsByTagName('CoachSlot')                       ->item(0)->nodeValue;
            $team['TeamColor'] =                    $team_data->getElementsByTagName('TeamColor')                       ->item(0)->nodeValue;
           
            $players_result = $coach_result->getElementsByTagName('PlayerResults')->item(0);
            $players_data = $players_result->getElementsByTagName('PlayerResult');

            foreach ($players_data as $player_data) {
                $player['PlayerType'] =             $player_data->getElementsByTagName('PlayerType')            ->item(0)->nodeValue;
                $player['Casualty1'] =              $player_data->getElementsByTagName('Casualty1')             ->item(0)->nodeValue;
                $player['Casualty2'] =              $player_data->getElementsByTagName('Casualty2')             ->item(0)->nodeValue;
                $player['TdByConcession'] =         $player_data->getElementsByTagName('TdByConcession')        ->item(0)->nodeValue;
                $player['MVPByConcession'] =        $player_data->getElementsByTagName('MVPByConcession')       ->item(0)->nodeValue;
                $player['Xp'] =                     $player_data->getElementsByTagName('Xp')                    ->item(0)->nodeValue;
                
                $player['InflictedCasualties'] =    $player_data->getElementsByTagName('InflictedCasualties')   ->item(0)->nodeValue;
                $player['InflictedStuns'] =         $player_data->getElementsByTagName('InflictedStuns')        ->item(0)->nodeValue;
                $player['InflictedPasses'] =        $player_data->getElementsByTagName('InflictedPasses')       ->item(0)->nodeValue;
                $player['InflictedTackles'] =       $player_data->getElementsByTagName('InflictedTackles')      ->item(0)->nodeValue;
                $player['InflictedKO'] =            $player_data->getElementsByTagName('InflictedKO')           ->item(0)->nodeValue;
                $player['InflictedInterceptions'] = $player_data->getElementsByTagName('InflictedInterceptions')->item(0)->nodeValue;
                $player['InflictedCatches'] =       $player_data->getElementsByTagName('InflictedCatches')      ->item(0)->nodeValue;
                $player['InflictedInjuries'] =      $player_data->getElementsByTagName('InflictedInjuries')     ->item(0)->nodeValue;
                $player['InflictedDead'] =          $player_data->getElementsByTagName('InflictedDead')         ->item(0)->nodeValue;
                $player['InflictedMetersPassing'] = $player_data->getElementsByTagName('InflictedMetersPassing')->item(0)->nodeValue;
                $player['InflictedMetersRunning'] = $player_data->getElementsByTagName('InflictedMetersRunning')->item(0)->nodeValue;
                $player['InflictedTouchdowns'] =    $player_data->getElementsByTagName('InflictedTouchdowns')   ->item(0)->nodeValue;
                
                $player['SustainedInterceptions'] = $player_data->getElementsByTagName('SustainedInterceptions')->item(0)->nodeValue;
                $player['SustainedTackles'] =       $player_data->getElementsByTagName('SustainedTackles')      ->item(0)->nodeValue;
                $player['SustainedInjuries'] =      $player_data->getElementsByTagName('SustainedInjuries')     ->item(0)->nodeValue;
                $player['SustainedKO'] =            $player_data->getElementsByTagName('SustainedKO')           ->item(0)->nodeValue;
                $player['SustainedDead'] =          $player_data->getElementsByTagName('SustainedDead')         ->item(0)->nodeValue;
                $player['SustainedCasualties'] =    $player_data->getElementsByTagName('SustainedCasualties')   ->item(0)->nodeValue;
                $player['SustainedStuns'] =         $player_data->getElementsByTagName('SustainedStuns')        ->item(0)->nodeValue;
                
                $player['ID'] =                     $player_data->getElementsByTagName('ID')                    ->item(0)->nodeValue;
                $player['Id'] =                     $player_data->getElementsByTagName('Id')                    ->item(0)->nodeValue;
                $player['Name'] =                   $player_data->getElementsByTagName('Name')                  ->item(0)->nodeValue;
                $player['Ma'] =                     $player_data->getElementsByTagName('Ma')                    ->item(0)->nodeValue;
                $player['St'] =                     $player_data->getElementsByTagName('St')                    ->item(0)->nodeValue;
                $player['Ag'] =                     $player_data->getElementsByTagName('Ag')                    ->item(0)->nodeValue;
                $player['Av'] =                     $player_data->getElementsByTagName('Av')                    ->item(0)->nodeValue;
                $player['MatchPlayed'] =            $player_data->getElementsByTagName('MatchPlayed')           ->item(0)->nodeValue;
                $player['MVP'] =                    $player_data->getElementsByTagName('MVP')                   ->item(0)->nodeValue;
                $player['IdPlayerListing'] =        $player_data->getElementsByTagName('IdPlayerListing')       ->item(0)->nodeValue;
                $player['Level'] =                  $player_data->getElementsByTagName('Level')                 ->item(0)->nodeValue;
                $player['Job'] =                    $player_data->getElementsByTagName('Job')                   ->item(0)->nodeValue;
                $player['Number'] =                 $player_data->getElementsByTagName('Number')                ->item(0)->nodeValue;
                $player['Experience'] =             $player_data->getElementsByTagName('Experience')            ->item(0)->nodeValue;
                $player['IdHead'] =                 $player_data->getElementsByTagName('IdHead')                ->item(0)->nodeValue;
                $player['ListCasualties'] =         $player_data->getElementsByTagName('ListCasualties')        ->item(0)->nodeValue;
                $player['Contract'] =               $player_data->getElementsByTagName('Contract')              ->item(0)->nodeValue;
                $player['TeamId'] =                 $player_data->getElementsByTagName('TeamId')                ->item(0)->nodeValue;
                $player['Value'] =                  $player_data->getElementsByTagName('Value')                 ->item(0)->nodeValue;
                $player['ListSkills'] =             $player_data->getElementsByTagName('ListSkills')            ->item(0)->nodeValue;
                $player['IdPlayerTypes'] =          $player_data->getElementsByTagName('IdPlayerTypes')         ->item(0)->nodeValue;

                $team['Players'][$player['Id']] = $player;
                unset($player);
            }
            if ($team['TeamId'] == 1) {
                $this->team_away = $team;
            } else {
                $this->team_home = $team;
            }
            unset($team);

        }

        $this->match['HomeInflictedInjuries'] = $match_result->getElementsByTagName('HomeInflictedInjuries')->item(0)->nodeValue;
        $this->match['HomeValue'] = $match_result->getElementsByTagName('HomeValue')->item(0)->nodeValue;
        $this->match['TeamHomeLogo'] = $match_result->getElementsByTagName('TeamHomeLogo')->item(0)->nodeValue;
        $this->match['HomeInflictedDead'] = $match_result->getElementsByTagName('HomeInflictedDead')->item(0)->nodeValue;
        $this->match['HomeID'] = $match_result->getElementsByTagName('HomeID')->item(0)->nodeValue;
        $this->match['HomeInflictedKO'] = $match_result->getElementsByTagName('HomeInflictedKO')->item(0)->nodeValue;
        $this->match['HomeOccupationOwn'] = $match_result->getElementsByTagName('HomeOccupationOwn')->item(0)->nodeValue;
        $this->match['HomeSustainedDead'] = $match_result->getElementsByTagName('HomeSustainedDead')->item(0)->nodeValue;
        $this->match['IdCoachHome'] = $match_result->getElementsByTagName('IdCoachHome')->item(0)->nodeValue;
        $this->match['HomeInflictedInterceptions'] = $match_result->getElementsByTagName('HomeInflictedInterceptions')->item(0)->nodeValue;
        $this->match['HomeScore'] = $match_result->getElementsByTagName('HomeScore')->item(0)->nodeValue;
        $this->match['HomeCoachCyanEarned'] = $match_result->getElementsByTagName('HomeCoachCyanEarned')->item(0)->nodeValue;
        $this->match['HomePossessionBall'] = $match_result->getElementsByTagName('HomePossessionBall')->item(0)->nodeValue;
        $this->match['HomeCashBeforeMatch'] = $match_result->getElementsByTagName('HomeCashBeforeMatch')->item(0)->nodeValue;
        $this->match['IdTeamListingHome'] = $match_result->getElementsByTagName('IdTeamListingHome')->item(0)->nodeValue;
        $this->match['HomeCashSpentInducements'] = $match_result->getElementsByTagName('HomeCashSpentInducements')->item(0)->nodeValue;
        $this->match['HomeInflictedCatches'] = $match_result->getElementsByTagName('HomeInflictedCatches')->item(0)->nodeValue;
        $this->match['HomePopularityBeforeMatch'] = $match_result->getElementsByTagName('HomePopularityBeforeMatch')->item(0)->nodeValue;
        $this->match['HomeInflictedMetersPassing'] = $match_result->getElementsByTagName('HomeInflictedMetersPassing')->item(0)->nodeValue;
        $this->match['HomeOccupationTheir'] = $match_result->getElementsByTagName('HomeOccupationTheir')->item(0)->nodeValue;
        $this->match['HomeSustainedTackles'] = $match_result->getElementsByTagName('HomeSustainedTackles')->item(0)->nodeValue;
        $this->match['HomeCashEarnedBeforeConcession'] = $match_result->getElementsByTagName('HomeCashEarnedBeforeConcession')->item(0)->nodeValue;
        $this->match['HomeCoachXpEarned'] = $match_result->getElementsByTagName('HomeCoachXpEarned')->item(0)->nodeValue;
        $this->match['HomeSustainedKO'] = $match_result->getElementsByTagName('HomeSustainedKO')->item(0)->nodeValue;
        $this->match['HomeMVP'] = $match_result->getElementsByTagName('HomeMVP')->item(0)->nodeValue;
        $this->match['HomePopularityGain'] = $match_result->getElementsByTagName('HomePopularityGain')->item(0)->nodeValue;
        $this->match['HomeInflictedMetersRunning'] = $match_result->getElementsByTagName('HomeInflictedMetersRunning')->item(0)->nodeValue;
        $this->match['IdCoachHomeCompletionStatus'] = $match_result->getElementsByTagName('IdCoachHomeCompletionStatus')->item(0)->nodeValue;
        $this->match['HomeInflictedTouchdowns'] = $match_result->getElementsByTagName('HomeInflictedTouchdowns')->item(0)->nodeValue;
        $this->match['HomeSustainedStuns'] = $match_result->getElementsByTagName('HomeSustainedStuns')->item(0)->nodeValue;
        $this->match['HomeIdPlayerListing'] = $match_result->getElementsByTagName('HomeIdPlayerListing')->item(0)->nodeValue;
        $this->match['HomeSustainedCasualties'] = $match_result->getElementsByTagName('HomeSustainedCasualties')->item(0)->nodeValue;
        $this->match['HomeSustainedInjuries'] = $match_result->getElementsByTagName('HomeSustainedInjuries')->item(0)->nodeValue;
        $this->match['HomeMatchPlayed'] = $match_result->getElementsByTagName('HomeMatchPlayed')->item(0)->nodeValue;
        $this->match['IdRacesHome'] = $match_result->getElementsByTagName('IdRacesHome')->item(0)->nodeValue;
        $this->match['HomeInflictedPasses'] = $match_result->getElementsByTagName('HomeInflictedPasses')->item(0)->nodeValue;
        $this->match['HomeInflictedTackles'] = $match_result->getElementsByTagName('HomeInflictedTackles')->item(0)->nodeValue;
        $this->match['HomeCashEarned'] = $match_result->getElementsByTagName('HomeCashEarned')->item(0)->nodeValue;
        $this->match['HomeInflictedStuns'] = $match_result->getElementsByTagName('HomeInflictedStuns')->item(0)->nodeValue;
        $this->match['HomeSustainedExpulsions'] = $match_result->getElementsByTagName('HomeSustainedExpulsions')->item(0)->nodeValue;
        $this->match['HomeInflictedCasualties'] = $match_result->getElementsByTagName('HomeInflictedCasualties')->item(0)->nodeValue;
        $this->match['HomeSustainedInterceptions'] = $match_result->getElementsByTagName('HomeSustainedInterceptions')->item(0)->nodeValue;
        $this->match['HomeWinningsDice'] = $match_result->getElementsByTagName('HomeWinningsDice')->item(0)->nodeValue;
        $this->match['TeamHomeName'] = $match_result->getElementsByTagName('TeamHomeName')->item(0)->nodeValue;
        $this->match['HomeNbSupporters'] = $match_result->getElementsByTagName('HomeNbSupporters')->item(0)->nodeValue;
        $this->match['HomeSpirallingExpenses'] = $match_result->getElementsByTagName('HomeSpirallingExpenses')->item(0)->nodeValue;
        
        $this->match['TeamAwayLogo'] = $match_result->getElementsByTagName('TeamAwayLogo')->item(0)->nodeValue;
        $this->match['AwayCashEarnedBeforeConcession'] = $match_result->getElementsByTagName('AwayCashEarnedBeforeConcession')->item(0)->nodeValue;
        $this->match['AwaySustainedKO'] = $match_result->getElementsByTagName('AwaySustainedKO')->item(0)->nodeValue;
        $this->match['AwayInflictedInjuries'] = $match_result->getElementsByTagName('AwayInflictedInjuries')->item(0)->nodeValue;
        $this->match['AwayValue'] = $match_result->getElementsByTagName('AwayValue')->item(0)->nodeValue;
        $this->match['AwayWinningsDice'] = $match_result->getElementsByTagName('AwayWinningsDice')->item(0)->nodeValue;
        $this->match['AwayID'] = $match_result->getElementsByTagName('AwayID')->item(0)->nodeValue;
        $this->match['IdCoachAwayCompletionStatus'] = $match_result->getElementsByTagName('IdCoachAwayCompletionStatus')->item(0)->nodeValue;
        $this->match['AwaySustainedStuns'] = $match_result->getElementsByTagName('AwaySustainedStuns')->item(0)->nodeValue;
        $this->match['AwayInflictedTackles'] = $match_result->getElementsByTagName('AwayInflictedTackles')->item(0)->nodeValue;
        $this->match['AwayInflictedPasses'] = $match_result->getElementsByTagName('AwayInflictedPasses')->item(0)->nodeValue;
        $this->match['AwayOccupationOwn'] = $match_result->getElementsByTagName('AwayOccupationOwn')->item(0)->nodeValue;
        $this->match['AwayInflictedCasualties'] = $match_result->getElementsByTagName('AwayInflictedCasualties')->item(0)->nodeValue;
        $this->match['AwayPopularityBeforeMatch'] = $match_result->getElementsByTagName('AwayPopularityBeforeMatch')->item(0)->nodeValue;
        $this->match['AwaySustainedDead'] = $match_result->getElementsByTagName('AwaySustainedDead')->item(0)->nodeValue;
        $this->match['AwayInflictedMetersRunning'] = $match_result->getElementsByTagName('AwayInflictedMetersRunning')->item(0)->nodeValue;
        $this->match['IdCoachAway'] = $match_result->getElementsByTagName('IdCoachAway')->item(0)->nodeValue;
        $this->match['AwaySustainedInterceptions'] = $match_result->getElementsByTagName('AwaySustainedInterceptions')->item(0)->nodeValue;
        $this->match['AwayMVP'] = $match_result->getElementsByTagName('AwayMVP')->item(0)->nodeValue;
        $this->match['AwayMatchPlayed'] = $match_result->getElementsByTagName('AwayMatchPlayed')->item(0)->nodeValue;
        $this->match['IdRacesAway'] = $match_result->getElementsByTagName('IdRacesAway')->item(0)->nodeValue;
        $this->match['AwayIdPlayerListing'] = $match_result->getElementsByTagName('AwayIdPlayerListing')->item(0)->nodeValue;
        $this->match['AwaySpirallingExpenses'] = $match_result->getElementsByTagName('AwaySpirallingExpenses')->item(0)->nodeValue;
        $this->match['AwayCoachCyanEarned'] = $match_result->getElementsByTagName('AwayCoachCyanEarned')->item(0)->nodeValue;
        $this->match['AwaySustainedTackles'] = $match_result->getElementsByTagName('AwaySustainedTackles')->item(0)->nodeValue;
        $this->match['AwayInflictedDead'] = $match_result->getElementsByTagName('AwayInflictedDead')->item(0)->nodeValue;
        $this->match['AwayPossessionBall'] = $match_result->getElementsByTagName('AwayPossessionBall')->item(0)->nodeValue;
        $this->match['AwayInflictedInterceptions'] = $match_result->getElementsByTagName('AwayInflictedInterceptions')->item(0)->nodeValue;
        $this->match['AwaySustainedExpulsions'] = $match_result->getElementsByTagName('AwaySustainedExpulsions')->item(0)->nodeValue;
        $this->match['AwayInflictedKO'] = $match_result->getElementsByTagName('AwayInflictedKO')->item(0)->nodeValue;
        $this->match['AwayCashBeforeMatch'] = $match_result->getElementsByTagName('AwayCashBeforeMatch')->item(0)->nodeValue;
        $this->match['AwayOccupationTheir'] = $match_result->getElementsByTagName('AwayOccupationTheir')->item(0)->nodeValue;
        $this->match['AwayInflictedMetersPassing'] = $match_result->getElementsByTagName('AwayInflictedMetersPassing')->item(0)->nodeValue;
        $this->match['AwayInflictedStuns'] = $match_result->getElementsByTagName('AwayInflictedStuns')->item(0)->nodeValue;
        $this->match['TeamAwayName'] = $match_result->getElementsByTagName('TeamAwayName')->item(0)->nodeValue;
        $this->match['AwaySustainedDead'] = $match_result->getElementsByTagName('AwaySustainedDead')->item(0)->nodeValue;
        $this->match['AwaySustainedInjuries'] = $match_result->getElementsByTagName('AwaySustainedInjuries')->item(0)->nodeValue;
        $this->match['AwayCoachXpEarned'] = $match_result->getElementsByTagName('AwayCoachXpEarned')->item(0)->nodeValue;
        $this->match['AwaySustainedCasualties'] = $match_result->getElementsByTagName('AwaySustainedCasualties')->item(0)->nodeValue;
        $this->match['AwayPopularityGain'] = $match_result->getElementsByTagName('AwayPopularityGain')->item(0)->nodeValue;
        $this->match['AwayCashSpentInducements'] = $match_result->getElementsByTagName('AwayCashSpentInducements')->item(0)->nodeValue;
        $this->match['AwayScore'] = $match_result->getElementsByTagName('AwayScore')->item(0)->nodeValue;
        $this->match['AwayNbSupporters'] = $match_result->getElementsByTagName('AwayNbSupporters')->item(0)->nodeValue;
        $this->match['AwayCashEarned'] = $match_result->getElementsByTagName('AwayCashEarned')->item(0)->nodeValue;
        $this->match['AwayInflictedCatches'] = $match_result->getElementsByTagName('AwayInflictedCatches')->item(0)->nodeValue;
        $this->match['AwayInflictedTouchdowns'] = $match_result->getElementsByTagName('AwayInflictedTouchdowns')->item(0)->nodeValue;
        $this->match['IdTeamListingAway'] = $match_result->getElementsByTagName('IdTeamListingAway')->item(0)->nodeValue;
        
        $this->match['Rating'] = $match_result->getElementsByTagName('Rating')->item(0)->nodeValue;
        
        $this->match['IdPlayerTypes'] = $match_result->getElementsByTagName('IdPlayerTypes')->item(0)->nodeValue;
        $this->match['ReplayFileName'] = $match_result->getElementsByTagName('ReplayFileName')->item(0)->nodeValue;
        $this->match['IdCompetitionTypes'] = $match_result->getElementsByTagName('IdCompetitionTypes')->item(0)->nodeValue;
        $this->match['CompetitionRound'] = $match_result->getElementsByTagName('CompetitionRound')->item(0)->nodeValue;
        $this->match['IdMatchCompletionStatus'] = $match_result->getElementsByTagName('IdMatchCompletionStatus')->item(0)->nodeValue;
        $this->match['OfficialLeague'] = $match_result->getElementsByTagName('OfficialLeague')->item(0)->nodeValue;
        $this->match['IdMatchType'] = $match_result->getElementsByTagName('IdMatchType')->item(0)->nodeValue;
        $this->match['IdLeague'] = $match_result->getElementsByTagName('IdLeague')->item(0)->nodeValue;
        $this->match['Automatch'] = $match_result->getElementsByTagName('Automatch')->item(0)->nodeValue;
        $this->match['Ranked'] = $match_result->getElementsByTagName('Ranked')->item(0)->nodeValue;
        $this->match['IdCompetition'] = $match_result->getElementsByTagName('IdCompetition')->item(0)->nodeValue;
        $this->match['LevelCabalVision'] = $match_result->getElementsByTagName('LevelCabalVision')->item(0)->nodeValue;
        $this->match['Stadium'] = $match_result->getElementsByTagName('Stadium')->item(0)->nodeValue;
        $this->match['Finished'] = $match_result->getElementsByTagName('Finished')->item(0)->nodeValue;
        $this->match['NameStadium'] = $match_result->getElementsByTagName('NameStadium')->item(0)->nodeValue;
        $this->match['Played'] = $match_result->getElementsByTagName('Played')->item(0)->nodeValue;
        $this->match['BestMatches'] = $match_result->getElementsByTagName('BestMatches')->item(0)->nodeValue;
        $this->match['UsedRelayServer'] = $match_result->getElementsByTagName('UsedRelayServer')->item(0)->nodeValue;
        $this->match['Spectators'] = $match_result->getElementsByTagName('Spectators')->item(0)->nodeValue;
        $this->match['Rerolled'] = $match_result->getElementsByTagName('Rerolled')->item(0)->nodeValue;
        $this->match['ID'] = $match_result->getElementsByTagName('ID')->item(0)->nodeValue;
        $this->match['LevelStadium'] = $match_result->getElementsByTagName('LevelStadium')->item(0)->nodeValue;

        unset($match_results);


    }
}


$match = new BB2XMLMatchReport('files/test_match.svg1.xml');
require dirname(__FILE__).'/match_report.html';
