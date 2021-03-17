<!DOCTYPE html>
<html>
<body style="margin-top:50px;">
<?php
  include('Menu Bar.php');
  include('connection.php');
  include('money_formatting.php');
  $room_type_id=$_GET['room_type_id'];
  $sql=mysqli_query($con,"select * from roomtypemst where room_type_id='$room_type_id' ");
  $res=mysqli_fetch_assoc($sql);
  $amount =moneyFormatIndia(substr($res['Room_tariff'],0,-3));
?>
<div class="row first-element">
    <div class="col-sm-9 room-details">
      		<h2><?php echo $res['Room_Name']; ?></h2>
          <img src="image/rooms/<?php echo $res['Image']; ?>" height="400px" alt="Image">
          <h3><?php echo "₹ ".$amount; ?></h3>
      		<p class="text-justify"><?php echo $res['Room_desc']; ?></p>
          <a href="Booking Form.php?room_type_id=<?php echo $res['Room_type_id'] ?>" class="btn btn-danger">Book Now</a>
    </div>
  <div class="col-sm-3">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 align="center">Room Type</h4>
      </div><br>
      <div class="panel-body-right text-center room-list">
<?php
  include('connection.php');
  $sql1=mysqli_query($con,"select * from roomtypemst");
  while($list= mysqli_fetch_assoc($sql1)){
?>
        <a href="room_details.php?room_type_id=<?php echo $list['Room_type_id']; ?>"><?php echo $list['Room_Name']; ?></a><hr>
<?php } ?>
      </div>
    </div>
  </div>
</div>
			</div>
		</div>
	</div>
  <?php
      include('footer.php')
  ?>
</body>
</html>
