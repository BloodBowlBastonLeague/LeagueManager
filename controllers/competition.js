LeagueManager.directive('competition', function(){
	return {
		restrict: 'E',
		templateUrl: 'views/competition.html',

		controller: function($scope, $rootScope, $http, $timeout,  $routeParams) {
			$scope.competition = {};
			$rootScope.setColours([$rootScope.colourA,$rootScope.colourB]);
			$rootScope.competitionId = $routeParams.ID;
			$rootScope.orderFilter = 'round';
			$rootScope.reverse = true;
			$scope.saving = true;

			$scope.showNextDays = function(i){
				$scope.displayDay = 0;
			};

			$scope.calendarUpdate = function(){
				$http.get('Backend/competition.php?id='+$rootScope.competitionId).success(function(result){
					$scope.competition = result;
					$rootScope.title = $scope.competition.season + ' - ' + $scope.competition.competition_mode;
				});
				$http.get('Backend/calendar.php?id='+$routeParams.ID).success(function(result){
					$scope.calendar = result;
					$scope.finals = $rootScope.finalsTemplate;
					$scope.finals.splice($scope.calendar.length);
					$scope.finals.reverse();

					$scope.currentDay = $scope.calendar[0].currentDay ? $scope.calendar[0].currentDay:0;
					if($scope.calendar.length < 6){
						$scope.displayDay = 0;
					}
					else{
						$scope.displayDay = $scope.currentDay;
					}

					$scope.matchsToSave = [];
					for(i=0;$scope.calendar.length>i;i++){
						var matchs = $scope.calendar[i].matchs;
						for(j=0; matchs.length>j; j++){
							if(matchs[j].cyanide_id == null){ $scope.matchsToSave.push(matchs[j].contest_id) }
						}
					};
					$scope.saving = false;
				});
			};
			$scope.calendarUpdate();

			$scope.matchDetail = function(id,played,team1,team2){
				if(played){
					$scope.goToPage('match/'+id)
				}
			};

			//Mise à jour de la competition
			$scope.competitionUpdate = function(league,competition){
				$scope.saving = true;
				params = [window.Cyanide_Key,competition,$scope.matchsToSave];
				$http.post('Backend/match_save.php',params).then( function(result){
					$scope.calendarUpdate();
				});
			};

		}
	}
});
