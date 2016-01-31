var LeagueManager = angular.module('LeagueManager', ['ngRoute','restangular','ngSanitize','ngCSS'])

//API REST - Local DB
LeagueManager.config(function (RestangularProvider) {
	RestangularProvider.setBaseUrl('http://localhost:8888/');
});

//Routage
LeagueManager.config(function ($routeProvider, RestangularProvider) {
	$routeProvider
  .when("/competition/:ID", {
		template: '<competition></competition>'
	})
	.when("/league", {
		template: '<league></league>'
	})
	.when("/team/:ID", {
		template: '<team></team>'
	})
	.when("/match/:ID", {
		template: '<match></match>'
	})
  .when("/forum", {
    templateUrl: '/Forum/index.php'
  })
  .when("/", {
    template: '<main></main>'
  });
});

LeagueManager.run(function($rootScope, $http, $location, $timeout) {
	$rootScope.title = "le mag de la BBBL";

	$http.get('resources/json/articles.json').then(function(result){
		$rootScope.articles = result.data;
	});

	$rootScope.goToPage = function(page) {
			$('#Logo').removeAttr( 'style' );

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

	//Gestion des couleurs
	//Couleurs de bases du site
	$rootScope.colours = [];
	$rootScope.colourA = "#00558D";
	$rootScope.colourB = "#F68525";
	//Mise à jours de couleurs (pour les équipes)
	$rootScope.setColours = function(args){
		for(i=0; i < args.length; i++){
				$rootScope.colours[i] = {};
				$rootScope.colours[i].hexa = args[i];
				$rootScope.colours[i].color = { 'color': args[i] };
				$rootScope.colours[i].border = { 'border-color':args[i] };
				$rootScope.colours[i].background = { 'background-color':args[i] };
				$rootScope.colours[i].fill = { 'fill': args[i] };
		}
		$('.navbar').css({'background': '-webkit-linear-gradient('+args[0]+','+args[0]+',#000000)', 'background': '-moz-linear-gradient('+args[0]+','+args[0]+',#000000)', 'background': 'linear-gradient('+args[0]+','+args[0]+',#000000)' });
	};


});
