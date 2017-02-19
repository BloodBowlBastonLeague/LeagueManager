LeagueManager.directive('competition', function(){
	return {
		restrict: 'E',
		templateUrl: 'views/competition.html',

		controller: function($scope, $rootScope, $http, $timeout,  $routeParams) {
			$scope.competition = {};
		        $scope.bet; //Match courant sur lequel on fait les pronos
		        $scope.affBets=false; //gere l'affichage de la fenetre des pronos
		        $scope.errorBets=false; //gere l'affichage du message d'erreur
		        $scope.errorMessage=""; //Message d'erreur
			$rootScope.setColours([$rootScope.colourA,$rootScope.colourB]);
			$rootScope.competitionId = $routeParams.ID;
			$rootScope.orderFilter = 'round';
			$rootScope.reverse = true;
			$scope.saving = true;

			$scope.showNextDays = function(i){
				$scope.displayDay = 0;
			};

			$scope.calendarUpdate = function(){
				$http.get('Backend/competition.php?id='+$rootScope.competitionId).success(function(result){
					$scope.competition = result;
					$rootScope.title = $scope.competition.season + ' - ' + $scope.competition.competition_mode;
				});
				$http.get('Backend/calendar.php?id='+$routeParams.ID).success(function(result){
					$scope.calendar = result;
					$scope.finals = $rootScope.finalsTemplate;
					$scope.finals.splice($scope.calendar.length);
					$scope.finals.reverse();

					$scope.currentDay = $scope.calendar[0].currentDay ? $scope.calendar[0].currentDay:0;
					if($scope.calendar.length < 6){
						$scope.displayDay = 0;
					}
					else{
						$scope.displayDay = $scope.currentDay;
					}

					$scope.matchsToSave = [];
					for(i=0;$scope.calendar.length>i;i++){
						var matchs = $scope.calendar[i].matchs;
						for(j=0; matchs.length>j; j++){
							if(matchs[j].cyanide_id == null){ $scope.matchsToSave.push(matchs[j].contest_id) }
						}
					};
					$scope.saving = false;
				});
			};
			$scope.calendarUpdate();


		  $scope.matchDetail = function(id,played,team1,team2){

				if(played){
					$scope.goToPage('match/'+id)
				}
				else{
					if($rootScope.admin==1){
						$scope.displayMatchForm(id,team1,team2);
					}
				}
			};

		    //Check si pronos déjà fait sur un match donné par le user connecté
		    $scope.betsAlreadyDone = function(match){
 			for($v in match.bets){
			    if(match.bets[$v]["name"]==$scope.user)
				return true;
			}
			return false;
		    }

		    //Check si Match joué ou non et renvoi faire la bonne fonctionnalité
		    $scope.ifClicked= function(match){
			if(match.started){
			    $scope.matchDetail(match.id,match.started,match.team_id_1,match.team_id_2);
			}
			else{
			    $scope.doBets(match);
			}
		    };

		    //Affichage stats des pronos
		    $scope.ratio = function(match){
			$res="";
			$a=0;
			$b=0;
			$e=0;
			for($v in match.bets){
			    $s1=Number(match.bets[$v]["team_score_1"]);
			    $s2=Number(match.bets[$v]["team_score_2"]);
			    if($s1==$s2)
				$e++;
			    else if($s1>$s2)
				$a++;
			    else
				$b++
			}
			$res=$a + " - " + $e + " - " + $b;
			return $res;
		    };

		    //Ensemble de fonctions pour gerer la couleur d'affichage des pronos
		    $scope.sup = function(bets){
			return bets.team_score_1 > bets.team_score_2;
		    }
		    $scope.nul = function(bets){
			return bets.team_score_1 == bets.team_score_2;
		    }
		    $scope.inf = function(bets){
			return bets.team_score_1 < bets.team_score_2;
		    }
		    $scope.isMe = function(bets){
			return bets.name==$scope.user;
		    }

		    //ouvre la fenetre de pronostics en fixant le match
		    $scope.doBets = function(match){
			$scope.bet=match;
			$scope.affBets=true;
		    };

		    //ferme la fenetre de pronostics
		    $scope.betsOff = function(){
			$scope.affBets=false;
			$scope.errorBets=false;
		    };

		    //Gestion des Pronos
		    $scope.BetsDone = function(bets1, bets2){
			//Test des données récuperées
			if($scope.user=="Anonymous"){
			    $scope.errorMessage="Vous n'êtes pas connecté";
			    $scope.errorBets=true;
			}
			else if(bets1==null || bets2==null){
			    $scope.errorMessage="Pronostics mal renseignés";
			    $scope.errorBets=true;
			}
			else{
			    $scope.errorBets=false;
			    $newBets=true;

			    //On cherche si le prono a déjà était fait
			    //Si oui MAJ
			    //A transformer en While (ca c'est moche mais je connais la syntaxe)
			    for($v in $scope.bet.bets){
				if($scope.bet.bets[$v]["name"]==$scope.user){
				    $newBets=false;
				    //modif en live
				    $scope.bet.bets[$v]["team_score_1"]=bets1;
				    $scope.bet.bets[$v]["team_score_2"]=bets2;
				    var prognos= {
					"name": $scope.user,
					"bets_1": bets1,
					"bets_2": bets2,
					"id_match": $scope.bet.id
				    };
				    //MAJ en base
				    $http.post('Backend/bets/bets.php?action=updateBet',prognos).then( function(result){ console.log(result.data);});
				}
			    }
			    //Si non Ajout d'un bets
			    if($newBets){
				//Modif en live
				$tmp=[];
				$tmp["name"]=$scope.user;
				$tmp["team_score_1"]=bets1;
				$tmp["team_score_2"]=bets2;
				$scope.bet.bets.push($tmp);
				//Ajout en base
				var prognos= {
				    "name": $scope.user,
				    "bets_1": bets1,
				    "bets_2": bets2,
				    "id_match": $scope.bet.id
				};
				$http.post('Backend/bets/bets.php?action=addBet',prognos).then( function(result){ console.log(result.data);});
			    }

			    //Fermeture de la fenetre de bets
			    $scope.affBets=false;
			}
		    };



			$scope.calendarUpdate = function(){
				$http.get('Backend/calendar.php?id='+$routeParams.ID).success(function(result){
					$scope.calendar = result;
					$scope.currentDay = $scope.calendar[0].currentDay;
					$scope.maxDay = $scope.calendar[$scope.calendar.length].currentDay;
				});

			};

			//Mise à jour de la competition
			$scope.competitionUpdate = function(league,competition){
				$scope.saving = true;
				params = [window.Cyanide_Key,competition,$scope.matchsToSave];
				$http.post('Backend/match_save.php',params).then( function(result){
					$scope.calendarUpdate();
				});
			};

		}
	}
});
