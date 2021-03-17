<?php
      include('../connection.php');
      $status=$_POST["status"];
      $room_id=$_POST["room_id"];
      mysqli_query($con,"update roommst set Room_Status='$status' where room_id='$room_id' ");
      header('location:dashboard.php?option=rooms');
?>
