<?php
include('../connection.php');

$id=$_GET['id'];
$search=$_GET['search'];
$disabled=$_GET['disabled'];
$sql=mysqli_query($con,"update staffmst set active_status=not active_status where staff_id='$id' ");
header('location:dashboard.php?option=staff&search='.$search."&disabled=".$disabled);
?>
