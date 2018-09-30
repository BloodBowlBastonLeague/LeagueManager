LeagueManager.directive('sponsorsMatch', function() {
	return {
		restrict: 'E',
		templateUrl: 'views/sponsorsMatch.html',

		controller: function($scope, $rootScope, $http, $timeout, $routeParams) {
			$scope.competition = {};
			$rootScope.competitionId = $routeParams.ID;
			$rootScope.orderFilter = 'round';
			$rootScope.reverse = false;
			$scope.saving = true;
			$scope.showNextDays = function(i) {
				$scope.displayDay = 0;
			};

			$scope.calendarUpdate = function() {

				$http.post('backend/routes.php?action=sponsorsMatch', [$rootScope.competitionId])
					.success(function(result) {
						$scope.competition = result;
						$rootScope.setColours([$scope.competition.sponsors[0].color, $rootScope.colourB, $scope.competition.sponsors[1].color]);
						$rootScope.title = $scope.competition.site_name;
					});
				$http.get('backend/calendar.php?id=' + $routeParams.ID)
					.success(function(result) {
						$scope.calendar = result;
						$scope.finals = $rootScope.finalsTemplate;
						$scope.finals.splice($scope.calendar.length);
						$scope.finals.reverse();
						$scope.currentDay = $scope.calendar[0].currentDay ? $scope.calendar[0].currentDay : 0;
						if ($scope.calendar.length < 6) {
							$scope.displayDay = 0;
						} else {
							$scope.displayDay = $scope.currentDay;
						}

						$scope.matchsToSave = [];
						for (i = 0; $scope.calendar.length > i; i++) {
							var matchs = $scope.calendar[i].matchs;
							for (j = 0; matchs.length > j; j++) {
								if (matchs[j].cyanide_id == null) {
									$scope.matchsToSave.push(matchs[j].contest_id)
								}
							}
						};
						$scope.saving = false;
					});
			};
			$scope.calendarUpdate();


			//Check si Match joué ou non et renvoi vers la bonne fonctionnalité
			$scope.ifClicked = function(match) {
				if (match.cyanide_id) {
					$scope.goToPage('match/' + match.id)
				} else if ($rootScope.external != 1) {
					if (($rootScope.coach_id == match.coach_id_1 || $rootScope.coach_id == match.coach_id_2) && match.started == null) {
						$scope.match = match;
						$scope.showMatchDate = true;
					}
				}
			};

			$scope.rightClicked = function(match) {
				if (($rootScope.coach_id == match.coach_id_1 || $rootScope.coach_id == match.coach_id_2 || $rootScope.admin == 1) && match.cyanide_id == null) {
					$scope.match = match;
					$scope.showMatchDate = true;
				}
			};

			//ferme la fenetre de pronostics
			$scope.veilOff = function() {
				$scope.showMatchDate = false;
			};

			//Mise à jour de la competition
			$scope.competitionUpdate = function(league, competition_name) {
				$scope.saving = true;
				var params = [window.Cyanide_Key, window.Cyanide_League, $scope.competition.game_name, $scope.competition.id, $scope.matchsToSave, $scope.competition.format, $scope.currentDay];

				$http.post('backend/routes.php?action=competitionUpdate', params)
					.then(function(result) {
						$scope.calendarUpdate();
					});
			};

			//Mise à jour de date
			$scope.matchDate = function(match) {
				$http.post('backend/routes.php?action=matchDate', match)
					.then(function(result) {
						$scope.veilOff();
					});
			};


		}
	}
});