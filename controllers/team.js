LeagueManager.directive('team', function() {
	return {
		restrict: 'E',
		templateUrl: 'views/team.html',
		controller: function($scope, $rootScope, $http, $timeout, $routeParams) {
			$scope.team = {};
			$scope.teamID = $routeParams.ID;
			$scope.activePlayer = false;
			$scope.showDead = false;
			$scope.showStats = false;
			$rootScope.orderFilter = 'position';
			$rootScope.reverse = false;

			//Récupération du classement en JSON (temporaire)
			$http.get('Backend/team.php?id=' + $scope.teamID).success(function(result) {
				$scope.team = result;
				angular.forEach($scope.team, function(detail) {
					detail.xp = parseInt(detail.xp);
				});
				for (p = 0; p < result.players.length; p++) {
					$scope.team.players[p].attributes = result.players[p].attributes.length > 0 ? JSON.parse(result.players[p].attributes) : [];
					$scope.team.players[p].skills = result.players[p].skills.length > 0 ? JSON.parse(result.players[p].skills) : [];
					$scope.team.players[p].casualties = result.players[p].casualties != undefined ? JSON.parse(result.players[p].casualties) : [];
					$scope.team.players[p].stars = [];
					for (i = 0; i < result.players[p].level; i++) {
						$scope.team.players[p].stars.push(i);
					}
				}
				$rootScope.title = $scope.team.name;
				$scope.team.pop = [];
				for (i = 0; i < $scope.team.popularity; i++) {
					$scope.team.pop.push(i);
				}
				$rootScope.setColours([$scope.team.color_1, $scope.team.color_2, $scope.team.color_1, $scope.team.color_2]);
				//Team Images
				$('.logo').css({
					"background": "url(resources/logo/Logo_" + $scope.team.logo + ".png) center center no-repeat",
					"background-size": "contain"
				});
				$('.helmet1 .helmet-logo').css({
					"background": "url(../resources/logo/Logo_" + $scope.team.logo + ".png) center center no-repeat",
					"background-size": "cover"
				});
				$scope.team_BG = {
					'position': 'absolute',
					'width': '100%',
					'height': '100%',
					'background': 'url(../resources/logo/Logo_' + $scope.team.logo + '.png) center center no-repeat',
					'background-size': '30% auto',
					'z-index': '0',
					'opacity': '0.25'
				}
				$scope.helmet_svg = 'resources/helmet/helmet_' + $scope.team.param_id_race + '.svg';




				$scope.teamArticle();

				//Classement
				$http.get('Backend/competition.php?id=' + $scope.team.competition.id).success(function(result) {
					$scope.standing = result.standing;
					$scope.ranking = $scope.standing.map(function(e) {
						return e.id;
					}).indexOf($scope.team.id);
				});
			});

			//Gestion du RP
			$scope.teamArticle = function(categories) {
				for (i = 0; i < $scope.team.articles.length; i++) {
					$scope.team.articles[i].summary = $scope.team.articles[i].text.substr(0, $scope.team.articles[i].text.indexOf('<br/><br/>'))
				}
			};

			$scope.showPlayer = function(id) {
				if (id) {
					$scope.activePlayer = true;
					id = $scope.team.players.map(function(e) {
						return e.number;
					}).indexOf(id);
					$scope.player = $scope.team.players[id];
				} else {
					$scope.activePlayer = false;
				}
			};

			$scope.teamUpdate = function() {
				params = [window.Cyanide_Key, $scope.team.cyanide_id];
				$http.post('Backend/update/routes.php?action=teamUpdate', params).then(function(result) {
					console.log(result.data);
				});
			};

		}
	}
});