<?php
include('../connection.php');

$id=$_GET['id'];

$sql=mysqli_query($con,"select * from roommst where Room_id='$id' ");
$res=mysqli_fetch_assoc($sql);

if(mysqli_query($con,"delete from roommst where Room_id='$id' "))
{
header('location:dashboard.php?option=rooms');
}

?>
