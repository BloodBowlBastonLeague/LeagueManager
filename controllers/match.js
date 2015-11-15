LeagueManager.directive('match', function(Restangular){
	return {
		restrict: 'E',
		templateUrl: 'views/match.html',
		css: 'css/match.css',
		controller: function($scope, $rootScope, $http, $timeout, Restangular, $routeParams) {

	//Récupération de l'agenda en JSON (temporaire)
	$http.get('resources/json/calendar.json').then(function(result){
		$scope.calendar = result.data[0].calendar;

		//à supprimer et mettre dans le chemin de l'API
		$scope.game = $scope.calendar[4].matchs.map(function(e) { return e.idmatch; }).indexOf($routeParams.ID);
    $scope.match = $scope.calendar[$scope.game].matchs[0];
    console.log($scope.match);
		//Fin de suppression
	});



});
