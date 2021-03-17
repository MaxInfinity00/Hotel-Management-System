<?php
include('../connection.php');

$id=$_GET['id'];
if(mysqli_num_rows(mysqli_query($con,"select * from servicemst where supply_id='$id' ")) > 0){
  echo '<script>alert("Services dependent on the Supply!\nDelete those first!");window.location.href="dashboard.php?option=supplies";</script>';
}else{
  mysqli_query($con,"delete from suppliesmst where supply_id='$id' ");
  header('location:dashboard.php?option=supplies');
}
?>
