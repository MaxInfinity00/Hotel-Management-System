
<table class="table table-bordered table-striped table-hover">
	<h1>Booking Details</h1><hr>
	<tr>
		<th>Booking id</th>
		<th>Room</th>
		<th>User</th>
		<th>Date Booked</th>
		<th>Check in</th>
		<th>Check out</th>
		<th>No. of Adults</th>
		<th>No. of Children</th>
		<th>Comments</th>
		<th>Cancel Booking</th>
	</tr>

<?php
$i=1;
$sql=mysqli_query($con,"select * from bookingmst");
while($res=mysqli_fetch_assoc($sql))
{

?>
<tr>
		<td><?php echo $res['Booking_id']; ?></td>
		<td><?php echo $res['Room_id']; ?></td>
		<td><?php echo $res['User_id']; ?></td>
		<td><?php echo $res['Date_of_Booking']; ?></td>
		<td><?php echo $res['Check_in']; ?></td>
		<td><?php echo $res['Check_out']; ?></td>
		<td><?php echo $res['No_of_Adults']; ?></td>
		<td><?php echo $res['No_of_children']; ?></td>
		<td><?php echo $res['Comments']; ?></td>
		<td><a style="color:red" href="cancel_order.php?booking_id=<?php echo $res['Booking_id']; ?>">Cancel</a></td>
	</td>
	</tr>
<?php
}

?>
</table>
