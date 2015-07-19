LeagueManager.directive('articleReader', function(Restangular){
	return {
		restrict: 'E',
		templateUrl: 'views/reader.html',
		controller: function($rootScope, $scope, $http, $timeout) {
			//Initialisation de la variable d'affichage de la liseuse
			$scope.reader = false;

			//Affichage/masquage des articles
			$scope.displayReader = function(articleID){
				//Récupération de l'article via l'API REST (à venir)
				if( typeof articleID !== 'undefined' ){
					$scope.article = $rootScope.articles[articleID];
				}
				//Affichage/masquage de la liseuse
				$scope.reader = !$scope.reader;
			};

    }
  }
});
