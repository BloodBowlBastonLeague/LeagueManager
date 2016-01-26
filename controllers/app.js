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
	.when("/match/:ID", {
		templateUrl: '<match></match>'
	})
	.when("/presentation", {
		template: '<presentation></presentation>'
	})
	.when("/equipe/:ID", {
		template: '<equipe></equipe>'
	})
  .when("/forum", {
    templateUrl: '/Forum/index.php'
  })
  .when("/", {
				css: {href:'css/une.css',preload: true},
    template: '<une></une>'
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
	$rootScope.resetLogo = function(){
			$('#LM_logo').css({"background": "url(resources/img/BBBL2.png) center center no-repeat", "background-size":"contain"})
	};

	//Gestion des couleurs
	//Couleurs de bases du site
	$rootScope.colorA = "#00558D";
	$rootScope.colorB = "#F68525";
	//Mise à jours de couleurs (pour les équipes)
	$rootScope.setColors = function(colorA,colorB){
		$rootScope.color1 = colorA;
		$rootScope.color1border = { 'color': colorA, 'border-color':colorA } ;
		$rootScope.color1bg = { 'background-color':colorA } ;
		$rootScope.color2 = colorB;
		$rootScope.color2border = { 'color': colorB, 'border-color':colorB } ;
		$('svg .colour1').css({"fill":colorA });
		$rootScope.color1Svg = { 'fill': colorA };
		$rootScope.color1Svg = { 'fill': colorA };
		$rootScope.color2Svg = { 'fill': colorB, 'stroke': '#000000' };
		$rootScope.color2bisSvg = { 'fill': colorB };
		$rootScope.color2bg = { 'background-color':colorB } ;
		$('.navbar').css({'background': '-webkit-linear-gradient('+colorA+',#000000)', 'background': '-moz-linear-gradient('+colorA+',#000000)', 'background': 'linear-gradient('+colorA+',#000000)' });
	};



});
