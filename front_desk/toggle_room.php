<?php
include('../connection.php');

$id=$_GET['id'];
$search=$_GET['search'];
$disabled=$_GET['disabled'];
$sql=mysqli_query($con,"update roommst set active_status=not active_status where Room_id='$id' ");
header('location:dashboard.php?option=rooms&search='.$search."&disabled=".$disabled);
?>
