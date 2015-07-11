LeagueManager.controller('CompetitionCtrl', function($scope, $rootScope, $timeout, Restangular) {

	$scope.showPreviousDays = function(i){
		for(i;i>1;i--){
			$('#day'+1).slideDown();
		}
	};
});
