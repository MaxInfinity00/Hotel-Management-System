<?php
include('connection.php');

$id=$_GET['id'];
@$admin=$_GET['admin'];
if(mysqli_query($con,"update bookingmst set Status=false where Booking_id='$id'")){
  if($admin=='admin'){
    header('location:admin/dashboard.php?option=bookings');
  }
  else{
    header('location:bookings.php');
  }
}

?>
