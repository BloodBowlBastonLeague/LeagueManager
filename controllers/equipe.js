LeagueManager.directive('equipe', function(Restangular){
	return {
		restrict: 'E',
		templateUrl: 'views/equipe.html',
		css: 'css/equipe.css',
		controller: function($scope, $rootScope, $http, $timeout, Restangular, $routeParams) {

			//LM_logo
			$('#LM_logo').css({"background": "url(resources/img/teams/logo"+$routeParams.ID+".png) center center no-repeat", "background-size":"contain"})
			$('#teamPhoto').css({"background": "url(resources/img/teams/photo"+$routeParams.ID+".png) center center no-repeat", "background-size":"cover"})
			$scope.activePlayer = false;

			//Récupération du classement en JSON (temporaire)
			$http.get('resources/json/team.json').then(function(result){
				$scope.teams = result.data;
				//à supprimer et mettre dans le chemin de l'API
				$scope.teamID = $scope.teams.map(function(e) { return e.teamID; }).indexOf($routeParams.ID);
				$scope.team = $scope.teams[$scope.teamID];
				$rootScope.title = $scope.team.name;
				$scope.team.pop = [];
		    $rootScope.setColors($scope.team.color1,$scope.team.color1,$scope.team.color2);
				for(i=0;i<$scope.team.fame;i++){ $scope.team.pop.push(i); }
				$scope.teamArticle();
			});

			//Gestion du RP
			$scope.teamArticle = function(categories){
				$scope.team.articles = [];
				for(i=0;i<$rootScope.articles.length;i++){
					if($scope.team.teamID === $rootScope.articles[i].teamID){
						$rootScope.articles[i].summary = $rootScope.articles[i].text.substr(0, $rootScope.articles[i].text.indexOf('<br/><br/>'))
						$scope.team.articles.push($rootScope.articles[i]);
					}
				}
			};

			$scope.showPlayer = function(id){
				if(id){
					$scope.activePlayer = true;
					id = $scope.team.players.map(function(e) { return e.number; }).indexOf(id);
					$scope.player = $scope.team.players[id];
				}
				else{
					$scope.activePlayer = false;
				}
			};
			
		}
	}
});
