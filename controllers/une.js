LeagueManager.controller('UneCtrl', function($scope, $rootScope, $http, $timeout, Restangular) {

	$rootScope.subTitle = "le mag de la BBBL";
	//Récupération du classement en JSON (temporaire)
	$http.get('resources/json/standing.json').then(function(result){
		$scope.standing = result.data;
	});
	//Récupération de l'agenda en JSON (temporaire)
	$http.get('resources/json/calendar.json').then(function(result){
		$scope.calendar = result.data;
	});

	$scope.randomElite = $rootScope.randomArticle(['Elite']);
	$scope.randomEspoir = $rootScope.randomArticle(['Espoir']);
	$scope.random3 = $rootScope.randomArticle(['presentation']);

});
