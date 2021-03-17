<?php
include('../connection.php');

$id=$_GET['id'];
$clock_in=$_GET['clock_in'];

if(mysqli_query($con,"delete from staffattendancemst where staff_id='$id' and clock_in='$clock_in'"))
{
header('location:dashboard.php?option=view_attendance&id='.$id);
}

?>
