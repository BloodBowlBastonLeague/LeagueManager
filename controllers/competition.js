LeagueManager.controller('CompetitionCtrl', function($scope, $rootScope, $http, $timeout, Restangular, $routeParams) {
		console.log($routeParams.ID);
	//Récupération du classement en JSON (temporaire)
	$http.get('resources/json/standing.json').then(function(result){
		$scope.standing = result.data;
		//à supprimer et mettre dans le chemin de l'API
		$scope.division = $scope.standing.map(function(e) { return e.ID; }).indexOf($routeParams.ID);
		$scope.standing = $scope.standing[$scope.division].standing;
		//Fin de suppression
		$rootScope.subTitle = "Division " + $scope.standing.name;
	});

	//Récupération de l'agenda en JSON (temporaire)
	$http.get('resources/json/calendar.json').then(function(result){
		$scope.calendar = result.data;
		console.log($routeParams.ID);
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
