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
			$http.get('epiphany/examples/database/').success(function(result){
				console.log(JSON.stringify(result)); 
			});
			//Récupération de l'agenda en JSON (temporaire)
			$http.get('resources/json/calendar.json').success(function(result){
				$scope.calendar = result;
			});

			$scope.randomElite = $rootScope.randomArticle(['Elite']);
			$scope.randomEspoir = $rootScope.randomArticle(['Espoir']);
			$scope.random3 = $rootScope.randomArticle(['presentation']);
		}
	}
});
