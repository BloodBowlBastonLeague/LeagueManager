LeagueManager.directive('match', function(Restangular){
	return {
		restrict: 'E',
		templateUrl: 'views/match.html',
		controller: function($scope, $rootScope, $http, $timeout, Restangular, $routeParams) {
			$scope.matchID = $routeParams.ID;

			$http.get('resources/json/team.json').success(function(result){
				$scope.tmpTeams = result;

				//$http.get('resources/json/match.json').success(function(result){
				//$scope.match = result.match;
				$http.get('http://web.cyanide-studio.com/ws/bb2/match/?key=####&id=' + $scope.matchID).then( function(result) {
				$rootScope.match = result.data.match;
				$rootScope.title = $rootScope.match.competitionname;
				console.log($rootScope.match);
				$scope.teams = result.data.teams;
					//Récupération des couleurs - Fetching colours
					for(i=0; i < $scope.teams.length; i++){
						$scope.teamIdx = $scope.tmpTeams.map(function(e) { return e.teamID; }).indexOf($scope.teams[i].id);
						if($scope.teamIdx == -1){
							if((i == 0 && $rootScope.match.teams[0].score > $rootScope.match.teams[1].score ) || (i == 1 && $rootScope.match.teams[0].score < $rootScope.match.teams[1].score )){
								$scope.teamIdx = 1;
							}
							else {
								$scope.teamIdx = 0;
							}
						}
						$scope.teams[i].color1 = $scope.tmpTeams[$scope.teamIdx].color1;
						$scope.teams[i].color2 = $scope.tmpTeams[$scope.teamIdx].color2;
						$scope.teams[i].pop =[];
						$scope.teams[i].newPop =[];
						console.log($scope.teams[i]);
						for(j=0;j<$rootScope.match.teams[i].popularitybeforematch;j++){ $scope.teams[i].pop.push(j); }
						for(k=0;k<$rootScope.match.teams[i].popularitygain;k++){ $scope.teams[i].newPop.push(k); }

					}
					$rootScope.match.started = $scope.match.started.replace(/-/g,"").replace(/ /g,"T")+"Z";

					$rootScope.setColours([$rootScope.colourA,$rootScope.colourB,$scope.teams[0].color1,$scope.teams[0].color2,$scope.teams[1].color1,$scope.teams[1].color2]);
					//Team Images
					$('#LogoLeft').css({"background": "url(resources/logo/Logo_" + $scope.teams[0].logo + ".png) center center no-repeat", "background-size":"contain"});
					$('#LogoRight').css({"background": "url(resources/logo/Logo_" + $scope.teams[1].logo + ".png) center center no-repeat", "background-size":"contain"});
				});
			});
		}
	}

});
