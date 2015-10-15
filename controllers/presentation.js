LeagueManager.controller('PresentationCtrl', function($scope, $rootScope, $timeout, Restangular) {
  $rootScope.resetLogo();
  $rootScope.setColors($rootScope.colorA,$rootScope.colorB,$rootScope.colorC);

  	$rootScope.title = "Tout sur la BBBL";
  //Alimentation de l'article aléatoire
  $scope.randomSide = $rootScope.randomArticle(['presentation']);
  $("#randomPresentation1 .image").css({'background':'#333333 url(resources/img/articles/article_'+$scope.randomSide.article_id+'.jpg) no-repeat','background-size':'cover'})

});
