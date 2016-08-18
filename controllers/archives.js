LeagueManager.directive('archives', function(Restangular){
	return {
		restrict: 'E',
		templateUrl: 'views/archives.html',
		controller: function($scope, $rootScope, $http, $timeout, Restangular, $routeParams) {
      $rootScope.setColours([$rootScope.colourA,$rootScope.colourB]);
			$scope.currentDay = 0
			$scope.displayDay = 0;
			$rootScope.reverse = true;
      $rootScope.title = "Les archives";

			//Récupération des compétitions
			$http.get('Backend/competitions.php?active=0').success(function(result){
				$rootScope.archives = result;
			});

			$scope.showCompetition = function(competition){
				$http.get('Backend/calendar.php?id='+competition.id).success(function(result){
					$scope.calendar = result;
				});
				$scope.competition = competition;

			}
    }
  }
});
