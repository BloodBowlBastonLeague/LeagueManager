LeagueManager.directive('main', function(Restangular){
	return {
		restrict: 'E',
		templateUrl: 'views/main.html',
		controller: function($scope, $rootScope, $http, $timeout, Restangular) {

			$('#Logo').css({"display":"none"})

			$rootScope.setColours([$rootScope.colourA,$rootScope.colourB]);

			$rootScope.title = "Tribunes - le mag de la BBBL";

			//Récupération du classement en JSON (temporaire)
			$http.get('resources/json/standing.json').success(function(result){
				$scope.standing = result;
			});
			//Récupération de l'agenda en JSON (temporaire)
			$http.get('resources/json/calendar.json').success(function(result){
				$scope.calendar = result;
			});


		}
	}
});
