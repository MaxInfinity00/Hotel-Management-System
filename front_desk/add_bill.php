<?php
  $id=$_GET['id'];
	if(isset($add)){
		echo "Bill added successfully";
	}
?>

<form method="post" enctype="multipart/form-data">
<table class="table table-bordered">
	<h1>Add Bill Details</h1><hr>
	<tr>
		<th>Room</th>
		<td><select class="form-select" name="Supply" required>
<?php
	$sql=mysqli_query($con,"select * from bookingmst where Booking_id='".$id."';");
	while($res=mysqli_fetch_assoc($sql)){
?>
				<option value="<?php echo $res['Room_id']?>"><?php echo $res['Room_id'] ?></option>
			<?php } ?>
		</select></td>
		</td>
	</tr>

	<tr>
		<th>Service</th>
		<td><select class="form-select" name="Supply" required>
			<?php
			$sql=mysqli_query($con,"select * from servicemst");
			while($res=mysqli_fetch_assoc($sql))
			{
				?>
				<option value="<?php echo $res['Service_id']?>"><?php echo $res['Service_Name']?></option>
			<?php } ?>
		</select></td>
	</tr>

	<tr>
		<th>Quantity</th>
		<td>
			<input type="number" name="cost" class="form-control" required/>
		</td>
	</tr>

	<tr>
		<td colspan="2">
			<input type="submit" class="btn btn-primary" value="Add Bill" name="add"/>
		</td>
	</tr>
</table>
</form>
