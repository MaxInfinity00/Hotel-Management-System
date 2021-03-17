<?php
include('connection.php');
$sql=mysqli_query($con,"select * from loginmst;");
while($res = mysqli_fetch_assoc($sql)){
  mysqli_query($con,"update loginmst set Hashed_Password='".hash('md5',$res['Hashed_Password'],false)."' where User_id='".$res['User_id']."'");
}
 ?>
