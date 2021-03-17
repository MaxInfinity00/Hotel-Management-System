<?php
session_start();
include('connection.php');
$user_id=$_SESSION['logged_in'];
if(mysqli_query($con,"update customermst set status = not status where user_id='$user_id';")){
  header('location:logout.php');
}
printf("error: %s\n", mysqli_error($con));
?>
