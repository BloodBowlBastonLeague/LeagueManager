LeagueManager.directive('main', function(){
	return {
		restrict: 'E',
		templateUrl: 'views/main.html',
		controller: function($scope, $rootScope, $http, $timeout) {

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
			$scope.tmpTeams = [ { "teamID" : "0", "color1" : "#A9A9A9",	"color2" : "#8C7853"},
				{ "teamID" : "1",	"color1" : "#CFB53B",	"color2" : "#C0C0C0"} ];
			$http.get('Backend/match.php?id=9515').success( function(result) {
				$scope.affiche = result;

					/*Récupération des couleurs - Fetching colours
					for(i=0; i < 2; i++){

						$scope.teams[i].pop =[];
						$scope.teams[i].newPop =[];
						for(j=0;j<$rootScope.match.teams[i].popularitybeforematch;j++){ $scope.teams[i].pop.push(j); }
						for(k=0;k<$rootScope.match.teams[i].popularitygain;k++){ $scope.teams[i].newPop.push(k); }

					}*/

					$rootScope.setColours([$rootScope.colourA,$rootScope.colourB,result.team_1_color_1,result.team_1_color_2,result.team_2_color_1,result.team_2_color_2]);
			//$rootScope.setColours([$rootScope.colourA,$rootScope.colourB,'#6CB18F','#999999','#D7D274','#D7C024']);

					//Team Images
					$('#LogoLeft').css({"background": "url(resources/logo/Logo_Neutre_22.png) center center no-repeat", "background-size":"cover"});
					$('#LogoRight').css({"background": "url(resources/logo/Logo_" + $scope.affiche.team_2_logo + ".png) center center no-repeat", "background-size":"contain"});
			});
		}
	}
});
