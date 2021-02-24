<?php
@$search_term=$_GET['search'];
@$active=!(bool)$_GET['disabled'];
if(isset($search_btn)){
	header('location:dashboard.php?option=rooms&search='.$search.'&disabled='.!$active);
}
?>
<script type="text/javascript">
	function delRoom(id){
		if(confirm("You want to delete this Room ?")){
		window.location.href='delete_room.php?id='+id;
		}
	}
</script>
<table class="table table-bordered table-striped table-hover" id="results_table">
	<div class="row">
		<div class="col-8">
			<h1>Room Details</h1>
		</div>
		<div class="col-4 text-end">
			<div class="input-group mb-3">
				<forzm>
			</div>
<?php if ($active){ ?>
	<a class="btn btn-danger" href="dashboard.php?option=rooms&disabled=1">Disabled Rooms</a>
<?php }else{ ?>
			<a class="btn btn-success" href="dashboard.php?option=rooms&disabled=0">Active Rooms</a>
<?php } ?>
		</div>
	</div><hr>
	<tr>
	<td colspan="8">
		<div class="row">
			<div class="col-sm-6">
				<a href="dashboard.php?option=add_rooms" class="btn btn-primary">Add New Rooms</a>
			</div>
			<div class="col-sm-6">
				<a href="dashboard.php?option=room_types" class="btn btn-warning">Room Types</a>
			</div>
		</div>
		</td>
	</tr>
	<tr style="height:40">
		<th width="90">Room No</th>
		<th width="110">Room Type</th>
		<th width="140">Status</th>
		<th>Notes</th>
		<th>Update</th>
<?php if ($active){ ?>
	<th>Disable</th>
<?php }else{ ?>
	<th>Enable</th>
	<th>Delete</th>
<?php } ?>

	</tr>
<?php
$sql=mysqli_query($con,"select * from roommst r inner join roomtypemst rt on r.room_type=rt.room_type_id where Active_Status='$active' and (room_name like '%$search_term%' or room_id like '%$search_term%')");
while($res=mysqli_fetch_assoc($sql))
{
	$toggleurl="dashboard.php?option=toggle_room&id=".$res['Room_id']."&search=".$search_term."&disabled=".!$active;
?>
	<form action="updateRoomOnly.php" method="post">
<tr id="room">
		<td><input type="hidden" name="room_id" value="<?php echo $res['Room_id']; ?>" /><?php echo $res['Room_id']; ?></td>
		<td><?php echo $res['Room_Name']; ?></td>
		<td>
			<select class="form-select" name="status" required onchange="this.form.submit()">
				<option value="Reserved" <?php if ($res['Room_Status'] == "Reserved") echo "selected='selected'";?>>Reserved</option>
				<option value="Unavailable" <?php if ($res['Room_Status'] == "Unavailable") echo "selected='selected'";?>>Unavailable</option>
				<option value="Occupied" <?php if ($res['Room_Status'] == "Occupied") echo "selected='selected'";?>>Occupied</option>
				<option value="Vacant" <?php if ($res['Room_Status'] == "Vacant") echo "selected='selected'";?>>Vacant</option>
			</select>
		</td>
		<td><?php echo $res['Notes']; ?></td>

		<td><a class="btn btn-primary" href="dashboard.php?option=update_room&id=<?php echo $res['Room_id']; ?>">Update Room</a></td>

<?php if ($active){ ?>
	<td><a class="btn btn-danger" href="<?php echo $toggleurl; ?>">Disable Room</a></td>
<?php }else{ ?>
	<td><a class="btn btn-success" href="<?php echo $toggleurl; ?>">Enable Room</a></td>
	<td><a class="btn btn-danger" href="#" onclick="delRoom('<?php echo $res['Room_id']; ?>')">Delete Room</a></td>
<?php } ?>

	</tr>
	</form>
<?php
}
?>

</table>
