<?php
@$search_term=$_GET['search'];
if(isset($search_btn)){
	header('location:dashboard.php?option=payment&search='.$search);
}
?>
<table class="table table-bordered table-striped table-hover">
	<div class="table-head row">
		<div class="col-8">
			<h1>Payment Details</h1>
		</div>
		<div class="col-4 text-end">
			<div class="input-group mb-3">
				<form method="post" enctype="multipart/form-data">
				  <input type="text" name="search" class="form-control"  placeholder="Search..." autofocus>
					<button name="search_btn" class="btn btn-outline-info" type="submit"><i class="bi bi-search"></i></button>
				</form>
			</div>
		</div>
	</div><hr>
	<tr>
		<th>Payment ID</th>
		<th>Booking ID</th>
		<th>Room ID</th>
		<th>Amount</th>
		<th>Platform</th>
		<th>Transaction ID</th>
		<th>Time</th>
		<th>Status</th>
	</tr>
<?php
$sql=mysqli_query($con,"select * from paymentmst where CONCAT_WS('',Payment_id,Booking_id,Room_id,Amount,Platform,Transaction_id,Date_and_Time,Pay_Status) like '%$search_term%';");
while($res=mysqli_fetch_assoc($sql)){
?>
	<tr>
		<td><?php echo $res['Payment_id']; ?></td>
		<td><?php echo $res['Booking_id']; ?></td>
		<td><?php echo $res['Room_id']; ?></td>
		<td><?php echo $res['Amount']; ?></td>
		<td><?php echo $res['Platform']; ?></td>
		<td><?php echo $res['Transaction_id']; ?></td>
		<td><?php echo date('F j, Y H:i',strtotime($res['Date_and_Time'])); ?></td>
		<td><?php echo $res['Pay_Status']; ?></td>
	</tr>
<?php
}
?>

</table>
