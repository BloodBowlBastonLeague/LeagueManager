LeagueManager.controller('PresentationCtrl', function($scope, $rootScope, $timeout, Restangular) {

  $scope.randomSide = $rootScope.randomArticle(['presentation']);
  console.log()
  $("#randomPresentation1 .image").css({'background':'#333333 url(resources/img/articles/article_'+$scope.randomSide.article_id+'.jpg) no-repeat','background-size':'cover'})

});
