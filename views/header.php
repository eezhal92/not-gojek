<html>
<head>
	<title>Hello</title>
	<!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo asset('assets/dists/css/app.css') ?>">
</head>
<body>
	<!-- Static navbar -->
    <nav class="navbar navbar-blue navbar-static-top" style="margin-bottom: 0px;">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Not GO-JEK!</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php if(App\Core\Auth::check()) { ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="glyphicon glyphicon-user"></i> <?php echo App\Core\Auth::user()->username ?><span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li class="dropdown-header">Something</li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Profile</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="<?php echo  route('get-logout') ?>">Log Out</a></li>
              </ul>
            </li>
            <?php } else { ?>
              <li><a href="<?php echo route('get-login') ?>">Log In</a></li>
            <?php } ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>