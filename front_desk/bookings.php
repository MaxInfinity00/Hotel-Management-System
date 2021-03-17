<?php
@$search_term=$_GET['search'];
@$active=!(bool)$_GET['disabled'];
if(isset($search_btn)){
	header('location:dashboard.php?option=bookings&search='.$search.'&disabled='.!$active);
}
?>
<script type="text/javascript">
	function cancBook(id){
		if(confirm("You want to cancel this Booking?")){
			window.location.href='../cancel_booking.php?id='+id+"&admin=1";
		}
	}
</script>
<table class="table table-bordered table-striped table-hover">
	<div class="table-head row">
		<div class="col-4">
			<h1>Booking Details</h1>
		</div>
		<div class="col-4">
			<div class="input-group mb-3 text-center">
				<form method="post" enctype="multipart/form-data">
					<input type="text" name="search" class="form-control"  placeholder="Search..." autofocus>
					<button name="search_btn" class="btn btn-outline-info" type="submit"><i class="bi bi-search"></i></button>
				</form>
			</div>
		</div>
		<div class="col-4 text-end">
<?php if ($active){ ?>
	<a class="btn btn-danger" href="dashboard.php?option=bookings&disabled=1">Canceled Bookings</a>
<?php }else{ ?>
			<a class="btn btn-success" href="dashboard.php?option=bookings&disabled=0">Active Bookings</a>
<?php } ?>
		</div>
	</div><hr>
	<tr>
		<td colspan="9"><a href="../Booking form.php" class="btn btn-success">Add Booking</a></td>
	</tr>
	<tr>
		<th rowspan="2">Booking id</th>
		<th>Room</th>
		<th>User</th>
		<th>Date Booked</th>
		<th>Check in</th>
		<th>Check out</th>
	</tr>
	<tr>
<?php if ($active){ ?>
<th>No. of Adults</th>
<th>No. of Children</th>
<th>Comments</th>
		<th>Add Bill</th>
		<th>View Bill</th>
<?php } ?>
	</tr>

<?php
$i=1;
$sql=mysqli_query($con,"select * from bookingmst where Status='$active' and CONCAT_WS('',Booking_id,Room_id,User_id,Check_in,Check_out,Comments) like '%$search_term%' order by Date_of_Booking desc");
while($res=mysqli_fetch_assoc($sql))
{
	$cancelurl="dashboard.php?option=cancel_booking&id=".$res['Booking_id']."&search=".$search_term."&disabled=".!$active;
?>
<tr class="empty-row"><td colspan="9" class="empty-row"></td></tr>

<tr>
		<td rowspan="2"><?php echo $res['Booking_id']; ?></td>
		<td><?php echo $res['Room_id']; ?></td>
		<td><?php echo $res['User_id']; ?></td>
		<td><?php echo date('F j, Y',strtotime($res['Date_of_Booking'])); ?></td>
		<td><?php echo date('F j, Y',strtotime($res['Check_in'])); ?></td>
		<td><?php echo date('F j, Y',strtotime($res['Check_out'])); ?></td>
	</tr>
	<tr>

<?php if ($active){ ?>
<td><?php echo $res['No_of_Adults']; ?></td>
<td><?php echo $res['No_of_children']; ?></td>
<td><?php echo $res['Comments']; ?></td>
		<td><a class="btn btn-success" href="dashboard.php?option=add_bill&id=<?php echo $res['Booking_id']; ?>">Add Bill</a></td>
		<td><a class="btn btn-info" href="dashboard.php?option=view_bill&id=<?php echo $res['Booking_id']; ?>">View Bill</a></td>
<?php } ?>
	</td>
	</tr>
<?php
}

?>
</table>
