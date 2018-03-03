LeagueManager.directive("match", function() {
	return {
		restrict: "E",
		templateUrl: "views/match.html",
		controller: function($scope, $rootScope, $http, $timeout, $routeParams) {
			$scope.matchID = $routeParams.ID;
			$rootScope.match = {};

			$scope.tmpTeams = [{
					teamID: "0",
					color1: "#A9A9A9",
					color2: "#8C7853"
				},
				{
					teamID: "1",
					color1: "#CFB53B",
					color2: "#C0C0C0"
				}
			];

			$http
				.get("Backend/match.php?id=" + $scope.matchID)
				.success(function(result) {
					var data = JSON.parse(result.json);
					$rootScope.match = data.match;
					$rootScope.match.round = result.round;
					$rootScope.match.coach_id_1 = result.coach_id_1;
					$rootScope.match.coach_id_2 = result.coach_id_2;
					$rootScope.match.cyanide_id = result.cyanide_id;
					$rootScope.match.competition_id = result.competition_id;
					$rootScope.match.started = result.started;
					$rootScope.title = $rootScope.match.competitionname;
					$scope.stadium = data.teams[0].stadiumname;
					$scope.teams = $rootScope.match.teams;

					$scope.teams[0].id = result.team_id_1;
					$scope.teams[0].color1 = result.team_1_color_1;
					$scope.teams[0].color2 = result.team_1_color_2;

					$scope.teams[1].id = result.team_id_2;
					$scope.teams[1].color1 = result.team_2_color_1;
					$scope.teams[1].color2 = result.team_2_color_2;
					$rootScope.match.forum_id = result.forum_id;
					//$rootScope.match.discussion = result.forum_url;
					$scope.bets = result.bets;

					$scope.forum = $rootScope.competitionForum.filter(function(obj) {
						return obj.id === $rootScope.match.competition_id;
					});


					//Récupération des couleurs - Fetching colours
					for (i = 0; i < 2; i++) {
						$scope.teamIdx = $scope.tmpTeams
							.map(function(e) {
								return e.teamID;
							})
							.indexOf($scope.teams[i].id);
						if ($scope.teamIdx == -1) {
							if (
								(i == 0 &&
									$rootScope.match.teams[0].score >
									$rootScope.match.teams[1].score) ||
								(i == 1 &&
									$rootScope.match.teams[0].score <
									$rootScope.match.teams[1].score)
							) {
								$scope.teamIdx = 1;
							} else {
								$scope.teamIdx = 0;
							}
						}

						$scope.teams[i].color1 = $scope.teams[i].color1 != undefined ?
							$scope.teams[i].color1 :
							$scope.tmpTeams[$scope.teamIdx].color1;
						$scope.teams[i].color2 = $scope.teams[i].color2 != undefined ?
							$scope.teams[i].color2 :
							$scope.tmpTeams[$scope.teamIdx].color2;
						$scope.teams[i].pop = [];
						$scope.teams[i].newPop = [];
						for (
							j = 0; j < $rootScope.match.teams[i].popularitybeforematch; j++
						) {
							$scope.teams[i].pop.push(j);
						}
						for (k = 0; k < $rootScope.match.teams[i].popularitygain; k++) {
							$scope.teams[i].newPop.push(k);
						}
					}
					$rootScope.match.started =
						$scope.match.started.replace(/-/g, "").replace(/ /g, "T") + "Z";

					$rootScope.setColours([
						$rootScope.colourA,
						$rootScope.colourB,
						$scope.teams[0].color1,
						$scope.teams[0].color2,
						$scope.teams[1].color1,
						$scope.teams[1].color2
					]);

					$scope.stadiumBG = {
						background: "url(resources/img/stadium/" +
							$rootScope.match.stadium +
							".png) center center no-repeat, rgba(50, 50, 50, 0.85) ",
						"background-size": "cover, cover",
						"border-color": $rootScope.colours[1].hexa
					};
					//Team Images
					$(".helmet1 .helmet-logo").css({
						background: "url(../resources/logo/Logo_" +
							$scope.teams[0].teamlogo +
							".png) center center no-repeat",
						"background-size": "cover"
					});
					$scope.team_1_BG = {
						position: "absolute",
						width: "100%",
						height: "100%",
						background: "url(../resources/logo/Logo_" +
							$scope.teams[0].teamlogo +
							".png) center center no-repeat",
						"background-size": "50% auto",
						"z-index": "-1"
					};
					$scope.helmet_1_svg =
						"resources/helmet/helmet_" + $scope.teams[0].idraces + ".svg";
					$(".helmet2 .helmet-logo").css({
						background: "url(../resources/logo/Logo_" +
							$scope.teams[1].teamlogo +
							".png) center center no-repeat",
						"background-size": "contain"
					});
					$scope.team_2_BG = {
						position: "absolute",
						width: "100%",
						height: "100%",
						background: "url(../resources/logo/Logo_" +
							$scope.teams[1].teamlogo +
							".png) center center no-repeat",
						"background-size": "50% auto",
						"z-index": "-1"
					};
					$scope.helmet_2_svg =
						"resources/helmet/helmet_" + $scope.teams[1].idraces + ".2.svg";
				});

			$scope.matchRefresh = function() {
				if ($rootScope.admin == 1) {
					$scope.displayMatchForm(
						$scope.matchID,
						$scope.teams[0].id,
						$scope.teams[1].id
					);
				}
			};
		}
	};
});
