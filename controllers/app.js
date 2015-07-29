var LeagueManager = angular.module('LeagueManager', ['ngRoute','restangular','ngSanitize','ngCSS'])

//API REST
LeagueManager.config(function (RestangularProvider) {
	RestangularProvider.setBaseUrl('http://localhost:8888/epiphany-master/examples/database/');
});

//Routage
LeagueManager.config(function ($routeProvider, RestangularProvider) {
	$routeProvider
  .when("/competition/:ID", {
		templateUrl: 'views/competition.html',
		controller: 'CompetitionCtrl',
		controllerUrl: 'controllers/competition',
		css: 'css/competition.css'
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
		controller: 'UneCtrl',
		controllerUrl: 'controllers/une',
		css: {href:'css/une.css',preload: true}
  });
});

LeagueManager.run(function($rootScope, $http, $location, $timeout) {
	$rootScope.subTitle = "le mag de la BBBL";

		$http.get('resources/json/articles.json').then(function(result){
	$rootScope.articles = result.data;

});

	$rootScope.goToPage = function(page) {
        $location.path( page );
    };


	$rootScope.randomArticle = function(categories){
		//Récupération des articles en JSON (temporaire)
			var selection = [];

			for(i=0;i<$rootScope.articles.length;i++){
				if($rootScope.articles[i].random == 1 && categories.indexOf($rootScope.articles[i].category) != -1){
					selection.push($rootScope.articles[i]);
				}
			}
			return selection[Math.floor(Math.random() * selection.length)];
			};



});
