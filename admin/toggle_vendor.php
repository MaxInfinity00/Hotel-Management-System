<?php
include('../connection.php');

$id=$_GET['id'];
$search=$_GET['search'];
$disabled=$_GET['disabled'];
$sql=mysqli_query($con,"update vendormst set active_status=not active_status where vendor_id='$id' ");
header('location:dashboard.php?option=vendors&search='.$search."&disabled=".$disabled);
?>
