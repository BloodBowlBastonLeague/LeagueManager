LeagueManager.controller('CompetitionCtrl', function($scope, $rootScope, $timeout, Restangular) {

	$scope.journee = 2;
	$scope.showPreviousDays = function(i){
		for(i;i>1;i--){
			$('#day'+1).slideDown();
		}
	};
});
