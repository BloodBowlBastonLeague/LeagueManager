var LeagueManager = angular.module('LeagueManager', ['ngRoute','restangular'])

LeagueManager.config(function ($routeProvider, RestangularProvider) {
	$routeProvider
  .when("/competition", {
		templateUrl: 'views/competition.html',
		controller: 'CompetitionCtrl',
		controllerUrl: 'controllers/competition'
	})
	.when("/presentation", {
		templateUrl: 'views/presentation.html',
		controller: 'PresentationCtrl',
		controllerUrl: 'controllers/presentation'
	})
  .when("/forum", {
    templateUrl: '/Forum/index.php'
  })
  .when("/", {
    templateUrl: 'views/une.html',
  });
});
