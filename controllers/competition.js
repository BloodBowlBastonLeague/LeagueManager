LeagueManager.directive('competition', function(){
	return {
		restrict: 'E',
		templateUrl: 'views/competition.html',

		controller: function($scope, $rootScope, $http, $timeout,  $routeParams) {
			$scope.competition = {};
			$rootScope.setColours([$rootScope.colourA,$rootScope.colourB]);
			$rootScope.competitionId = $routeParams.ID;
			$rootScope.orderFilter = 'round';
			$rootScope.reverse = true;

			$scope.showNextDays = function(i){
				$scope.displayDay = 0;
			};

			$http.get('Backend/competition.php?id='+$rootScope.competitionId).success(function(result){
				$scope.competition = result;
				$rootScope.title = $scope.competition.season + ' - ' + $scope.competition.competition_mode;
			});

			$scope.competitionArticles = function(){
				var idx = $rootScope.competitions.map(function(e) { return e.id; }).indexOf($routeParams.ID);
				$scope.competition.article = idx.length>0? $rootScope.competitions[idx].article:{};
			};

			if($rootScope.competitionsFetched == 1){
				$scope.competitionArticles();
			}
			$rootScope.$on('articlesFetched',  function(){
				$scope.competitionArticles();
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
			});

			$scope.matchDetail = function(id,played,team1,team2){

				if(played){
					$scope.goToPage('match/'+id)
				}
				else{
					//if($rootScope.admin==1){
				//		$scope.displayMatchForm(id,team1,team2);
					//}
				}
			};

			$scope.calendarUpdate = function(){
				$http.get('Backend/calendar.php?id='+$routeParams.ID).success(function(result){
					$scope.calendar = result;
					$scope.currentDay = $scope.calendar[0].currentDay;
					$scope.maxDay = $scope.calendar.length;
				});
			};

			//Mise à jour de la competition
			$scope.competitionUpdate = function(league,competition){
				$http.get('http://web.cyanide-studio.com/ws/bb2/contests/?key=' + window.Cyanide_Key + '&competition=' + competition + '&status=played&league=' + league ).success(function(result){
					$scope.savingMatches = result.upcoming_matches;
					for(i=0;i<$scope.savingMatches.length;i++){
						$http.get('Backend/match_test.php?id=' + $scope.savingMatches[i].contest_id + '&uuid=' + $scope.savingMatches[i].match_uuid ).success(function(result){

							if(result.started == null){

								//Call Cyanide API
								$http.get('http://web.cyanide-studio.com/ws/bb2/match/?key=' + window.Cyanide_Key + '&uuid=' + result.cyanide_id ).success(function(result){

								//Save Match
								$http.post('Backend/match_save_auto.php',{
									cyanide_Id : result.uuid,
									started : result.match.started,
									score_1 : result.match.teams[0].score,
									nbsupporters_1 : result.match.teams[0].nbsupporters,
									possessionball_1 : result.match.teams[0].possessionball,
									occupationown_1 : result.match.teams[0].occupationown,
									occupationtheir_1 : result.match.teams[0].occupationtheir,
									sustainedcasualties_1 : result.match.teams[1].inflictedcasualties,
									sustainedko_1 : result.match.teams[1].inflictedko,
									sustainedinjuries_1 : result.match.teams[1].inflictedinjuries,
									sustaineddead_1 : result.match.teams[1].inflicteddead,
									score_2 : result.match.teams[1].score,
									nbsupporters_2 : result.match.teams[1].nbsupporters,
									possessionball_2 : result.match.teams[1].possessionball,
									occupationown_2 : result.match.teams[1].occupationown,
									occupationtheir_2 : result.match.teams[1].occupationtheir,
									sustainedcasualties_2 : result.match.teams[0].inflictedcasualties,
									sustainedko_2 : result.match.teams[0].inflictedko,
									sustainedinjuries_2 : result.match.teams[0].inflictedinjuries,
									sustaineddead_2 : result.match.teams[0].inflicteddead,
									json : JSON.stringify(result)
								}).then( function(result){console.log(result);});

									$scope.calendarUpdate();
									$http.get('Backend/competition.php?id='+$rootScope.competitionId).success(function(result){
										$scope.competition = result;
									});

									//loop through teams
									for(t=0; t<2; t++){
										var roster = result.match.teams[t].roster;
										var team = result.teams[t];
										//Save team
										$http.post('Backend/team_save.php',{
											name : team.name,
											cyanide_id : team.id,
											coach_id : team.idcoach,
											race_id : team.idraces,
											apothecary : team.apothecary,
											assistantcoaches : team.assistantcoaches,
											cheerleaders : team.cheerleaders,
											cash : team.cash,
											rerolls : team.rerolls,
											popularity : team.popularity,
											value : team.value,
											stadiumname : team.stadiumname,
											leitmotiv : team.leitmotiv,
											logo : team.logo,
											json : JSON.stringify(team)
										}).then( function(result){
											console.log("Team saved");
										});
											//loop through players
											for(p=0; p<roster.length; p++){

												//Save player
												if(roster[p].name.indexOf("PLAYER_NAMES_CHAMPION")==-1 && JSON.stringify(roster[p].skills) != '["Loner"]'){
													$http.post('Backend/player_save.php',{
														team_id : team.id,
														match_id : result.uuid,
														type : roster[p].type,
														name : roster[p].name,
														level : roster[p].level,
														xp : roster[p].xp,
														xp_gain : roster[p].xp_gain,
														matchplayed : roster[p].matchplayed,
														mvp : roster[p].mvp,
														attributes : JSON.stringify(roster[p].attributes),
														skills : JSON.stringify(roster[p].skills),
														dead : roster[p].stats.sustaineddead,
														injured : roster[p].stats.sustainedcasualties,
														inflictedpasses :	roster[p].stats.inflictedpasses,
														inflictedcatches : roster[p].stats.inflictedcatches,
														inflictedinterceptions : roster[p].stats.inflictedinterceptions,
														inflictedtouchdowns : roster[p].stats.inflictedtouchdowns,
														inflictedcasualties : roster[p].stats.inflictedcasualties,
														inflictedstuns : roster[p].stats.inflictedstuns,
														inflictedko : roster[p].stats.inflictedko,
														inflictedinjuries : roster[p].stats.inflictedinjuries,
														inflicteddead : roster[p].stats.inflicteddead,
														inflictedtackles : roster[p].stats.inflictedtackles,
														inflictedmeterspassing : roster[p].stats.inflictedmeterspassing,
														inflictedmetersrunning : roster[p].stats.inflictedmetersrunning,
														sustainedinterceptions : roster[p].stats.sustainedinterceptions,
														sustainedcasualties : roster[p].stats.sustainedcasualties,
														sustainedstuns : roster[p].stats.sustainedstuns,
														sustainedko : roster[p].stats.sustainedko,
														sustainedinjuries : roster[p].stats.sustainedinjuries,
														sustainedtackles : roster[p].stats.sustainedtackles,
														sustaineddead : roster[p].stats.sustaineddead
													} ).then( function(result){ console.log("player saved",result) });
												}
											}
											//END players loop
									}
									//END teams loop
							});
							}
						});
					}
				});
			};


		}
	}
});
