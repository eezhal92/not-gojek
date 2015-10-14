<html>
<head>
	<title></title>
</head>
<body>

	<div ng-app="notGoJek">
		<h1>Angular</h1>
		<ul>
		  <li><a ui-sref="home">Home</a></li>
		  <li><a ui-sref="about">About</a></li>
		  <li><a ui-sref="login">Login</a></li>
		</ul>
		<div ng-controller="HomeCtrl as home">
			{{ home.today }}
		</div>
		<div ui-view></div>
	</div>

	<script type="text/javascript" src="/assets/sources/js/angular.min.js"></script>	
	<script type="text/javascript" src="/assets/sources/js/angular-ui-router.js"></script>
	<script type="text/javascript" src="/assets/sources/js/angular-cookies.min.js"></script>
	<script type="text/javascript" src="/assets/dists/js/app.js"></script>
	<script type="text/javascript" src="/assets/dists/js/HomeCtrl.js"></script>
	<script type="text/javascript" src="/assets/dists/js/AuthCtrl.js"></script>
	<script type="text/javascript" src="/assets/dists/js/AuthenticationService.js"></script>
	<script type="text/javascript" src="/assets/dists/js/Base64Service.js"></script>
</body>
</html>