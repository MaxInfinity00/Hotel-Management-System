<!DOCTYPE html>
<html>
<body style="margin-top:50px;">
<?php
  include('Menu Bar.php');
  include('connection.php');
  $room_type_id=$_GET['room_type_id'];
  $sql=mysqli_query($con,"select * from roomtypemst where room_type_id='$room_type_id' ");
  $res=mysqli_fetch_assoc($sql);
?>
<div class="row">

    <div class="col-sm-9">

      		<h2 class="Ac_Room_Text"><?php echo $res['Room_Name']; ?></h2>
          <h3 class="Ac_Room_Text"><?php echo 'Price'; ?></h3>
      		<p class="text-justify"><?php echo $res['Room_desc']; ?></p>
          <a href="Login.php" class="btn btn-danger">Book Now</a>
      				
    </div>
  <div class="col-sm-3">
    <div class="panel panel-primary">
    <div class="panel-heading">
      <h4 align="center">Room Type</h4>
    </div><br>
    <div class="panel-body-right text-center">
<!--Fatch Mysql Database Select Query Room Details -->
      <?php
      include('connection.php');
      $sql1=mysqli_query($con,"select * from roomtypemst");
     while($result1= mysqli_fetch_assoc($sql1))
     {

      ?>
      <a href="room_details.php?room_type_id=<?php echo $result1['room_type_id']; ?>"><?php echo $result1['Room_Name']; ?></a><hr>
      <?php } ?>
<!--Fatch Mysql Database Select Query Room Details -->

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
