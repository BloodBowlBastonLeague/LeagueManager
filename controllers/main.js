LeagueManager.directive('main', function() {
	return {
		restrict: 'E',
		templateUrl: 'views/main.html',
		controller: function($scope, $rootScope, $http, $timeout) {

			$('#Logo')
				.css({
					"display": "none"
				})

			$rootScope.setColours([$rootScope.colourA, $rootScope.colourB]);

			$rootScope.title = "Tribunes - le mag de la BBBL";

			//Récupération de l'agenda en JSON
			$http.get('backend/routes.php?action=upcomingGames')
				.success(function(result) {
					$scope.games = result;
					console.log(result);
				});

			$scope.tmpTeams = [{
					"teamID": "0",
					"color1": "#A9A9A9",
					"color2": "#8C7853"
				},
				{
					"teamID": "1",
					"color1": "#CFB53B",
					"color2": "#C0C0C0"
				}
			];

			//Champion
			$http.get('backend/team.php?id=273')
				.success(function(result) {
					$scope.team = result;
					$rootScope.setColours([$rootScope.colourA, $rootScope.colourB, '#6CB18F', '#999999', $scope.team.color_1, $scope.team.color_2]);
					//Team Images
					$('#LogoRight')
						.css({
							"background": "url(resources/logo/Logo_" + $scope.team.logo + ".png) center center no-repeat",
							"background-size": "contain"
						});
					$scope.teamBG = {
						'position': 'absolute',
						'width': '100%',
						'height': '100%',
						'background': 'url(resources/logo/Logo_' + $scope.team.logo + '.png) center center no-repeat',
						'background-size': '30% auto',
						'z-index': '-1'
					}
				});

		}
	}
});