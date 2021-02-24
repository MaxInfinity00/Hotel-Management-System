<?php
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<body style="margin-top:50px;">
<?php
      include('Menu Bar.php')
  ?><br>
<div class="container-fluid"id="red"><!--Id Is Red-->
<div class="container text-center">
 <h1> Our Rooms</h1><hr><br>
 <div class="row">


 <?php
 $sql=mysqli_query($con,"select * from roomtypemst");
 while($r_res=mysqli_fetch_assoc($sql))
 {
 ?>
 <div class="col-6">
     <img src="image/rooms/<?php echo $r_res['Image']; ?>" width="200" class="img-responsive thumbnail" alt="Image" id="img1"> <!--Id Is Img-->
     <h5 class="Room_Text"><?php echo $r_res['Room_Name']; ?></h5>
     <p class="text-justify"><?php echo substr($r_res['Room_desc'],0,200); ?>...</p><br>
     <a href="room_details.php?room_type_id=<?php echo $r_res['Room_type_id']; ?>" class="btn room-btn">Read more</a><br><br>
   </div>
 <?php } ?>
 </div>
 </div>
</div>
<?php
  include('Footer.php')
?>
</body>
</html>
