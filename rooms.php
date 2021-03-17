<?php
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php
      include('Menu Bar.php');
      include('money_formatting.php');
?>
<div class="container-fluid first-element" >
<div class="container text-center">
 <h1> Our Rooms</h1><hr><br>
 <div class="row">
 <?php
 $sql=mysqli_query($con,"select * from roomtypemst");
 while($r_res=mysqli_fetch_assoc($sql))
 {
   $amount =moneyFormatIndia(substr($r_res['Room_tariff'],0,-3));
 ?>
 <div class="col-12 col-sm-6">
     <img src="image/rooms/<?php echo $r_res['Image']; ?>" height="200" alt="Image">
     <h5 class="Room_Text"><?php echo $r_res['Room_Name']; ?></h5>
     <h5><?php echo "₹ ".$amount; ?></h5>
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
