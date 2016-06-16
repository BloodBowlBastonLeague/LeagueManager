LeagueManager.directive('competition', function(Restangular){
	return {
		restrict: 'E',
		templateUrl: 'views/competition.html',

		controller: function($scope, $rootScope, $http, $timeout, Restangular, $routeParams) {
			$scope.competition={};
			$rootScope.setColours([$rootScope.colourA,$rootScope.colourB]);
			$rootScope.competitionId = $routeParams.ID;
			$rootScope.orderFilter = 'day';
			$rootScope.reverse = true;
			$scope.showNextDays = function(i){
				$scope.displayDay = 0;
			};

			$scope.competitionBuild = function(){
				var idx = $rootScope.competitions.map(function(e) { return e.id; }).indexOf($routeParams.ID);
				$scope.competition = $rootScope.competitions[idx];
				$rootScope.title = $scope.competition.league + ' - Joute de ' + $scope.competition.site_name;
			};

			if($rootScope.competitionsFetched == 1){
				$scope.competitionBuild();
			}
			$rootScope.$on('articlesFetched',  function(){
				$scope.competitionBuild();
			});

			$http.get('Backend/calendar.php?id='+$routeParams.ID).success(function(result){
				$scope.calendar = result;
				$scope.currentDay = $scope.calendar[0].currentDay;
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
					if($rootScope.admin==1){
						$scope.displayMatchForm(id,team1,team2);
					}
				}
			};

			$rootScope.calendarUpdate = function(){
				$http.get('Backend/calendar.php?id='+$routeParams.ID).success(function(result){
					$scope.calendar = result;
					$scope.currentDay = $scope.calendar[0].currentDay;
				});
			};

		}
	}
});
