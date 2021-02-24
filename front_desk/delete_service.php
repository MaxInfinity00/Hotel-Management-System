<?php
include('../connection.php');

$id=$_GET['id'];
if(mysqli_num_rows(mysqli_query($con,"select * from billmst where service_id='$id' ")) > 0){
  echo '<script>alert("Bills dependent on the Service!");window.location.href="dashboard.php?option=services";</script>';
}else{
  $sql=mysqli_query($con,"select * from servicemst where service_id='$id' ");
  $res=mysqli_fetch_assoc($sql);

  mysqli_query($con,"delete from servicemst where service_id='$id' ");
  header('location:dashboard.php?option=services');
}
?>
