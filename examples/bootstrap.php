<?php
require_once('../autoload.php');
// $menu #1
$main = new Menu;

$main->add('<span class="glyphicon glyphicon-home"></span>', '');
$about = $main->add('about', 'about');
   $about->add('Who we are?', 'who-we-are?');
   $about->add('What we do?', 'what-we-do?');
$main->add('Services', 'services');
$main->add('Portfolio', 'portfolio');
$main->add('Contact', 'contact');

// menu #2
$user = new Menu;

$user->add('login', 'login');
$profile = $user->add('Profile', 'profile');
  $profile->add('Account', 'account')
          ->link->prepend('<span class="glyphicon glyphicon-user"></span> ');
  
  $profile->add('Settings', 'settings')
          ->link->prepend('<span class="glyphicon glyphicon-cog"></span> ');
?>
<html>
<head>
	<title>Bootstrap Navbar</title>
	<script type="text/javascript" src="../js/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Sitepoint</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php echo bootstrapItems($main); ?>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
         	<?php echo bootstrapItems($user); ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

</body>
</html>