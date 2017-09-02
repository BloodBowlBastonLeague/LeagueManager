<!DOCTYPE html>
<? $competition = $_REQUEST['competition'];
 $round = $_REQUEST['round'];
//include('phpBB_Connect.php');
 ?>
<html  ng-app="LeagueManager">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="format-detection" content="telephone=no" />
  <meta http-equiv="Cache-control" content="private, max-age=864000" />

  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="../css/app.css" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>

</head>
<body style="background:transparent;">
  <div id="ForumDisplay" class="container-fluid">
    <ng-view></ng-view>
  </div>
  <script>
  var competition = '<?=$competition ?>' ;
  var round = '<?=$round ?>' ;
  </script>
  <!-- jquery -->
  <script src="../bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Angular -->
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular.min.js"></script>
  <script src="../bower_components/lodash/lodash.min.js"></script>
  <script src="../bower_components/angular-route/angular-route.min.js"></script>

  <!-- Module BBBL -->
  <script src="../controllers/frames/main.js"></script>
  <script src="../controllers/frames/matchweek.js"></script>
  <script src="../controllers/frames/standing.js"></script>
  <script src="../controllers/frames/match.js"></script>

</body>
</html>
