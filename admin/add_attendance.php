<?php
$id=$_GET['id'];
$error="";
if(isset($add))
{
	$clock_in=date('Y-m-d H:i:s',strtotime($clock_in));
	if(strlen($clock_out) > 0){
		$clock_out=date('Y-m-d H:i:s',strtotime($clock_out));
		if($clock_out > $clock_in){
			$sql="insert into staffattendancemst values('$staff_id','$clock_in','$clock_out')";
		}
		else{
			$error = "Clock out time set before clock in time.<br />";
		}
	}
	else{
		$sql="insert into staffattendancemst(Staff_id,Clock_in) values('$staff_id','$clock_in')";
	}
	if($error=="" and mysqli_query($con,$sql)){
		header('location:dashboard.php?option=view_attendance&id='.$id);
	}
	printf("error: %s\n", mysqli_error($con));
}
$sql=mysqli_query($con,"select * from staffmst where staff_id='$id'");
$res=mysqli_fetch_assoc($sql);
?>
<form method="post" enctype="multipart/form-data">
<table class="table table-bordered">
	<h1>Add Attendance</h1><hr>

	<tr>
		<th>Staff ID</th>
		<td><input type="text" name="staff_id" class="form-control" value="<?php echo $res['Staff_id'];?>" readonly /></td>
	</tr>
	<tr>
		<th>Staff Name</th>
		<td><input type="text" name="staff_name" class="form-control" value="<?php echo $res['Staff_Name'];?>" readonly /></td>
	</tr>
	<tr>
		<th>Clock in</th>
		<td><input type="datetime-local" name="clock_in" value="<?php echo date('Y-m-d\TH:i');?>" class="form-control"/></td>
	</tr>
	<tr>
		<th>Clock out</th>
		<td>
	    <b class="text-center" style='color:red;'><?php echo $error; ?></b>
			<input type="datetime-local" name="clock_out" class="form-control"/></td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="submit" class="btn btn-primary" value="Add Attendance" name="add"/>
		</td>
	</tr>
</table>
</form>
