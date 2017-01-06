LeagueManager.directive('lepoing', function(){
	return {
		restrict: 'E',
		templateUrl: 'views/lepoing.html',
		controller: function($scope, $rootScope, $http, $timeout, $routeParams) {
      $http.get('Backend/lepoing.php?id=' + $routeParams.ID).success(function(result){
        $scope.lepoing = result;
				$rootScope.setColours(['#FF0000','#FFFFFF']);
        //$rootScope.setColours([result.color_1,result.color_2]);
        $rootScope.title = 'Le Poing - ' + result.team_name
      });

    }
  }
});
