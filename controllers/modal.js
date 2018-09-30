LeagueManager.directive("modal", function() {
	return {
		restrict: "E",
		templateUrl: "views/modal.html",
		controller: function($rootScope, $scope, $http, $timeout, $filter) {
			//Initialisation de la variable d'affichage de la liseuse
			$scope.modal = {};
			$scope.cyanideId = "";


			//masquage de la fenetre
			$scope.displayOff = function() {
				$scope.modal = {};
			};
			//Affichage/masquage de la connexion
			$scope.displayConnector = function() {
				//Affichage/masquage de la liseuse
				$scope.modal.subject = "connector";
			};

			$scope.forumLogin = function() {
				document.forms["forumConnect"].submit();
			};

			//Affichage/masquage des équipes
			$scope.displayTeam = function(teamIdx, colour) {
				$scope.modal = $rootScope.colours[colour];
				$scope.modal.teamIdx = teamIdx;
				$scope.modal.button = "resources/img/Button_Modal.svg";
				$scope.modal.subject = "team";
			};
			//Affichage/masquage joueur
			$scope.displayPlayer = function(player) {
				$scope.modal.player = player;
				$scope.modal.subject = "player";
			};

			//Affichage/masquage des stats
			$scope.displayStats = function(info) {
				$scope.modal.subject = "stats";
				$scope.modal.info = info;
			};

			//Affichage/masquage des paris
			$scope.displayBets = function(competition) {
				$http
					.get(
						"backend/bets/bets.php?action=ranking&competition=" + competition
					)
					.success(function(result) {
						$scope.ranking = result;
						$scope.modal.subject = "bets";
					});
			};
			//Affichage/masquage des paris
			$scope.displayMatchBets = function(bets) {
				$scope.prognosis = bets;
				$scope.modal.subject = "matchBets";
			};

			//Ensemble de fonctions pour gerer la couleur d'affichage des pronos
			$scope.sup = function(bets) {
				return bets.team_score_1 > bets.team_score_2;
			};
			$scope.nul = function(bets) {
				return bets.team_score_1 == bets.team_score_2;
			};
			$scope.inf = function(bets) {
				return bets.team_score_1 < bets.team_score_2;
			};
			$scope.isMe = function(bets) {
				return bets.name == $scope.user;
			};

		}
	};
});