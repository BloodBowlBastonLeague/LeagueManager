LeagueManager.directive('ranking', function(){
    return {
	      restrict: 'E',
	      templateUrl: 'views/ranking.html',

	      controller: function($scope, $rootScope, $http, $timeout,  $routeParams) {
	        $scope.ranking={};
	        $rootScope.title = "Classement des Pronostics";
	        $rootScope.setColours([$rootScope.colourA,$rootScope.colourB]);
	        $rootScope.rankingID = $routeParams.ID;
          console.log('test');


	        $http.get('Backend/bets/bets.php?action=ranking&ligue='+$rootScope.rankingID).success(function(result){
              console.log('test');
		          $scope.ranking = result;
	        });
	      }
    }
});
