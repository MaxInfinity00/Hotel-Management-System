<?php
session_start();
extract($_REQUEST);
include('../connection.php');
$admin=$_SESSION['admin_logged_in'];
if($admin=="")
{
	header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
     <title>Bliss Hotel Admin Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<link href="dashboard.css" rel="stylesheet">

  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
  </style>
  </head>
  <body>
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button> -->
          <a class="navbar-brand" href="dashboard.php">Welcome <?php echo $admin; ?></a>
        </div>
          <div class="nav navbar-nav navbar-right">
            <li><a href="logout.php">Logout</a>
          </div>
        <!-- <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="dashboard.php?option=admin_profile">Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div> -->
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar show">
          <ul class="nav nav-sidebar">
						<li><a href="dashboard.php?option=rooms">Rooms</a></li>
						<li><a href="dashboard.php?option=booking_details">Booking Details</a></li>
            <li><a href="dashboard.php?option=customers">Customer Details</a></li>
						<li><a href="dashboard.php?option=feedback">Feedback</a></li>
						<li><a href="dashboard.php?option=staff">Staff</a></li>
						<li><a href="dashboard.php?option=services">Services</a></li>
            <li><a href="dashboard.php?option=supplies">Supplies</a></li>
            <li><a href="dashboard.php?option=vendors">Vendors</a></li>
						<li class="dropdown">
			          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Setting <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="dashboard.php?option=update_password">Update Password</a></li>
			            <li><a href="dashboard.php?option=slider">Edit Slider</a></li>
			          </ul>
			      </li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<?php
@$opt=$_GET['option'];
if($opt=="")
{
	include('admin_profile.php');
}
else{
	include($opt.'.php');
}
?>

        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
