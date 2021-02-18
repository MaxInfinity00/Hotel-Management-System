<script>
	function delRoom(id)
	{
		if(confirm("You want to delete this Room ?"))
		{
		window.location.href='delete_room.php?id='+id;
		}
	}
</script>

<table class="table table-bordered table-striped table-hover">
	<h1>Room Details</h1><hr>
	<tr>
	<td colspan="7"><a href="dashboard.php?option=add_rooms" class="btn btn-primary">Add New Rooms</a></td>
	</tr>
	<tr style="height:40">
		<th width="90">Room No</th>
		<th width="110">Room Type</th>
		<th>Tariff</th>
		<th width="140">Status</th>
		<th>Details</th>
		<th>Update</th>
		<th>Delete</th>
	</tr>
<?php
$i=1;
$sql=mysqli_query($con,"select * from roommst");
while($res=mysqli_fetch_assoc($sql))
{
// $id=$res['room_id'];
// $img=$res['image'];
// $path="../image/rooms/$img";
?>
	<form action="updateRoomOnly.php" method="post">
<tr id="room">
		<!-- <td><img src="<?php echo $path;?>" width="50" height="50"/></td> -->
		<td><input type="hidden" name="room_id" value="<?php echo $res['Room_id']; ?>" /><?php echo $res['Room_id']; ?></td>
		<td><?php echo $res['Room_type']; ?></td>
		<td><?php echo $res['Room_tariff']; ?></td>
		<td>
				<select class="form-control" name="status" required onchange="this.form.submit()">
					<option value="Reserved" <?php if ($res['Room_Status'] == "Reserved") echo "selected='selected'";?>>Reserved</option>
					<option value="Unavailable" <?php if ($res['Room_Status'] == "Unavailable") echo "selected='selected'";?>>Unavailable</option>
					<option value="Occupied" <?php if ($res['Room_Status'] == "Occupied") echo "selected='selected'";?>>Occupied</option>
					<option value="Vacant" <?php if ($res['Room_Status'] == "Vacant") echo "selected='selected'";?>>Vacant</option>
			</select>
		</td>
		<td><?php echo $res['room_desp']; ?></td>

		<td><a href="dashboard.php?option=update_room&id=<?php echo $res['Room_id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>


		<td><a href="#" onclick="delRoom('<?php echo $res['Room_id']; ?>')"><span class="glyphicon glyphicon-remove" style='color:red'></span></a></td>
	</tr>
	</form>
<?php
}
?>

</table>
