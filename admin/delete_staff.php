<?php
include('../connection.php');

$id=$_GET['id'];
$sql=mysqli_query($con,"select * from staffmst where staff_id='$id' ");
$res=mysqli_fetch_assoc($sql);

$imgpath="image/staff/".$res['Image'];
unlink($imgpath);
$user_id=$res['User_id'];

mysqli_query($con,"delete from staffattendancemst where staff_id='$id' ");
mysqli_query($con,"delete from staffmst where staff_id='$id' ");
if(!is_null($user_id)){
  mysqli_query($con,"delete from loginmst where user_id='$user_id' ");
}
header('location:dashboard.php?option=staff');
?>
