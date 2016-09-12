LeagueManager.directive('archives', function(){
	return {
		restrict: 'E',
		templateUrl: 'views/archives.html',
		controller: function($scope, $rootScope, $http, $timeout,  $routeParams) {
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
					$scope.finals = $rootScope.finalsTemplate;
					$scope.finals.splice($scope.calendar.length);
					if(competiion.game == 'BB2'){
						$scope.finals.reverse();
					}
				});
				$scope.competition = competition;

			}
    }
  }
});
