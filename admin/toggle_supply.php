<?php
include('../connection.php');

$id=$_GET['id'];
$search=$_GET['search'];
$disabled=$_GET['disabled'];
$sql=mysqli_query($con,"update suppliesmst set active_status=not active_status where supply_id='$id' ");
header('location:dashboard.php?option=supplies&search='.$search."&disabled=".$disabled);
?>
