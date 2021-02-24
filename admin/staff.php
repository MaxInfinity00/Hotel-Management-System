<?php
@$search_term=$_GET['search'];
@$active=!(bool)$_GET['disabled'];
if(isset($search_btn)){
	header('location:dashboard.php?option=staff&search='.$search.'&disabled='.!$active);
}
?>
<script>
	function delStaff(id)
	{
		if(confirm("You want to delete this Staff and its attendance ?"))
		{
		window.location.href='delete_staff.php?id='+id;
		}
	}
</script>
<table class="table table-bordered table-striped table-hover">
	<div class="row">
		<div class="col-8">
			<h1>Staff Details</h1>
		</div>
		<div class="col-4 text-end">
			<div class="input-group mb-3">
				<form method="post" enctype="multipart/form-data">
				  <input type="text" name="search" onchange="this.form.submit()" class="form-control"  placeholder="Search...">
					<button type="submit" class="btn btn-outline-info" name="search_btn"><i class="bi bi-search"></i></button>
				</form>
			</div>
<?php if ($active){ ?>
	<a class="btn btn-danger" href="dashboard.php?option=staff&disabled=1">Disabled Staff</a>
<?php }else{ ?>
			<a class="btn btn-success" href="dashboard.php?option=staff&disabled=0">Active Staff</a>
<?php } ?>
		</div>
	</div><hr>
	<tr>
	<td colspan="7"><a href="dashboard.php?option=add_staff" class="btn btn-primary">Add Staff</a></td>
	</tr>
	<tr style="height:40">
		<th>Staff Id</th>
		<th rowspan="3">Image</th>
		<th>Age</th>
		<th>Designation</th>
		<th>Salary</th>
		<th>Unclaimed Leaves</th>
		<th>Leaves per Month</th>
	</tr><tr style="height:40">
		<th>Name</th>
		<th>Gender</th>
		<th colspan="2" rowspan="2">Address</th>
		<th>View Attendance</th>
<?php if ($active){ ?>
		<th>Add Attendance</th>
<?php }else{ ?>
		<th>Enable</th>
<?php } ?>
	</tr><tr style="height:40">
		<th>User Id</th>
		<th>Contact</th>
		<th>Update Staff Profile</th>
<?php if ($active){ ?>
		<th>Disable</th>
<?php }else{ ?>
		<th>Delete Staff Profile</th>
<?php } ?>
	</tr>
<?php
$sql=mysqli_query($con,"select * from staffmst where Active_Status='$active' and CONCAT_WS('',Staff_name,Staff_id,designation) like '%$search_term%';");
while($res=mysqli_fetch_assoc($sql))
{
	$toggleurl="dashboard.php?option=toggle_staff&id=".$res['Staff_id']."&search=".$search_term."&disabled=".!$active;
$img=$res['Image'];
$path="image/staff/$img";
?>
		<tr class="empty-row"><td colspan="7" class="empty-row"></td></tr>
		<tr>
			<td><?php echo $res['Staff_id']; ?></td>
			<td rowspan="3"><img src="<?php echo $path;?>" width="100" height="120"/></td>
			<td><?php echo $res['Age']; ?></td>
			<td><?php echo $res['Designation']; ?></td>
			<td><?php echo $res['Salary']; ?></td>
			<td><?php echo $res['Unclaimed_leave']; ?></td>
			<td><?php echo $res['Leaves_per_month']; ?></td>

		</tr>
		<tr>
			<td><?php echo $res['Staff_Name']; ?></td>
			<td><?php echo $res['Gender']; ?></td>
			<td colspan="2" rowspan="2"><?php echo $res['Address']; ?></td>
<?php if ($active){ ?>
			<td><a class="btn btn-success" href="dashboard.php?option=add_attendance&id=<?php echo $res['Staff_id']; ?>">Add Attendance</a></td>
<?php }else{ ?>
			<td><a class="btn btn-success" href="<?php echo $toggleurl; ?>">Enable Staff</a></td>
<?php } ?>
<td><a class="btn btn-info" href="dashboard.php?option=view_attendance&id=<?php echo $res['Staff_id']; ?>">View Attendance</a></td>
							</tr>
		<tr>
			<td><?php echo $res['User_id']; ?></td>
			<td><?php echo $res['Contact_number']; ?></td>
			<td><a class="btn btn-primary" href="dashboard.php?option=update_staff&id=<?php echo $res['Staff_id']; ?>">Update Staff</a></td>
<?php if ($active){ ?>
				<td><a class="btn btn-danger" href="<?php echo $toggleurl; ?>">Disable Staff</a></td>
<?php }else{ ?>
				<td><a class="btn btn-danger" href="#" onclick="delStaff('<?php echo $res['Staff_id']; ?>')">Delete Staff</a></td>
<?php } ?>
				</tr>
<?php
}
?>
</table>
