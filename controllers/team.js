LeagueManager.directive('team', function(Restangular){
	return {
		restrict: 'E',
		templateUrl: 'views/team.html',
		controller: function($scope, $rootScope, $http, $timeout, Restangular, $routeParams) {
			$scope.teamID = $routeParams.ID;
			$scope.activePlayer = false;
			$rootScope.orderFilter = 'position';
			$rootScope.reverse = false;

			//Récupération du classement en JSON (temporaire)
			$http.get('Backend/team.php?id='+$scope.teamID).success(function(result){
				$scope.team = result;

				for(p=0; p<result.players.length; p++){
					$scope.team.players[p].attributes = JSON.parse(result.players[p].attributes);
					$scope.team.players[p].skills = result.players[p].skills.length > 0 ? JSON.parse(result.players[p].skills) : [];
				}
				$rootScope.title = $scope.team.name;
				$scope.team.pop = [];
		    $rootScope.setColours([$scope.team.color_1,$scope.team.color_2]);
				//Team Images
				$('.logo').css({"background": "url(resources/logo/Logo_"+$scope.team.logo+".png) center center no-repeat", "background-size":"contain"});
				for(i=0;i<$scope.team.popularite;i++){ $scope.team.pop.push(i); }
				$scope.teamArticle();
				//Classement
				var idx = $rootScope.competitions.map(function(e) { return e.id; }).indexOf($rootScope.competitionId);
				$scope.competition = $rootScope.competitions[idx].site_name;
				$scope.ranking = $rootScope.competitions[idx].json.map(function(e) { return e.id; }).indexOf($scope.team.id);
			});

			//Gestion du RP
			$scope.teamArticle = function(categories){
				for(i=0;i<$scope.team.articles.length;i++){
					$scope.team.articles[i].summary = $scope.team.articles[i].text.substr(0, $scope.team.articles[i].text.indexOf('<br/><br/>'))
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
