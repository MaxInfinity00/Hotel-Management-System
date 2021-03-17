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
	<div class="table-head row">
		<div class="col-4">
			<h1>Room Details</h1>
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
	<a class="btn btn-danger" href="dashboard.php?option=rooms&disabled=1">Disabled Rooms</a>
<?php }else{ ?>
			<a class="btn btn-success" href="dashboard.php?option=rooms&disabled=0">Active Rooms</a>
<?php } ?>
		</div>
	</div><hr>
	<tr>
		<th>Room No</th>
		<th>Room Type</th>
		<th>Status</th>
		<th>Notes</th>
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
	</tr>
	</form>
<?php
}
?>

</table>
