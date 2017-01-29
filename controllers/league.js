LeagueManager.directive('league', function(){
	return {
		restrict: 'E',
		templateUrl: 'views/league.html',
		controller: function($scope, $rootScope, $http, $timeout, $routeParams) {
			$rootScope.title = "l'Histoire";

    }
  }
});
