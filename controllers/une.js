LeagueManager.directive('une', function(Restangular){
	return {
		restrict: 'E',
		templateUrl: 'views/une.html',
		controller: function($scope, $rootScope, $http, $timeout, Restangular) {
			$rootScope.resetLogo();
			$rootScope.setColors($rootScope.colorA,$rootScope.colorB,$rootScope.colorC);

			$rootScope.title = "Tribunes - le mag de la BBBL";
			//Récupération du classement en JSON (temporaire)
			$http.get('resources/json/standing.json').then(function(result){
				$scope.standing = result.data;
			});
			//Récupération de l'agenda en JSON (temporaire)
			$http.get('resources/json/calendar.json').then(function(result){
				$scope.calendar = result.data;
			});

			//API Cyanide
			$scope.uploadMatch = function(cyanideID){
 				$.get('http://web.cyanide-studio.com/ws/bb2/match/?id=10000F0E72&key=b20b49cf35dce68418a4c375bf4e3cd3', function(_data) {
					$scope.uploadValidation = JSON.stringify(_data);
					console.log($scope.uploadValidation);
				});
			};


			$scope.randomElite = $rootScope.randomArticle(['Elite']);
			$scope.randomEspoir = $rootScope.randomArticle(['Espoir']);
			$scope.random3 = $rootScope.randomArticle(['presentation']);
		}
	}
});
