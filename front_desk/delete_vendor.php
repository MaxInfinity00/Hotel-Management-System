<?php
include('../connection.php');

$id=$_GET['id'];
if(mysqli_num_rows(mysqli_query($con,"select * from suppliesmst where vendor_id='$id' ")) > 0){
  echo '<script>alert("Supplies dependent on the Vendor!\nDelete those first or try changing vendors!");window.location.href="dashboard.php?option=vendors";</script>';
}else{
  mysqli_query($con,"delete from vendormst where vendor_id='$id' ");
  header('location:dashboard.php?option=vendors');
}
?>
