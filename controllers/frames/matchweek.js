LeagueManager.directive('matchweek', function() {
	return {
		restrict: 'E',
		templateUrl: '../views/frames/matchweek.html',
		controller: function($scope, $rootScope, $http, $timeout, $routeParams) {
			$rootScope.setColours([$rootScope.colourA, $rootScope.colourB]);
			$http
				.post('Backend/routes.php?action=competitionCalendar', [$routeParams.ID])
				.success(function(result) {
					$scope.calendar = result;
					if (window.round > 5) {
						var corrector = 6;
					} else {
						var corrector = 1;
					}
					$scope.matchDay = $scope.calendar[window.round - corrector];
					$scope.finals = $rootScope.eliminations.splice($scope.calendar.length, $scope.calendar.length);
				});
		}
	}
});