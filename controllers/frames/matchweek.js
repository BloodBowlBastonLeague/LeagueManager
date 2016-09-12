LeagueManager.directive('matchweek', function(){
	return {
		restrict: 'E',
		templateUrl: '../views/frames/matchweek.html',
		controller: function($scope, $rootScope, $http, $timeout,  $routeParams) {
			$rootScope.setColours([$rootScope.colourA,$rootScope.colourB]);
			$http.get('../Backend/calendar.php?id='+window.competition).success(function(result){
				$scope.calendar = result;
				$scope.matchDay = $scope.calendar[window.round-1];
				$scope.finals = $rootScope.eliminations.splice(6-$scope.calendar.length,$scope.calendar.length);
			});
		}
	}
});
