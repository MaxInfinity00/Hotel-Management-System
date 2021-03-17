<?php
if(isset($add))
{
	$sql=mysqli_query($con,"select * from roommst where Room_id='$rno'");
	if(mysqli_num_rows($sql))
	{
	echo "this room is already added";
	}
	else
	{
	mysqli_query($con,"insert into roommst values('$rno','$type','$status','$notes',true)");
	echo "Room added successfully";
	}
}
?>

<form method="post" enctype="multipart/form-data">
<table class="table table-bordered">
	<div class="table-head">
			<h1>Add Room Details</h1>
	</dic><hr />

	<tr>
		<th>Room No</th>
		<td><input type="text" name="rno"  class="form-control" required/>
		</td>
	</tr>

	<tr>
		<th>Room Type</th>
		<td>
			<select class="form-select" name="type"required>
				<?php
					$roomsql=mysqli_query($con,"select * from roomtypemst");
					while($room=mysqli_fetch_assoc($roomsql))
					{
				?>
						<option value="<?php echo $room['Room_type_id']?>"><?php echo $room['Room_Name'] ?></option>
				<?php } ?>
			</select>
		</td>
	</tr>
	<tr>
		<th>Status</th>
		<td>
			<select class="form-select" name="status"required>
				<option value="Reserved" >Reserved</option>
				<option value="Unavailable" >Unavailable</option>
				<option value="Occupied" >Occupied</option>
				<option value="Vacant" >Vacant</option>
		</select>
		</td>
	</tr>
	<tr>
		<th>Notes</th>
		<td><textarea name="notes" class="form-control"></textarea>
		</td>
	</tr>

	<tr>
		<td colspan="2">
			<input type="submit" class="btn btn-primary" value="Add Room" name="add"/>
		</td>
	</tr>
</table>
</form>
