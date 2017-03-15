LeagueManager.directive('admin', function(){
	return {
		restrict: 'E',
		templateUrl: 'views/admin.html',
		controller: function($scope, $rootScope, $http, $timeout,  $routeParams) {
			$rootScope.setColours([$rootScope.colourA,$rootScope.colourB]);
			$rootScope.title = "Administatorum";
			$scope.competition = {};
			$scope.competitionsIG = [];
			$scope.newCompetition = {
				"indexIG":0,
				"site_order":0,
				"season":"Hiver",
				"competition_mode":"1",
				"champion":0
			};
			$scope.divisions = [
				{'league_name':'Elite','pool':'A'},
				{'league_name':'Elite','pool':'B'},
				{'league_name':'Prestige','pool':'A'},
				{'league_name':'Prestige','pool':'B'},
				{'league_name':'Espoir','pool':'A'},
				{'league_name':'Espoir','pool':'B'},
				{'league_name':'Espoir','pool':'C'},
				{'league_name':'Espoir','pool':'D'}
			];

			$http.get('http://web.cyanide-studio.com/ws/bb2/contests/?key=' + window.Cyanide_Key + '&status=scheduled&league=' + window.Cyanide_League).success(function(result){
				for(i=0;i<result.upcoming_matches.length;i++){
					var competitionIdx = $scope.competitionsIG.map(function(e) { return e.game_name; }).indexOf(result.upcoming_matches[i].competition);
					if(competitionIdx==-1){
						$scope.competitionsIG.push({"game_name":result.upcoming_matches[i].competition, "matches": [result.upcoming_matches[i]]});
					}
					else{
						$scope.competitionsIG[competitionIdx].matches.push(result.upcoming_matches[i]);
					};
				}
			});

			$scope.seasonNew = function(){
				$scope.newCompetition.league_name = $scope.divisions[$scope.newCompetition.site_order].league_name;
				$scope.newCompetition.pool = $scope.divisions[$scope.newCompetition.site_order].pool;
				$scope.newCompetition.matches = $scope.competitionsIG[$scope.newCompetition.indexIG].matches;
				$http.post('Backend/season_save.php',$scope.newCompetition).then( function(result){
					alert(result);
				});
			};
		}
	}
});
