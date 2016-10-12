LeagueManager.directive('league', function(){
	return {
		restrict: 'E',
		templateUrl: 'views/league.html',
		controller: function($scope, $rootScope, $http, $timeout,  $routeParams) {
      $rootScope.setColours([$rootScope.colourA,$rootScope.colourB]);

      $rootScope.title = "Tout sur la ligue";
      /*Alimentation de l'article aléatoire
      $scope.randomSide = $rootScope.randomArticle(['presentation']);
      $("#randomPresentation1 .image").css({'background':'#333333 url(resources/img/articles/article_'+$scope.randomSide.article_id+'.jpg) no-repeat','background-size':'cover'});*/

			//Enregistrement d'une saison
			$scope.seasonSave = function(league,Cyanide_league,competition){
				var competitions = []
				$http.get('http://web.cyanide-studio.com/ws/bb2/contests/?key=' + window.Cyanide_Key + '&competition=' + competition + '&status=*&league=' + Cyanide_league ).success(function(result){
					$scope.season = result.upcoming_matches;

					for(i=0; i<$scope.season.length; i++){
						//alert(i);
						$scope.competitionIdx = competitions.map(function(e) { return e.competition_id; }).indexOf($scope.season[i].competition_id);

						if($scope.competitionIdx == -1){
							var competition = {
								"league" : league,
								"competition": $scope.season[i].competition,
								"competition_id": $scope.season[i].competition_id,
								"format": $scope.season[i].format,
							};
							competitions.push(competition);
						}
					}

					for(j=0; j<competitions.length; j++){
							//alert(j);
						$http.post('Backend/season_save.php',competitions[j]).then( function(result){

							for(k=0; k<$scope.season.length; k++){
									var match = {
										"competition_id": $scope.season[k].competition_id,
										"format": $scope.season[k].format,
										"round": $scope.season[k].round,
										"contest_id": $scope.season[k].contest_id,
										"coach_id_1": $scope.season[k].opponents[0].coach.id,
										"team_id_1": $scope.season[k].opponents[0].team.id,
										"team_name_1": $scope.season[k].opponents[0].team.name,
										"team_logo_1": $scope.season[k].opponents[0].team.logo,
										"team_value_1": $scope.season[k].opponents[0].team.value,
										"team_motto_1": $scope.season[k].opponents[0].team.motto,
										"coach_id_2": $scope.season[k].opponents[1].coach.id,
										"team_id_2": $scope.season[k].opponents[1].team.id,
										"team_name_2": $scope.season[k].opponents[1].team.name,
										"team_logo_2": $scope.season[k].opponents[1].team.logo,
										"team_value_2": $scope.season[k].opponents[1].team.value,
										"team_motto_2": $scope.season[k].opponents[1].team.motto
									};
									//alert(k);
									$http.post('Backend/season_match_save.php',match).then( function(result){ console.log(result.data); });


							}
						});
					}

				});
			};

			//Mise à jour d'une saison
			$scope.seasonUpdate = function(league){
				$http.get('http://web.cyanide-studio.com/ws/bb2/contests/?key=' + window.Cyanide_Key + '&status=played&league=' + league ).success(function(result){
					$scope.savingMatches = result.upcoming_matches;
					for(i=0;i<$scope.savingMatches.length;i++){
						console.log('Backend/match_test.php?id=' + $scope.savingMatches[i].contest_id + '&uuid=' + $scope.savingMatches[i].match_uuid);
						$http.get('Backend/match_test.php?id=' + $scope.savingMatches[i].contest_id + '&uuid=' + $scope.savingMatches[i].match_uuid ).success(function(result){
							console.log(result);
							if(result.started == null){

								//Call Cyanide API
								$http.get('http://web.cyanide-studio.com/ws/bb2/match/?key=' + window.Cyanide_Key + '&uuid=' + result.cyanide_id ).success(function(result){

								//Save Match
								$http.post('Backend/match_save2.php',{
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

									//$rootScope.calendarUpdate();
									//$rootScope.competitionUpdate();

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
