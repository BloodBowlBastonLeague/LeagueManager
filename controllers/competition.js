LeagueManager.controller('CompetitionCtrl', function($scope, $rootScope, $http, $timeout, Restangular) {

	$rootScope.subTitle = "Division Elite";
	//Récupération du classement en JSON (temporaire)
	$http.get('resources/json/majeure_standing.json').then(function(result){
			$scope.standing = result.data;
		});
		//Récupération de l'agenda en JSON (temporaire)
		$http.get('resources/json/majeure_calendar.json').then(function(result){
				$scope.calendar = result.data;
			});

	$scope.currentDay = 5;
	$scope.displayDay = 5;

	$scope.showPreviousDays = function(i){
		$scope.displayDay = 0;
	};

});
