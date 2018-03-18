LeagueManager.directive('admin', function() {
	return {
		restrict: 'E',
		templateUrl: 'views/admin.html',
		controller: function($scope, $rootScope, $http, $timeout, $routeParams) {
			$rootScope.setColours([$rootScope.colourA, $rootScope.colourB]);
			$rootScope.title = "Administatorum";
			$scope.competition = {};
			$scope.competitionsIG = [];
			$scope.forum = {
				"processing": 0
			};
			$scope.season = {
				"processing": 0
			};
			$scope.newCompetition = {
				"indexIG": 0,
				"site_order": 0,
				"season": "Hiver",
				"competition_mode": "Saison",
				"champion": 0,
				"competition_id_parent": 'NULL',
				"sponsor_id_1": 'NULL',
				"sponsor_id_2": 'NULL',
				"round": 'NULL',
				"processing": 0
			};
			$scope.divisions = [{
					'league_name': 'Competition principale',
					'pool': ''
				},
				{
					'league_name': 'Tournoi annexe',
					'pool': ''
				}
			];

			$http.get('http://web.cyanide-studio.com/ws/bb2/contests/?key=' + window.Cyanide_Key + '&status=scheduled&league=' + window.Cyanide_League + '&exact=1')
				.success(function(result) {
					for (i = 0; i < result.upcoming_matches.length; i++) {
						var competitionIdx = $scope.competitionsIG.map(function(e) {
								return e.game_name;
							})
							.indexOf(result.upcoming_matches[i].competition);
						if (competitionIdx == -1) {
							$scope.competitionsIG.push({
								"game_name": result.upcoming_matches[i].competition,
								"matches": [result.upcoming_matches[i]]
							});
						} else {
							$scope.competitionsIG[competitionIdx].matches.push(result.upcoming_matches[i]);
						};
					}
				});

			$http.get('../Backend/routes.php?action=sponsors')
				.success(function(sponsors) {
					$scope.sponsors = sponsors;
				});

			$scope.seasonArchive = function() {
				$scope.season.processing = 1;
				$scope.season.message = "Les gobelins pédalent...";
				$scope.season.result = "processing";
				$http.post('Backend/admin/admin.php?action=seasonArchive')
					.then(function(result) {
						$scope.season.message = result.data.message;
						$scope.season.result = result.data.result;
						$scope.season.processing = 0;
					});
			};

			$scope.competitionAdd = function() {
				$scope.newCompetition.processing = 1;
				$scope.newCompetition.message = "Les gobelins pédalent...";
				$scope.newCompetition.result = "processing";
				$scope.newCompetition.league_name = $scope.divisions[$scope.newCompetition.site_order].league_name;
				$scope.newCompetition.pool = $scope.divisions[$scope.newCompetition.site_order].pool;
				//Gestion des competitions chapeau
				if ($scope.newCompetition.indexIG > 0) {
					$scope.newCompetition.matches = $scope.competitionsIG[$scope.newCompetition.indexIG].matches;
					$scope.newCompetition.cyanide_id = $scope.newCompetition.matches[0].competition_id;
					$scope.newCompetition.format = $scope.newCompetition.matches[0].format;
					$scope.newCompetition.game_name = $scope.newCompetition.matches[0].competition;
				} else {
					$scope.newCompetition.matches = [];
					$scope.newCompetition.cyanide_id = 'NULL';
					$scope.newCompetition.format = 'Sponsors';
					$scope.newCompetition.competition_mode = 'Sponsors';
					$scope.newCompetition.game_name = $scope.newCompetition.site_name;
				};
				$http.post('Backend/admin/admin.php?action=competitionAdd', $scope.newCompetition)
					.then(function(result) {
						$scope.newCompetition.message = result.data.message;
						$scope.newCompetition.result = result.data.result;
						$scope.newCompetition.processing = 0;
					});
			};

			$scope.forumUpdate = function() {
				$scope.forum.processing = 1;
				$scope.forum.message = "Les gobelins pédalent...";
				$scope.forum.result = "processing";
				$http.post('Backend/admin/admin.php?action=forumUpdate')
					.then(function(result) {
						$scope.forum.message = result.data.message;
						$scope.forum.result = result.data.result;
						$scope.forum.processing = 0;
					});
			}
		}
	}
});