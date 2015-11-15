LeagueManager.directive('chatBox', function(){
  	return {
    restrict: 'E',
		templateUrl: 'views/chat.html',

		controller:  function($rootScope, $scope, $location, PubNub) {

    $scope.data = {
      username: 'Cemoi'
    };
    $scope.controlChannel = 'Main';
    $scope.channels = ['Main'];

    $scope.startChat = function() {
			console.log('start');
			$rootScope.data = { username: 'test' };
      PubNub.init({
        subscribe_key: 'sub-bbbl',
        publish_key: 'pub-bbbl',
        secret_key: 'bbbl',
        auth_key: 'bbbl',
        uuid: '',
        ssl: true
      });
    };

		/* Subscribe */
		$scope.subscribeChat = function(channel) {
			console.log('subscribe ' + channel);
			PubNub.ngSubscribe({
				channel: channel,
      	callback: function() { console.log(arguments); }
			});
		};

    /* Publish a chat message*/
    $scope.publish = function() {
			console.log('publish');
			PubNub.ngPublish({
        channel: 'Main',
        message: {
          text: $scope.newMessage,
          user: $scope.data.username
        },
      	callback: function() { console.log(arguments); }
      });
      return $scope.newMessage = '';
    };

		$rootScope.$on(PubNub.ngMsgEv($scope.selectedChannel), function(ngEvent, payload) {
			var msg; console.log(ngEvent, payload);
			msg = payload.message.user ? "[" + payload.message.user + "] " + payload.message.text : "[unknown] " + payload.message;
			return $scope.$apply(function() {
				return $scope.messages.unshift(msg);
			});
		});

		$scope.startChat();

	}}
});
