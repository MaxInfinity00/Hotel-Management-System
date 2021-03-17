<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
extract($_REQUEST);
include('../connection.php');
$admin=$_SESSION['admin_logged_in'];
if($admin=="")
{
	header('location:../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
		<title>Bliss Hotel Admin Dashboard</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
		<script src="https://kit.fontawesome.com/9d1fff1705.js" crossorigin="anonymous"></script>
		<link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
		<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
				<a class="navbar-brand" href="dashboard.php">Welcome <?php echo $admin; ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarToggler">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link"  href="logout.php">Logout</a></li>
          </ul>
        </div>
      </nav>

    <div class="container-fluid">
      <div class="row">
				<div class="col-md-3 col-lg-2">

				<nav id="sidebarMenu" class="d-md-block bg-light sidebar collapse">
		      <div class="position-sticky pt-3">
		        <ul class="nav flex-column">
							<li class="nav-item"><a class="nav-link" href="dashboard.php?option=rooms">Rooms</a></li>
							<li class="nav-item"><a class="nav-link" href="dashboard.php?option=bookings">Bookings</a></li>
							<li class="nav-item"><a class="nav-link" href="dashboard.php?option=customers">Customers</a></li>
							<li class="nav-item"><a class="nav-link" href="dashboard.php?option=feedback">Feedback</a></li>
							<li class="nav-item"><a class="nav-link" href="dashboard.php?option=payment">Payment</a></li>
							<li class="nav-item"><a class="nav-link" href="dashboard.php?option=staff">Staff</a></li>
							<li class="nav-item"><a class="nav-link" href="dashboard.php?option=services">Services</a></li>
							<li class="nav-item"><a class="nav-link" href="dashboard.php?option=supplies">Supplies</a></li>
							<li class="nav-item"><a class="nav-link" href="dashboard.php?option=vendors">Vendors</a></li>
							<li class="nav-item dropdown">
			          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">Settings</a>
			          <ul class="dropdown-menu">
									<li><a class="dropdown-item" href="dashboard.php?option=update_password">Update Password</a></li>
									<li><a class="dropdown-item" href="dashboard.php?option=slider">Edit Slider</a></li>
			          </ul>
			        	</li>
		        </ul>
		      </div>
		    </nav>
			</div>
        <div class="col-sm-9 col-md-10 main">
<?php
if(@$option=="")
{
	include('index.php');
}
else{
	include($option.'.php');
}
?>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script> -->
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <!-- <script src="../../assets/js/vendor/holder.min.js"></script> -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!-- <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> -->
  </body>
</html>
