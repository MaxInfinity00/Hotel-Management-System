<?php
session_start();
$eid=$_SESSION['create_account_logged_in'];
error_reporting(1);
?>
<head><!--Head Open  Here-->
  <title>Bliss Hotel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/9d1fff1705.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
  <link href="../css/custom.css"rel="stylesheet"/>
 <!-- <link href="css/animate.css"rel="stylesheet"/> -->
</head> <!--Head Open  Here-->
<body style="background-color:#dce8f3;">
  <nav class="navbar navbar-expand-lg fixed-top header">
    <div class="container-fluid" style="margin: auto 30px auto 20px">
      <a class="navbar-brand" href="index.php"title="Home">
        <img src="../logo/tb-crop.png" width="55px" height="60px" style="padding: 5px">
      </a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <div class="navbar-nav header-nav">
          <a class="nav-link nav-left-item" href="rooms.php">Rooms </a>
          <a class="nav-link nav-left-item" href="about.php">About </a>
          <a class="nav-link nav-left-item" href="contact_us.php">Contact us </a>
        </div>
      </div>
      <div class="navbar-right d-flex">
        <a class="btn btn-light book-btn" href="Login.php">Book Now</a>
  <?php if($_SESSION['create_account_logged_in']!=""){ ?>
        <div class="dropdown">
          <a class="btn btn-success dropdown-toggle" id="navbarDropdown"  role="button" data-bs-toggle="dropdown" href="#">View Status</a>
        	<ul class="dropdown-menu">
          		<li><a class="dropdown-item" href="profile.php">Profile</a></li>
              <li><a class="dropdown-item" href="order.php">Your Bookings</a></li>
              <li><a class="dropdown-item" href="logout.php">Logout</a></li>
        	</ul>
        </div>
  <?php } else{ ?>
        <a class="btn btn-success" href="Login.php">Login</a>
  <?php } ?>
      </div>
    </div>
  </nav>
