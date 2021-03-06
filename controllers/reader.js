LeagueManager.directive('articleReader', function(Restangular){
	return {
		restrict: 'E',
		templateUrl: 'views/reader.html',
		css: 'css/reader.css',
		controller: function($rootScope, $scope, $http, $timeout) {
			//Initialisation de la variable d'affichage de la liseuse
			$scope.fullscreen = false;
			$scope.reader = false;
			$scope.connector = false;

			//Affichage/masquage de la connexion
			$scope.displayOff = function(){
				//Affichage/masquage de la liseuse
				$scope.fullscreen = !$scope.fullscreen;
				$scope.reader = false;
				$scope.connector = false;
			};

			//Affichage/masquage des articles
			$scope.displayReader = function(articleID){
				//Récupération de l'article via l'API REST (à venir)
				if( typeof articleID !== 'undefined' ){
					$scope.article = $rootScope.articles[articleID];
				}
				//Affichage/masquage de la liseuse
				$scope.fullscreen = !$scope.fullscreen;
				$scope.reader = !$scope.reader;
			};

			//Affichage/masquage de la connexion
			$scope.displayConnector = function(){
				//Affichage/masquage de la liseuse
				$scope.fullscreen = !$scope.fullscreen;
				$scope.connector = !$scope.connector;
			};

			$scope.forumConnect = function(){
				document.forms['forumConnect'].submit();
			};

    }
  }
});
