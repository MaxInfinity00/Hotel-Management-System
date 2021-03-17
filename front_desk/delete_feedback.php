<?php
include('../connection.php');

$id=$_GET['id'];

if(mysqli_query($con,"delete from feedback where Booking_id='$id'")){
  header('location:dashboard.php?option=feedback');
}

?>
