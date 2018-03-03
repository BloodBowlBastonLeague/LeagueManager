var LeagueManager = angular.module('LeagueManager', ['ngRoute'])


//Routage
LeagueManager.config(function($routeProvider) {
	$routeProvider
		.when("/podium", {
			template: '<podium></podium>'
		})
		.when("/standing", {
			template: '<standing></standing>'
		})
		.when("/match/:ID", {
			template: '<match1></match1>'
		})
		.when("/", {
			template: '<matchweek></matchweek>'
		});

});

LeagueManager.run(function($rootScope, $http, $location, $timeout, $window) {
	$rootScope.competitions = [];
	$rootScope.eliminations = ['32emes de finales', '16emes de finales', '8emes de finales', 'Quart de finales', 'Demi-Finales', 'Finale'];
	//Récupération des articles
	$http.get('../Backend/competition.php?id=' + window.competition).success(function(result) {
		$rootScope.competition = result;
		$rootScope.title = $rootScope.competition.league + ' - ' + $rootScope.competition.season;
	});

	//Gestion des couleurs
	//Couleurs de bases du site
	$rootScope.colours = [];
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
		}
		$rootScope.navbarColour = {
			'background': '-webkit-linear-gradient(' + args[0] + ',#000000)',
			'background': '-moz-linear-gradient(' + args[0] + ',#000000)',
			'background': 'linear-gradient(' + args[0] + ',#000000)'
		};
	};
	$rootScope.setColours([$rootScope.colourA, $rootScope.colourB]);

	//Tri des listes
	$rootScope.sortBy = function(orderFilter) {
		$rootScope.reverse = ($rootScope.orderFilter === orderFilter) ? !$rootScope.reverse : false;
		$rootScope.orderFilter = orderFilter;
	};

	$rootScope.openSite = function(url) {
		$window.open(url, '_blank');
	};

});
