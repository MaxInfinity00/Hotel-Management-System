<?php
  session_start();
  error_reporting(1);
  include('connection.php');
  $user_id=$_SESSION['create_account_logged_in'];
?>
<!DOCTYPE html>
<html lang="en">
<script type="text/javascript">
	function cancBook(id){
		if(confirm("Are you sure you want to cancel this Booking?")){
  		window.location.href='cancel_booking.php?id='+id;
		}
	}
</script>
<?php
  include('Menu Bar.php');
?>
<div class="container-fluid first-element" style="width:70%">
  <h1 class="text-center">Your Bookings</h1><br>
  <div class="container">
    <div class="row">
      <table class="table table-striped table-bordered table-hover table-responsive"style="height:150px;">
       <tr>
        <th>Booking ID</th>
        <th>Room</th>
        <th>Check In</th>
        <th>Check Out</th>
        <th>No. of Adults</th>
        <th>No. of Children</th>
        <th width="150px">View Bill/Edit</th>
      	<th width="160px">Feedback/Cancel</th>
       </tr>
<?php
$sql=mysqli_query($con,"select * from bookingmst b inner join roommst r on b.room_id = r.room_id inner join roomtypemst rt on r.room_type=rt.room_type_id where User_id='$user_id' and Status=true order by Date_of_Booking desc;");
  while($res=mysqli_fetch_assoc($sql)){
?>
        <tr>
          <td><?php echo $res['Booking_id'] ?></td>
          <td><?php echo $res['Room_Name'] ?></td>
          <td><?php echo date('F j, Y',strtotime($res['Check_in'])); ?></td>
          <td><?php echo date('F j, Y',strtotime($res['Check_out'])); ?></td>
          <td><?php echo $res['No_of_Adults'] ?></td>
          <td><?php echo $res['No_of_children'] ?></td>
<?php
  if(strtotime(date('Y-m-d'))>strtotime($res['Check_in'])){
?>
          <td><a class="btn btn-info" href="view_bill.php?id=<?php echo $res['Booking_id'];?>">View Bill</a></td>
<?php
$fed=mysqli_query($con,"select * from feedbackmst where Booking_id='".$res['Booking_id']."';");
if(mysqli_num_rows($fed)){
?>
          <td><a class="btn btn-primary" href="edit_feedback.php?id=<?php echo $res['Booking_id'];?>">Edit Feedback</a></td>
<?php } else{ ?>
          <td><a class="btn btn-success" href="feedback.php?id=<?php echo $res['Booking_id'];?>">Feedback</a></td>
<?php }} else{ ?>
          <td><a class="btn btn-primary" href="edit_booking.php?id=<?php echo $res['Booking_id'];?>">Edit Booking</a></td>
          <td><a class="btn btn-danger" href="#" onclick="cancBook('<?php echo $res['Booking_id']; ?>')">Cancel Booking</a></td>
<?php } ?>
        </tr>
<?php } ?>
        </table>
      </div>
    </div>
  </div>
<?php
  include('Footer.php')
?>
</body>
</html>
