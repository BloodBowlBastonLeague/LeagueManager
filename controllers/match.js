LeagueManager.directive('match', function(Restangular){
	return {
		restrict: 'E',
		templateUrl: 'views/match.html',
		controller: function($scope, $rootScope, $http, $timeout, Restangular, $routeParams) {

			$http.get('resources/json/team.json').then(function(result){
				$scope.teams = result.data;

				$http.get('resources/json/match.json').then(function(result){
					$scope.match = result.data.match;
					//Récupération des couleurs - Fetching colours
					for(i=0; i < $scope.match.teams.length; i++){
						$scope.teamIdx = $scope.teams.map(function(e) { return e.teamID; }).indexOf($scope.match.teams[i].idTeamListing);
						$scope.match.teams[i].color1 = $scope.teams[$scope.teamIdx].color1;
						$scope.match.teams[i].color2 = $scope.teams[$scope.teamIdx].color2;
					}
					$scope.match.started = $scope.match.started.replace(/-/g,"").replace(/ /g,"T")+"Z";

					$rootScope.setColours([$rootScope.colourA,$rootScope.colourB,$scope.match.teams[0].color1,$scope.match.teams[0].color2,$scope.match.teams[1].color1,$scope.match.teams[1].color2]);
					//Team Images
					$('#LogoLeft').css({"background": "url(resources/img/teams/logo" + $scope.match.teams[0].idTeamListing + ".png) center center no-repeat", "background-size":"contain"});
					$('#LogoRight').css({"background": "url(resources/img/teams/logo" + $scope.match.teams[1].idTeamListing + ".png) center center no-repeat", "background-size":"contain"});
				});
			});
		}
	}

});
