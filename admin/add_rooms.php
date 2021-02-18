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
	// $img=$_FILES['img']['name'];
	mysqli_query($con,"insert into roommst values('$rno','$type','$price','$status','$details')");
	// move_uploaded_file($_FILES['img']['tmp_name'],"../image/rooms/".$_FILES['img']['name']);
	echo "Room added successfully";
	}
}
?>

<form method="post" enctype="multipart/form-data">
<table class="table table-bordered">

	<tr>
		<th>Room No</th>
		<td><input type="text" name="rno"  class="form-control"/>
		</td>
	</tr>

	<tr>
		<th>Room Type</th>
		<td><select class="form-control" name="type"required>
			<option value="Deluxe Room Sea View" >Deluxe Room Sea View</option>
			<option value="Deluxe Room Ocean View">Deluxe Room Ocean View</option>
			<option value="Superior Room Sea View">Superior Room Sea View</option>
			<option value="Apollo Suite 1 Bedroom Sea View">Apollo Suite 1 Bedroom Sea View</option>
			<option value="Deluxe Room City View">Deluxe Room City View</option>
		</select>
		</td>
	</tr>

	<tr>
		<th>Tariff</th>
		<td><input type="text" name="price"  class="form-control"/>
		</td>
	</tr>
	<tr>
		<th>Status</th>
		<td>
			<select class="form-control" name="status"required>
				<option value="Reserved" >Reserved</option>
				<option value="Unavailable" >Unavailable</option>
				<option value="Occupied" >Occupied</option>
				<option value="Vacant" >Vacant</option>
		</select>
		</td>
	</tr>
	<tr>
		<th>Details</th>
		<td><textarea name="details"  class="form-control"></textarea>
		</td>
	</tr>

	<tr>
		<td colspan="2">
			<input type="submit" class="btn btn-primary" value="Add Room" name="add"/>
		</td>
	</tr>
</table>
</form>
