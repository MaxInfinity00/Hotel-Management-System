<?php
  include('../connection.php');

	$usql=mysqli_query($con,"select * from roomtypemst");
  $roomno=101;
	while($res=mysqli_fetch_assoc($usql))
	{
    $roomid=$res['Room_type_id'];
  	$rno='RM' . $roomno;
  	$sql=mysqli_query($con,"update roomtypemst set room_type_id='$rno' where room_type_id='$roomid';");
    printf("error: %s\n", mysqli_error($con));
    $roomno+=1;
}
 ?>
