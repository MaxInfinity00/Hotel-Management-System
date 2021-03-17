<?php
  include('../connection.php');

	$usql=mysqli_query($con,"select * from customermst where user_id!='uditshroff00@gmail.com'");printf("error: %s\n", mysqli_error($con));
	while($res=mysqli_fetch_assoc($usql))
	{
    $nationality = $res['Nationality'];
    echo $nationality;
    $user_id = $res['User_id'];
    mysqli_query($con,"update customermst set Nationality=".substr($nationality,0,-1)." where user_id = '$user_id'");
  }
 ?>
