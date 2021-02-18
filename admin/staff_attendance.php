<?php
$id=$_GET['id'];
$sql=mysqli_query($con,"select * from roommst where Room_id='$id'");
$res=mysqli_fetch_assoc($sql);

extract($_REQUEST);
if(isset($update))
{
mysqli_query($con,"update roommst set Room_id='$rno',Room_type='$type',room_tariff='$price',room_desp='$details', Room_Status='$status' where room_id='$id' ");
header('location:dashboard.php?option=rooms');
}

?>

<form method="post" enctype="multipart/form-data">
<table class="table table-bordered">

	<tr>
		<th>Room No</th>
		<td><input type="text"  name="rno" value="<?php echo $res['Room_id']; ?>"  class="form-control"/>
		</td>
	</tr>

	</tr>



	<tr>
	<tr>
		<th>Room Type</th>
		<td><select class="form-control" name="type"required>
			<option value="Deluxe Room Sea View" <?php if ($res['Room_type'] == "Deluxe Room Sea View") echo "selected='selected'";?>>Deluxe Room Sea View</option>
			<option value="Deluxe Room Ocean View" <?php if ($res['Room_type'] == "Deluxe Room Ocean View") echo "selected='selected'";?>>Deluxe Room Ocean View</option>
			<option value="Superior Room Sea View" <?php if ($res['Room_type'] == "Superior Room Sea viewport") echo "selected='selected'";?>>Superior Room Sea View</option>
			<option value="Apollo Suite 1 Bedroom Sea View" <?php if ($res['Room_type'] == "Apollo Suite 1 Bedrooom Sea View") echo "selected='selected'";?>>Apollo Suite 1 Bedroom Sea View</option>
			<option value="Deluxe Room City View" <?php if ($res['Room_type'] == "Deluxe Room City View") echo "selected='selected'";?>>Deluxe Room City View</option>
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
			<select class="form-control" name="status"required>
				<option value="Reserved" <?php if ($res['Room_Status'] == "Reserved") echo "selected='selected'";?>>Reserved</option>
				<option value="Unavailable" <?php if ($res['Room_Status'] == "Unavailable") echo "selected='selected'";?>>Unavailable</option>
				<option value="Occupied" <?php if ($res['Room_Status'] == "Occupied") echo "selected='selected'";?>>Occupied</option>
				<option value="Vacant" <?php if ($res['Room_Status'] == "Vacant") echo "selected='selected'";?>>Vacant</option>
		</select>
		</td>
	</tr>

	<tr>
		<th>Details</th>
		<td><textarea name="details" rows="10" class="form-control"><?php echo $res['room_desp']; ?></textarea>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="submit" class="btn btn-primary" value="Update Room Details" name="update"/>
		</td>
	</tr>
</table>
</form>
