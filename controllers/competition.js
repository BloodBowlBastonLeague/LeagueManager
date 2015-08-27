LeagueManager.controller('CompetitionCtrl', function($scope, $rootScope, $http, $timeout, Restangular, $routeParams) {

	//Récupération du classement en JSON (temporaire)
	$http.get('resources/json/standing.json').then(function(result){
		$scope.standing = result.data;
		//à supprimer et mettre dans le chemin de l'API
		$scope.division = $scope.standing.map(function(e) { return e.divisionID; }).indexOf($routeParams.ID);
		$scope.random = $rootScope.randomArticle([$scope.standing[$scope.division].name]);
		$rootScope.subTitle = "Division " + $scope.standing[$scope.division].name;
		$scope.standing = $scope.standing[$scope.division].standing;

		//Fin de suppression


	});

	//Récupération de l'agenda en JSON (temporaire)
	$http.get('resources/json/calendar.json').then(function(result){
		$scope.calendar = result.data;
		//à supprimer et mettre dans le chemin de l'API
		$scope.division = $scope.calendar.map(function(e) { return e.divisionID; }).indexOf($routeParams.ID);
		$scope.calendar = $scope.calendar[$scope.division].calendar;
		//Fin de suppression
	});

	$scope.currentDay = 5;
	$scope.displayDay = 5;

	$scope.showPreviousDays = function(i){
		$scope.displayDay = 0;
	};

});
