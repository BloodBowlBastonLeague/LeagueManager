var LeagueManager = angular.module('LeagueManager', ['ngRoute', 'ngSanitize', 'angularjs-datetime-picker', 'ngRightClick'])

//Routage
LeagueManager.config(function($routeProvider) {

	$routeProvider
		.when("/admin", {
			template: '<admin></admin>'
		})
		.when("/archives", {
			template: '<archives></archives>'
		})
		.when("/competition/:ID", {
			template: '<competition></competition>'
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

LeagueManager.run(function($rootScope, $http, $location, $timeout, $filter) {
	$rootScope.user = window.User;
	$rootScope.user_id = window.user_id;
	$rootScope.coach_id = window.coach_id;
	$rootScope.coach_gold = window.coach_gold;

	$rootScope.admin = ['9', '10'].indexOf(window.Group) > -1 ? 1 : 0;
	$rootScope.external = window.Group == 19 || !window.coach_id ? 1 : 0;
	$rootScope.title = "Tribunes - le mag de la BBBL";
	$rootScope.competitions = [];
	$rootScope.finalsTemplate = ['Finale', 'Demi-Finales', 'Quart de finales', '8emes de finales', '16emes de finales', '32emes de finales'];

	//Récupération des informations de base
	$http.get('Backend/routes.php?action=boot').success(function(result) {
		$rootScope.parameters = result.parameters;
		$rootScope.competitions = result.competitions;
		$rootScope.leagueStats = result.stats;
		$rootScope.$broadcast('statsSuccess');
	});

	//Récupération des liens compétitions-forums
	$http
		.get("resources/json/competition_forum.json")
		.success(function(result) {
			$rootScope.competitionForum = result;
		});


	$rootScope.goToPage = function(page) {
		$('#Logo').removeAttr('style');
		$('.navbar').removeAttr('style');
		$rootScope.$broadcast('routeChangeSuccess');
		$location.path(page);
	};

	//Gestion de l'historique
	$rootScope.history = [];
	$rootScope.$on('routeChangeSuccess', function() {
		$rootScope.history.push($location.$$path);
	});

	$rootScope.previousPage = function() {
		$('#Logo').removeAttr('style');
		var prevUrl = $rootScope.history.length > 0 ? $rootScope.history.splice(-1)[0] : "/";
		$location.path(prevUrl);
	};


	$rootScope.translate = function(param) {
		var idx = $rootScope.parameters.map(function(e) {
			return e.name;
		}).indexOf(param);
		return $rootScope.parameters[idx].translation;
	};

	//Gestion des couleurs
	//Couleurs de bases du site
	$rootScope.colours = ['#00558D', '#91BFDC'];
	$rootScope.colourA = "#00558D";
	$rootScope.colourB = "#91BFDC";
	//Mise à jours de couleurs (pour les équipes)
	$rootScope.setColours = function(args) {
		for (i = 0; i < args.length; i++) {
			$rootScope.colours[i] = {};
			$rootScope.colours[i].hexa = args[i];
			$rootScope.colours[i].color = {
				'color': args[i]
			};
			$rootScope.colours[i].border = {
				'border-color': args[i]
			};
			$rootScope.colours[i].background = {
				'background-color': args[i]
			};
			$rootScope.colours[i].fill = {
				'fill': args[i]
			};
			$rootScope.colours[i].textborder = {
				'color': args[i],
				'text-shadow': '-2px -2px #FFFFFF, 2px 2px #FFFFFF, 2px -2px #FFFFFF, -2px 2px #FFFFFF'
			};
			$rootScope.navbarColour = {
				'border-bottom': '3px solid' + args[i]
			};
		};
	};
	//Tri des listes
	$rootScope.sortBy = function(orderFilter) {
		$rootScope.reverse = ($rootScope.orderFilter === orderFilter) ? !$rootScope.reverse : false;
		$rootScope.orderFilter = orderFilter;
	};

	//String to number
	$rootScope.numerize = function(data) {
		return parseFloat(data);
	};


});



LeagueManager.filter('talkingToTheGods', function() {

	return function(input, dictionnary) {
		var idx = dictionnary.map(function(e) {
			return e.name;
		}).indexOf(input);
		return dictionnary[idx].translation;
	}

});

LeagueManager.filter('mutantAnalyzer', function() {

	return function(input, mutator, antidote, player) {
		for (s = 0; s < player.skills.length; s++) {
			player.skills[s] == mutator ? input++ : 0;
		}
		for (i = 0; i < player.casualties.length; i++) {
			antidote.indexOf(player.casualties[i]) > -1 ? input-- : 0;
		}
		return input;
	}

});