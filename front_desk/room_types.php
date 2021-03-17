<script>
	function delRoomType(id)
	{
		if(confirm("You want to delete this Room ?"))
		{
			window.location.href='delete_room_type.php?id='+id;
		}
	}
</script>

<table class="table table-bordered table-striped table-hover">
	<h1>Room Types</h1><hr>
	<tr>
	<td colspan="7">
		<a href="dashboard.php?option=add_room_type" class="btn btn-primary">Add Room Types</a>
		</td>
	</tr>
	<tr>
		<th>Room Type ID</th>
		<th>Room Type</th>
		<th>Image</th>
		<th>Tariff</th>
		<th>Details</th>
		<th>Update</th>
		<th>Delete</th>
	</tr>
<?php
	$sql=mysqli_query($con,"select * from roomtypemst");
	while($res=mysqli_fetch_assoc($sql))
	{
	$id=$res['Room_type_id'];
	$img=$res['Image'];
	$path="../image/rooms/$img";
?>
		<tr>
		<td><?php echo $res['Room_type_id']; ?></td>
		<td><?php echo $res['Room_Name']; ?></td>
		<td><img src="<?php echo $path;?>" width="200" height="100"/></td>
		<td><?php echo $res['Room_tariff']; ?></td>
		<td><?php echo $res['Room_desc']; ?></td>

		<td><a class="btn btn-primary" href="dashboard.php?option=update_room_type&id=<?php echo $res['Room_type_id']; ?>">Update Room Type</a></td>
		<td><a class="btn btn-danger" href="#" onclick="delRoomType('<?php echo $res['Room_type_id']; ?>')">Delete Room Type</a></td>

	</tr>
<?php
}
?>

</table>
