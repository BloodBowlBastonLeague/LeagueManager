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

    public function getHomeTeamName() {return $this->team_home['Name'];}
    public function getAwayTeamName() {return $this->team_away['Name'];}

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
            $team['SpirallingExpenses'] =           $coach_result->getElementsByTagName('SpirallingExpenses')           ->item(0)->nodeValue;
            $team['IdCoach'] =                      $coach_result->getElementsByTagName('IdCoach')                      ->item(0)->nodeValue;
            $team['PopularityBeforeMatch'] =        $coach_result->getElementsByTagName('PopularityBeforeMatch')        ->item(0)->nodeValue;
            $team['PopularityGain'] =               $coach_result->getElementsByTagName('PopularityGain')               ->item(0)->nodeValue;
            $team['NbSupporters'] =                 $coach_result->getElementsByTagName('NbSupporters')                 ->item(0)->nodeValue;
            $team['CashSpentInducements'] =         $coach_result->getElementsByTagName('CashSpentInducements')         ->item(0)->nodeValue;
            $team['CashBeforeMatch'] =              $coach_result->getElementsByTagName('CashBeforeMatch')              ->item(0)->nodeValue;
            $team['CashEarnedBeforeConcession'] =   $coach_result->getElementsByTagName('CashEarnedBeforeConcession')   ->item(0)->nodeValue;
            $team['IdTeam'] =                       $coach_result->getElementsByTagName('IdTeam')                       ->item(0)->nodeValue;
            $team['WinningsDice'] =                 $coach_result->getElementsByTagName('WinningsDice')                 ->item(0)->nodeValue;
            $team['CashEarned'] =                   $coach_result->getElementsByTagName('CashEarned')                   ->item(0)->nodeValue;

            $team_data = $coach_result->getElementsByTagName('TeamData')->item(0);

            $team['Cheerleaders'] =                 $team_data->getElementsByTagName('Cheerleaders')                    ->item(0)->nodeValue;
            $team['TreasuryBeforeInducements'] =    $team_data->getElementsByTagName('TreasuryBeforeInducements')       ->item(0)->nodeValue;
            $team['Name'] =                         $team_data->getElementsByTagName('Name')                            ->item(0)->nodeValue;
            $team['AssistantCoaches'] =             $team_data->getElementsByTagName('AssistantCoaches')                ->item(0)->nodeValue;
            $team['Popularity'] =                   $team_data->getElementsByTagName('Popularity')                      ->item(0)->nodeValue;
            $team['Apothecary'] =                   $team_data->getElementsByTagName('Apothecary')                      ->item(0)->nodeValue;
            $team['TeamId'] =                       $team_data->getElementsByTagName('TeamId')                          ->item(0)->nodeValue;
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
                $player['TdByConcession'] =         $player_data->getElementsByTagName('TdByConcession')        ->item(0)->nodeValue;
                $player['Casualty1'] =              $player_data->getElementsByTagName('Casualty1')             ->item(0)->nodeValue;
                $player['MVPByConcession'] =        $player_data->getElementsByTagName('MVPByConcession')       ->item(0)->nodeValue;
                $player['Casualty2'] =              $player_data->getElementsByTagName('Casualty2')             ->item(0)->nodeValue;
                $player['Xp'] =                     $player_data->getElementsByTagName('Xp')                    ->item(0)->nodeValue;
                $player['InflictedCasualties'] =    $player_data->getElementsByTagName('InflictedCasualties')   ->item(0)->nodeValue;
                $player['InflictedStuns'] =         $player_data->getElementsByTagName('InflictedStuns')        ->item(0)->nodeValue;
                $player['InflictedPasses'] =        $player_data->getElementsByTagName('InflictedPasses')       ->item(0)->nodeValue;
                $player['SustainedInterceptions'] = $player_data->getElementsByTagName('SustainedInterceptions')->item(0)->nodeValue;
                $player['InflictedMetersPassing'] = $player_data->getElementsByTagName('InflictedMetersPassing')->item(0)->nodeValue;
                $player['InflictedTackles'] =       $player_data->getElementsByTagName('InflictedTackles')      ->item(0)->nodeValue;
                $player['SustainedTackles'] =       $player_data->getElementsByTagName('SustainedTackles')      ->item(0)->nodeValue;
                $player['InflictedKO'] =            $player_data->getElementsByTagName('InflictedKO')           ->item(0)->nodeValue;
                $player['SustainedInjuries'] =      $player_data->getElementsByTagName('SustainedInjuries')     ->item(0)->nodeValue;
                $player['SustainedKO'] =            $player_data->getElementsByTagName('SustainedKO')           ->item(0)->nodeValue;
                $player['SustainedDead'] =          $player_data->getElementsByTagName('SustainedDead')         ->item(0)->nodeValue;
                $player['MatchPlayed'] =            $player_data->getElementsByTagName('MatchPlayed')           ->item(0)->nodeValue;
                $player['InflictedDead'] =          $player_data->getElementsByTagName('InflictedDead')         ->item(0)->nodeValue;
                $player['MVP'] =                    $player_data->getElementsByTagName('MVP')                   ->item(0)->nodeValue;
                $player['InflictedInterceptions'] = $player_data->getElementsByTagName('InflictedInterceptions')->item(0)->nodeValue;
                $player['InflictedCatches'] =       $player_data->getElementsByTagName('InflictedCatches')      ->item(0)->nodeValue;
                $player['SustainedCasualties'] =    $player_data->getElementsByTagName('SustainedCasualties')   ->item(0)->nodeValue;
                $player['InflictedInjuries'] =      $player_data->getElementsByTagName('InflictedInjuries')     ->item(0)->nodeValue;
                $player['ID'] =                     $player_data->getElementsByTagName('ID')                    ->item(0)->nodeValue;
                $player['SustainedStuns'] =         $player_data->getElementsByTagName('SustainedStuns')        ->item(0)->nodeValue;
                $player['InflictedMetersRunning'] = $player_data->getElementsByTagName('InflictedMetersRunning')->item(0)->nodeValue;
                $player['InflictedTouchdowns'] =    $player_data->getElementsByTagName('InflictedTouchdowns')   ->item(0)->nodeValue;
                $player['IdPlayerListing'] =        $player_data->getElementsByTagName('IdPlayerListing')       ->item(0)->nodeValue;
                $player['Ma'] =                     $player_data->getElementsByTagName('Ma')                    ->item(0)->nodeValue;
                $player['Name'] =                   $player_data->getElementsByTagName('Name')                  ->item(0)->nodeValue;
                $player['Ag'] =                     $player_data->getElementsByTagName('Ag')                    ->item(0)->nodeValue;
                $player['Level'] =                  $player_data->getElementsByTagName('Level')                 ->item(0)->nodeValue;
                $player['Job'] =                    $player_data->getElementsByTagName('Job')                   ->item(0)->nodeValue;
                $player['Number'] =                 $player_data->getElementsByTagName('Number')                ->item(0)->nodeValue;
                $player['Experience'] =             $player_data->getElementsByTagName('Experience')            ->item(0)->nodeValue;
                $player['IdHead'] =                 $player_data->getElementsByTagName('IdHead')                ->item(0)->nodeValue;
                $player['ListCasualties'] =         $player_data->getElementsByTagName('ListCasualties')        ->item(0)->nodeValue;
                $player['Contract'] =               $player_data->getElementsByTagName('Contract')              ->item(0)->nodeValue;
                $player['TeamId'] =                 $player_data->getElementsByTagName('TeamId')                ->item(0)->nodeValue;
                $player['Value'] =                  $player_data->getElementsByTagName('Value')                 ->item(0)->nodeValue;
                $player['Av'] =                     $player_data->getElementsByTagName('Av')                    ->item(0)->nodeValue;
                $player['St'] =                     $player_data->getElementsByTagName('St')                    ->item(0)->nodeValue;
                $player['ListSkills'] =             $player_data->getElementsByTagName('ListSkills')            ->item(0)->nodeValue;
                $player['Id'] =                     $player_data->getElementsByTagName('Id')                    ->item(0)->nodeValue;
                $player['IdPlayerTypes'] =          $player_data->getElementsByTagName('IdPlayerTypes')         ->item(0)->nodeValue;

                $team['players'][$player['Id']] = $player;
                unset($player);
            }

            if ($team['IdTeam'] == 1) {$this->team_away = $team;} else {$this->team_home = $team;}
            unset($team);

        }

        unset($match_results);


    }
}


$match = new BB2XMLMatchReport('files/test_match.svg1.xml');
require dirname(__FILE__).'/match_report.html';
