<?php
include('../connection.php');

$id=$_GET['id'];

if(mysqli_query($con,"delete from feedbackmst where Booking_id='$id'")){
  header('location:dashboard.php?option=feedback');
}
printf("error: %s\n", mysqli_error($con));
?>
