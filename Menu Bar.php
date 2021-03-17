<?php
session_start();
@$user_id=$_SESSION['logged_in'];
error_reporting(1);
include('connection.php');
extract($_REQUEST);
?>
<head>
  <title>Bliss Hotel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/9d1fff1705.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
  <link href="css/custom.css"rel="stylesheet"/>
</head>
<body>
  <nav class="navbar navbar-expand-lg fixed-top header">
    <div class="container-fluid"  style="margin: auto 30px auto 20px;">
      <a class="navbar-brand" href="home.php" title="Home">
        <img src="logo/tb-logo-white.svg" width="55px" height="60px" style="padding: 5px">
      </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <a class="nav-link nav-left-item" href="home.php">Home </a>
          <a class="nav-link nav-left-item" href="rooms.php">Rooms </a>
          <a class="nav-link nav-left-item" href="about.php">About us </a>
          <a class="nav-link nav-left-item" href="contact_us.php">Contact us </a>
        </ul>
        <div class="navbar-right d-flex">
          <a class="btn btn-light book-btn" href="Login.php">Book Now</a>
          <?php if($_SESSION['logged_in']!=""){ ?>
            <div class="dropdown">
              <a class="btn btn-success dropdown-toggle" id="navbarDropdown"  role="button" data-bs-toggle="dropdown" href="#">View Status</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                <li><a class="dropdown-item" href="bookings.php">Booking Status</a></li>
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
              </ul>
            </div>
          <?php } else{ ?>
            <a class="btn btn-success" href="Login.php">Login</a>
          <?php } ?>
        </div>
      </div>
    </div>
  </nav>
