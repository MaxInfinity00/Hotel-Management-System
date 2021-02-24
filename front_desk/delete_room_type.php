<?php
include('../connection.php');

$id=$_GET['id'];
if(mysqli_num_rows(mysqli_query($con,"select * from roommst where room_type='$id' ")) > 0){
  echo '<script>alert("Existing rooms based on this room type, trying updating or deleting them first!");window.location.href="dashboard.php?option=services";</script>';
}else{
  $sql=mysqli_query($con,"select * from roomtypemst where room_type_id='$id' ");
  $res=mysqli_fetch_assoc($sql);

  mysqli_query($con,"delete from roomtypemst where room_type_id='$id' ");
  header('location:dashboard.php?option=room_types');
}
?>
