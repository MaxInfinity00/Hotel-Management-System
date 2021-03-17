<?php
include('../money_formatting.php');
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
	<div class="table-head row">
		<div class="col-4">
			<h1>Staff Details</h1>
		</div>
		<div class="col-4">
			<div class="input-group mb-3">
				<form method="post" enctype="multipart/form-data">
					<input type="text" name="search" class="form-control"  placeholder="Search..." autofocus>
					<button type="submit" class="btn btn-outline-info" name="search_btn"><i class="bi bi-search"></i></button>
				</form>
			</div>
		</div>
		<div class="col-4 text-end">
<?php if ($active){ ?>
	<a class="btn btn-danger" href="dashboard.php?option=staff&disabled=1">Disabled Staff</a>
<?php }else{ ?>
			<a class="btn btn-success" href="dashboard.php?option=staff&disabled=0">Active Staff</a>
<?php } ?>
		</div>
	</div><hr>
<div class="text-center">
	<a href="dashboard.php?option=add_staff" class="btn btn-success mb-3">Add Staff</a>
</div>

	<div class="row row-cols-1 row-cols-md-2 g-4">
<?php
$sql=mysqli_query($con,"select * from staffmst where Active_Status='$active' and CONCAT_WS('',Staff_name,Staff_id,designation) like '%$search_term%';");
while($res=mysqli_fetch_assoc($sql))
{
	$toggleurl="dashboard.php?option=toggle_staff&id=".$res['Staff_id']."&search=".$search_term."&disabled=".!$active;
$img=$res['Image'];
$path="image/staff/$img";
?>
	  <div class="col">
			<div class="card staff-card">
		  <div class="row g-0">
		    <div class="col-md-4">
					<div class="card-header">
				    <h6><?php echo $res['Staff_id'];
						if($res['User_id'] != ''){
							echo " (".$res['User_id'].")";
						}?> <br /> <?php echo $res['Designation']; ?></h6>
				  </div>
		      <img src="<?php echo $path;?>" alt="Staff Image" width="100%" height="250px">
		    </div>
		    <div class="col-md-8">
		      <div class="card-body">
		        <h5 class="card-title"><?php echo $res['Staff_Name']; ?></h5>
		        <p class="card-text"><b>Date of Birth: </b><?php echo date('F j, Y',strtotime($res['DOB'])); ?></p>
						<p class="card-text"><b>Gender: </b><?php echo $res['Gender']; ?></p>
		        <p class="card-text"><b>Salary: ₹</b><?php echo moneyFormatIndia($res['Salary']); ?></p>
		        <p class="card-text"><b>Contact Number: </b><?php echo $res['Contact_number']; ?></p>
						<p class="card-text"><b>Address: </b><?php echo $res['Address']; ?></p>
						<p class="card-text"><b>Leaves per Month: </b><?php echo $res['Leaves_per_month']; ?> days</p>
						<p class="card-text"><b>Unclaimed Leaves: </b><?php echo $res['Unclaimed_leave']; ?> day(s)</p>
		      </div>
		    </div>
		  </div>
			<ul class="list-group list-group-flush">
		    <li class="list-group-item d-flex justify-content-around">
<?php if ($active){ ?>
					<a class="btn btn-success" href="dashboard.php?option=add_attendance&id=<?php echo $res['Staff_id']; ?>">Add Attendance</a>
<?php }else{ ?>
					<a class="btn btn-success" href="<?php echo $toggleurl; ?>">Enable Staff</a>
<?php } ?>
					<a class="btn btn-info white-text-btn" href="dashboard.php?option=view_attendance&id=<?php echo $res['Staff_id']; ?>">View Attendance</a>
				</li>
		    <li class="list-group-item d-flex justify-content-around">
					<a class="btn btn-primary" href="dashboard.php?option=update_staff&id=<?php echo $res['Staff_id']; ?>">Update Staff</a>
<?php if ($active){ ?>
					<a class="btn btn-danger" href="<?php echo $toggleurl; ?>">Disable Staff</a>
<?php }else{ ?>
					<a class="btn btn-danger" href="#" onclick="delStaff('<?php echo $res['Staff_id']; ?>')">Delete Staff</a>
<?php } ?>
		    </li>
		  </ul>
		</div>
	</div>
<?php
}
?>
</div>
</table>
