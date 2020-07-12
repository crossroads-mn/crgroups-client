<?php
	session_start();
	//include 'auth.php';
   // include 'content.php';
	//header('Location: https://crossroads.info/groups.php');
?>


<html ng-app="app" ng-cloak>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <title>Crossroads Church</title>

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/ico" href="img/favicon.png" />

  <!-- Bootstrap and Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">

  <!-- Angular Modules for Google Materials -->
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-route.js"></script>

  <!-- Angular Material Library -->
  <script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round|Open+Sans" rel="stylesheet">

  <script src="js/utilities.js"></script>
  <script src="js/app.js"></script>


  <!-- Lite Angular Editor for editing html inline -->
  <!-- Google Analytics Tag Below -->




</head>

<body ng-controller="uctrl" md-theme-watch="true" ng-cloak>

	<div layout-wrap layout="row" class="header-nav-bar">
		<div class="main-header-image">
			<img src="/img/cr_logo_white_horiz.png">
		</div>
	</div>

	<div layout-wrap layout="row" flex>
		<div layout-wrap layout="column" flex="60">
			<md-card ng-mouseover="show_content_preview()" ng-mouseleave="hide_content_preview()" class="md-button jesus-and-people" ng-click="goto_page('/cc/')">
				<img style="height:auto;" ng-src="\\\big_tile\\\">
			</md-card>

			<div  layout="row">
				<md-card class="md-button cr-give" ng-click="goto_page('give.php')">
					<img src="/app/img/Asset 6_3x.png">
				</md-card>
				<md-card class="md-button cr-locations" ng-click="goto_page('locations.php')">
					<img src="/app/img/Asset 7_3x.png">
				</md-card>
			</div>
		</div>

		<div layout-wrap layout="column" flex="40">
			<md-card class="md-button kids-jesus-fun" ng-click="goto_page('events.php')">
				<img src="/app/img/events.png">
			</md-card>
			<md-card class="md-button kids-jesus-fun" ng-click="goto_page('/cc/crossroads-kids/')">
				<img src="/app/img/kids.png">
			</md-card>
			<md-card class="md-button cr-youth" ng-click="goto_page('/cc/crossroads-youth/')">
				<img src="/app/img/youth.png">
			</md-card>
			<md-card class="md-button cr-serve" ng-click="goto_page('serve.php')">
				<img src="/app/img/serve.png">
			</md-card>
		</div>
	</div>

	<div layout-wrap layout="row" flex>
		<div layout="column" flex="30">
			<md-card class="md-button cr-sermons" ng-click="goto_page('/cc/read-the-bible/')">
				<img style="height:auto;" src="/app/img/bible.png">
			</md-card>
		</div>

		<div layout="column" flex="30">
			<md-card class="md-button cr-sermons" ng-click="goto_page('/cc/sermons/')">
				<img style="height:auto;" src="/app/img/message.png">
			</md-card>

		</div>

		<div layout="column" flex="40">
			<md-card class="md-button cr-worship" ng-click="goto_page('/cc/music/')">
				<img style="height:auto;" src="/app/img/music.png">
			</md-card>

		</div>
	</div>
	</body>

	<footer>
		<div layout-wrap layout="row" flex>
			<div layout="column" flex="50">
				<p style='padding: 15px; color: white'>Crossroads Church Copyright &copy; \\\this_year\\\</p>
			</div>
			<div layout="column" flex="50">
				<a style="color: white; padding: 15px; text-align: right" href="/cc/contact">Contact Us</a>
		</div>
	</footer>
</html>