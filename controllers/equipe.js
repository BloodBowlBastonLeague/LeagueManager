LeagueManager.controller('EquipeCtrl', function($scope, $rootScope, $http, $timeout, Restangular, $routeParams) {
	//LM_logo
	$('#LM_logo').css({"width":"70px", "height":"70px", "top":"10px", "background": "url(resources/img/teams/team"+$routeParams.ID+".png) center center no-repeat", "background-size":"contain"})
	//Récupération du classement en JSON (temporaire)
	$http.get('resources/json/team.json').then(function(result){

		$scope.teams = result.data;
		//à supprimer et mettre dans le chemin de l'API
		$scope.teamID = $scope.teams.map(function(e) { return e.teamID; }).indexOf($routeParams.ID);
		$scope.team = $scope.teams[$scope.teamID];
		$rootScope.subTitle = $scope.team.name;
		$scope.team.pop = [];

		//Fin de suppression
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

});
