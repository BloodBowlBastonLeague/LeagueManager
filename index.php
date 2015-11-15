<!DOCTYPE html>
<?php
//PHPBB connection / Connexion à phpBB
include('phpBB_Connect.php');
?>

<html  ng-app="LeagueManager">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="format-detection" content="telephone=no" />
  <meta http-equiv="Cache-control" content="private, max-age=864000" />

  <title>Blood Bowl Baston League</title>
  <meta name="description" content="Ligue francophone de Blood Bowl">
  <meta name="robots" content="index,follow" />

  <link rel="stylesheet" href="css/main.css" type="text/css">
  <link href='http://fonts.googleapis.com/css?family=Hind' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Play:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
  <div id="LM_intro" class="hd-100 x-center y-center">la Blood Bowl Baston League pr&eacute;sente</div>
  <header id="LM_navbar">
    <div id="LM_logo"  ng-click="goToPage('/')"></div>
    <div id="LM_title" class="hd-70 y-center"><h1 class="text-cutter">{{title}}</h1></div>
    <nav id="LM_navigation" class="hd-30 x-right y-center navmenu" >
      <ul>
        <li><a title="Forum" href="Forum"><img src="resources/img/LogoForum.svg"><span>Forum</span></a></li>
        <li><a title="Lancer BloodBowl" href="steam://run/216890"><img src="resources/img/LogoSteam.svg"><span>Jouer</span></a></li>
        <li><a title="Lancer Mumble" href="mumble://srv07.serveurmumble.com:50674/"><img src="resources/img/LogoMumble.svg"><span>Mumble</span></a></li>
        <li ng-if="<?php echo $user->data['user_id'];?>===1" ng-click="displayConnector()"><a title="Connexion"><img src="resources/img/LogoConnect.svg"><span>Connexion</span></a></li>
        <li ng-if="<?php echo $user->data['user_id'];?>!==1"><a title="Le vestiaire"><img src="resources/img/LogoConnect.svg"><span>Le vestiaire</span></a></li>
      </ul>
    </nav>
  </header>
  <div id="main" ng-class="{ blur : reader }">
    <ng-view></ng-view>
    <!-- Articles plein écran -->
    <article-reader></article-reader>

  </div>

  <!-- Modules Angular -->
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <script src="bower_components/angular/angular.min.js"></script>
  <script src="bower_components/restangular/dist/restangular.min.js"></script>
  <script src="bower_components/angular-route/angular-route.min.js"></script>
  <script src="bower_components/lodash/lodash.min.js"></script>
  <script src="bower_components/angular-sanitize/angular-sanitize.min.js"></script>
  <script src="bower_components/angular-css/angular-css.min.js"></script>

  <!-- Module BBBL -->
  <script src="controllers/app.js"></script>
  <script src="controllers/une.js"></script>
  <script src="controllers/presentation.js"></script>
  <script src="controllers/competition.js"></script>
  <script src="controllers/match.js"></script>
  <script src="controllers/equipe.js"></script>
  <script src="controllers/reader.js"></script>

</body>
</html>
