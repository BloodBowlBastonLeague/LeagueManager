LeagueManager.directive('archives', function() {
	return {
		restrict: 'E',
		templateUrl: 'views/archives.html',
		controller: function($scope, $rootScope, $http, $timeout, $routeParams) {
			$rootScope.setColours([$rootScope.colourA, $rootScope.colourB]);
			$scope.currentDay = 0
			$scope.displayDay = 0;
			$rootScope.reverse = true;
			$rootScope.title = "Les archives";
			$scope.reset = function() {
				$scope.competition = undefined;
			}
			//Récupération des compétitions
			$http.get('backend/routes.php?action=archives').success(function(result) {
				$rootScope.archives = result;
			});

			$scope.showCompetition = function(competition) {
				$rootScope.setColours([$rootScope.colourA, $rootScope.colourB, competition.standing[0].color_1, competition.standing[0].color_2, competition.standing[0].color_1, competition.standing[0].color_2]);
				console.log(competition.standing[0].logo);
				$http.get('backend/calendar.php?id=' + competition.id).success(function(result) {
					$scope.calendar = result;
					$scope.finals = $rootScope.finalsTemplate;
					$scope.finals.splice($scope.calendar.length);
					if (competition.game == 'BB2') {
						$scope.finals.reverse();
					}
				});
				$scope.competition = competition;

			}
		}
	}
});
