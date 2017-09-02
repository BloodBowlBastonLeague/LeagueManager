LeagueManager.directive("modal", function() {
	return {
		restrict: "E",
		templateUrl: "views/modal.html",
		controller: function($rootScope, $scope, $http, $timeout) {
			//Initialisation de la variable d'affichage de la liseuse
			$scope.modal = {};
			$scope.cyanideId = "";

			//masquage de la fenetre
			$scope.displayOff = function() {
				$scope.modal = {};
			};

			//Affichage/masquage des articles
			$scope.displayReader = function(article) {
				$scope.article = article;
				//Affichage/masquage de la liseuse
				$scope.modal.subject = "reader";
			};

			//Affichage/masquage de la connexion
			$scope.displayConnector = function() {
				//Affichage/masquage de la liseuse
				$scope.modal.subject = "connector";
			};

			$scope.displayMatchForm = function(id, team1, team2) {
				$scope.modal.subject = "match";
				$scope.matchToSave = id;
				$scope.teams = [team1, team2];
			};

			$scope.forumLogin = function() {
				document.forms["forumConnect"].submit();
			};

			//Affichage/masquage des équipes
			$scope.displayTeam = function(teamIdx, colour) {
				$scope.modal = $rootScope.colours[colour];
				$scope.modal.teamIdx = teamIdx;
				$scope.modal.button = "resources/img/Button_Modal.svg";
				$scope.modal.subject = "team";
			};
			//Affichage/masquage joueur
			$scope.displayPlayer = function(player) {
				$scope.modal.player = player;
				$scope.modal.subject = "player";
			};

			//Affichage/masquage des marqueurs
			$scope.displayStats = function(stats) {
				$scope.modal.subject = "stats";
				$scope.modal.stats = stats;
			};

			//Affichage/masquage des paris
			$scope.displayBets = function(competition) {
				$http
					.get(
						"Backend/bets/bets.php?action=ranking&competition=" + competition
					)
					.success(function(result) {
						$scope.ranking = result;
						$scope.modal.subject = "bets";
					});
			};
			//Affichage/masquage des paris
			$scope.displayMatchBets = function(bets) {
				$scope.prognosis = bets;
				$scope.modal.subject = "matchBets";
			};

			//Ensemble de fonctions pour gerer la couleur d'affichage des pronos
			$scope.sup = function(bets) {
				return bets.team_score_1 > bets.team_score_2;
			};
			$scope.nul = function(bets) {
				return bets.team_score_1 == bets.team_score_2;
			};
			$scope.inf = function(bets) {
				return bets.team_score_1 < bets.team_score_2;
			};
			$scope.isMe = function(bets) {
				return bets.name == $scope.user;
			};

			$scope.saveMatch = function(id, cyanideId, forumUrl) {
				$scope.displayOff();
				//Call Cyanide API
				$http
					.get(
						"http://web.cyanide-studio.com/ws/bb2/match/?key=" +
						window.Cyanide_Key +
						"&uuid=" +
						cyanideId
					)
					.success(function(result) {
						//Save Match
						$http
							.post("Backend/match_reset.php", {
								Id: id,
								cyanide_Id: cyanideId,
								started: result.match.started,
								score_1: result.match.teams[0].score,
								nbsupporters_1: result.match.teams[0].nbsupporters,
								possessionball_1: result.match.teams[0].possessionball,
								occupationown_1: result.match.teams[0].occupationown,
								occupationtheir_1: result.match.teams[0].occupationtheir,
								sustainedcasualties_1: result.match.teams[1]
									.inflictedcasualties,
								sustainedko_1: result.match.teams[1].inflictedko,
								sustainedinjuries_1: result.match.teams[1].inflictedinjuries,
								sustaineddead_1: result.match.teams[1].inflicteddead,
								score_2: result.match.teams[1].score,
								nbsupporters_2: result.match.teams[1].nbsupporters,
								possessionball_2: result.match.teams[1].possessionball,
								occupationown_2: result.match.teams[1].occupationown,
								occupationtheir_2: result.match.teams[1].occupationtheir,
								sustainedcasualties_2: result.match.teams[0]
									.inflictedcasualties,
								sustainedko_2: result.match.teams[0].inflictedko,
								sustainedinjuries_2: result.match.teams[0].inflictedinjuries,
								sustaineddead_2: result.match.teams[0].inflicteddead,
								forum_url: forumUrl,
								json: JSON.stringify(result)
							})
							.then(function(result) {
								console.log("Match saved");
							});

						//loop through teams
						for (t = 0; t < 2; t++) {
							console.log(result);
							var roster = result.match.teams[t].roster;
							var team = result.teams[t];

							//Save team
							$http
								.post("Backend/team_save.php", {
									id: team.idteamlisting,
									name: team.name,
									cyanide_id: team.id,
									coach_id: team.idcoach,
									race_id: team.idraces,
									apothecary: team.apothecary,
									assistantcoaches: team.assistantcoaches,
									cheerleaders: team.cheerleaders,
									cash: team.cash,
									rerolls: team.rerolls,
									popularity: team.popularity,
									value: team.value,
									stadiumname: team.stadiumname,
									leitmotiv: team.leitmotiv,
									logo: team.logo,
									json: JSON.stringify(team)
								})
								.then(function(result) {
									console.log("Team saved");
								});
							//loop through players
							for (p = 0; p < roster.length; p++) {
								//Save player

								if (
									roster[p].name.indexOf("PLAYER_NAMES_CHAMPION") == -1 &&
									JSON.stringify(roster[p].skills) != '["Loner"]'
								) {
									$http
										.post("Backend/player_save.php", {
											team_id: team.id,
											match_id: cyanideId,
											type: roster[p].type,
											name: roster[p].name,
											level: roster[p].level,
											xp: roster[p].xp,
											xp_gain: roster[p].xp_gain,
											matchplayed: roster[p].matchplayed,
											mvp: roster[p].mvp,
											attributes: JSON.stringify(roster[p].attributes),
											skills: JSON.stringify(roster[p].skills),
											dead: roster[p].stats.sustaineddead,
											injured: roster[p].stats.sustainedcasualties,
											inflictedpasses: roster[p].stats.inflictedpasses,
											inflictedcatches: roster[p].stats.inflictedcatches,
											inflictedinterceptions: roster[p].stats
												.inflictedinterceptions,
											inflictedtouchdowns: roster[p].stats.inflictedtouchdowns,
											inflictedcasualties: roster[p].stats.inflictedcasualties,
											inflictedstuns: roster[p].stats.inflictedstuns,
											inflictedko: roster[p].stats.inflictedko,
											inflictedinjuries: roster[p].stats.inflictedinjuries,
											inflicteddead: roster[p].stats.inflicteddead,
											inflictedtackles: roster[p].stats.inflictedtackles,
											inflictedmeterspassing: roster[p].stats
												.inflictedmeterspassing,
											inflictedmetersrunning: roster[p].stats
												.inflictedmetersrunning,
											sustainedinterceptions: roster[p].stats
												.sustainedinterceptions,
											sustainedcasualties: roster[p].stats.sustainedcasualties,
											sustainedstuns: roster[p].stats.sustainedstuns,
											sustainedko: roster[p].stats.sustainedko,
											sustainedinjuries: roster[p].stats.sustainedinjuries,
											sustainedtackles: roster[p].stats.sustainedtackles,
											sustaineddead: roster[p].stats.sustaineddead
										})
										.then(function(result) {
											console.log("player saved", result);
										});
								}
							}

							//END players loop
						}

						//END teams loop
					});
			};
		}
	};
});