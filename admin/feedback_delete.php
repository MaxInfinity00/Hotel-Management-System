<?php
include('../connection.php');

$id=$_GET['id'];

$sql=mysqli_query($con,"select * from feedback where booking_id='$id'");
$res=mysqli_fetch_assoc($sql);
if(mysqli_query($con,"delete from feedback where booking_id='$id'"))
{
header('location:dashboard.php?option=feedback');
}

?>
