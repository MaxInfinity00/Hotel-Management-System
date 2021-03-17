<?php
$id=$_GET['id'];
$sql=mysqli_query($con,"select * from roommst where Room_id='$id'");
$res=mysqli_fetch_assoc($sql);

extract($_REQUEST);
if(isset($update))
{
mysqli_query($con,"update roommst set Room_id='$rno',Room_type='$type',room_tariff='$price',Notes='$notes', Room_Status='$status' where room_id='$id' ");
header('location:dashboard.php?option=rooms');
}

?>

<form method="post" enctype="multipart/form-data">
<table class="table table-bordered">
	<h1>Update Room Details</h1><hr>

	<tr>
		<th>Room No</th>
		<td><input type="text"  name="rno" value="<?php echo $res['Room_id']; ?>"  class="form-control"/>
		</td>
	</tr>

	<tr>
		<th>Room Type</th>
		<td>
			<select class="form-select" name="type" required>
				<?php
					$roomsql=mysqli_query($con,"select * from roomtypemst");
					while($room=mysqli_fetch_assoc($roomsql))
					{
				?>
						<option value="<?php echo $room['Room_type_id']?>" <?php if ($res['Room_type'] == $room['Room_type_id']) echo "selected";?>><?php echo $room['Room_Name'] ?></option>
				<?php } ?>
			</select>
		</td>
	</tr>

	<tr>
		<th>Tariff</th>
		<td><input type="text" name="price"  value="<?php echo $res['Room_tariff']; ?>" class="form-control"/>
		</td>
	</tr>

	<tr>
		<th>Status</th>
		<td>
			<select class="form-select" name="status"required>
				<option value="Reserved" <?php if ($res['Room_Status'] == "Reserved") echo "selected='selected'";?>>Reserved</option>
				<option value="Unavailable" <?php if ($res['Room_Status'] == "Unavailable") echo "selected='selected'";?>>Unavailable</option>
				<option value="Occupied" <?php if ($res['Room_Status'] == "Occupied") echo "selected='selected'";?>>Occupied</option>
				<option value="Vacant" <?php if ($res['Room_Status'] == "Vacant") echo "selected='selected'";?>>Vacant</option>
		</select>
		</td>
	</tr>

	<tr>
		<th>Notes</th>
		<td><textarea name="notes" rows="10" class="form-control"><?php echo $res['Notes']; ?></textarea>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="submit" class="btn btn-primary" value="Update Room Details" name="update"/>
		</td>
	</tr>
</table>
</form>
