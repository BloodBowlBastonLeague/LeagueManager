<!DOCTYPE html>
<?php include('phpBB_Connect.php') ?>
<html  ng-app="LeagueManager">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="format-detection" content="telephone=no" />
  <meta http-equiv="Cache-control" content="private, max-age=864000" />

  <title>Blood Bowl Baston League</title>
  <meta name="description" content="Ligue francophone de Blood Bowl">
  <meta name="robots" content="index,follow" />

  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="css/app.css" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/css?family=Niconne" rel="stylesheet">
  <link rel="apple-touch-icon" sizes="57x57" href="/resources/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="/resources/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="/resources/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/resources/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/resources/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/resources/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="/resources/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/resources/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/resources/favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="/resources/favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/resources/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="/resources/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/resources/favicon/favicon-16x16.png">
  <link rel="manifest" href="/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/resources//ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">

  <!-- Angular -->
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular.min.js"></script>

</head>
<body>
  <header>
    <div id="Intro" class="hd-100 x-center y-center">la Blood Bowl Baston League pr&eacute;sente</div>
    <nav class="navbar" ng-style="navbarColour">
      <div id="Logo" class="logo" ng-click="goToPage('/')"></div>
      <h1 class="navbar-brand inline text-cutter">{{title}}</h1>
      <ul class="nav navbar-nav inline collapse navbar-toggleable-md pull-xs-right" id="Menu">
        <li><a class="nav <?echo $user->data['group'];?>" href="Forum">Forum</a></li>
        <li class="hidden-sm-down"><a class="nav" href="steam://run/236690">Jouer</a></li>
        <li class="hidden-sm-down"><a class="nav" href="https://discordapp.com/channels/159656062125998080/159656062125998080" target="_blank">Discord</a></li>

        <?php
	 if($user->data['username'] != 'Anonymous'){ echo '<li><a class="nav">'.$user->data['username'].'</a></li>';} else { echo '<li ng-click="displayConnector()"><a class="nav">Connexion</a></li>';}
	?>
      </ul>
      <div class="navbar-toggler hidden-lg-up pull-right zelda" type="button" data-toggle="collapse" data-target="#Menu">&#9776;</div>
    </nav>
  </header>



  <div id="Main" class="container-fluid" ng-class="{ blur : reader }">
    <ng-view></ng-view>
    <!-- Articles plein écran -->
    <modal></modal>
  </div>


<script>
    var Cyanide_Key = "<?=$Cyanide_Key?>";
    var Cyanide_League = "<?=$Cyanide_League?>";
    var User = "<?=$user->data['username'];?>";
    var Group = "<?=$user->data['group_id'];?>";
</script>

  <!-- jquery -->
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  <!--<script src="bower_components/angular/angular.min.js"></script>-->
  <script src="bower_components/angular-route/angular-route.min.js"></script>
  <script src="bower_components/lodash/lodash.min.js"></script>
  <script src="bower_components/angular-sanitize/angular-sanitize.min.js"></script>

  <!-- Module BBBL -->
  <script src="controllers/app.js"></script>
  <script src="controllers/main.js"></script>
  <script src="controllers/admin.js"></script>
  <script src="controllers/archives.js"></script>
  <script src="controllers/league.js"></script>
  <script src="controllers/competition.js"></script>
  <script src="controllers/ranking.js"></script>

  <script src="controllers/match.js"></script>
  <script src="controllers/team.js"></script>
  <script src="controllers/modal.js"></script>

  <!-- Module BBBL -->
  <script src="controllers/lepoing.js"></script>

  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-78990645-1', 'auto');
    ga('send', 'pageview');

  </script>

</body>
</html>
