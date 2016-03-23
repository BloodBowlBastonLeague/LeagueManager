LeagueManager.directive('modal', function(Restangular){
	return {
		restrict: 'E',
		templateUrl: 'views/modal.html',
		controller: function($rootScope, $scope, $http, $timeout) {
			//Initialisation de la variable d'affichage de la liseuse
			$scope.fullscreen = false;
			$scope.reader = false;
			$scope.connector = false;
			$scope.modalTeam = false;

			//masquage de la fenetre
			$scope.displayOff = function(){
				$scope.fullscreen = !$scope.fullscreen;
				$scope.reader = false;
				$scope.connector = false;
				$scope.modalTeam = false;
			};

			//Affichage/masquage des articles
			$scope.displayReader = function(articleID){
				//Récupération de l'article via l'API REST (à venir)
				if( typeof articleID !== 'undefined' ){
					$scope.article = $rootScope.articles[articleID];
				}
				//Affichage/masquage de la liseuse
				$scope.modal.subject = 'reader';
			};

			//Affichage/masquage de la connexion
			$scope.displayConnector = function(){
				//Affichage/masquage de la liseuse
				$scope.modal.subject = 'connector';
			};

			$scope.forumLogin = function(){
				document.forms['forumConnect'].submit();
			};

			//Affichage/masquage des articles
			$scope.displayTeam = function(teamIdx,colour){
				$scope.modal = $rootScope.colours[colour];
				$scope.modal.teamIdx = teamIdx;
				$scope.modal.button = 'resources/img/Button_Modal.svg';
				$scope.modal.subject = 'team';
			};


    }
  }
});
