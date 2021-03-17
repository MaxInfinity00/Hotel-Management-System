<?php
$id=$_GET['id'];
$clock_in=$_GET['clock_in'];
date_default_timezone_set('Asia/Kolkata');
$error="";
if(isset($add))
{
		$clock_out=date('Y-m-d H:i:s',strtotime($clock_out));
		if($clock_out > $clock_in){
			$sql="update staffattendancemst set clock_out = '$clock_out' where staff_id='$id' and clock_in='$clock_in'";
		}
		else{
			$error = "Clock out time set before clock in time.<br />";
		}
	if($error=="" and mysqli_query($con,$sql))
	{
	header('location:dashboard.php?option=view_attendance&id='.$id);
	}
	printf("error: %s\n", mysqli_error($con));
}
$sql=mysqli_query($con,"select * from staffattendancemst sa left join staffmst s on sa.Staff_id=s.Staff_id where sa.staff_id='$id' and clock_in='$clock_in'");
$res=mysqli_fetch_assoc($sql);
?>
<form method="post" enctype="multipart/form-data">
<table class="table table-bordered">
	<h1>Clock out</h1><hr>
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
		<td><input type="datetime-local" name="clock_in" value="<?php echo date('Y-m-d\TH:i',strtotime($res['Clock_in']));?>" class="form-control" readonly/></td>
	</tr>
	<tr>
		<th>Clock out</th>
		<td>
	    <b class="text-center" style='color:red;'><?php echo $error; ?></b>
			<input type="datetime-local" name="clock_out" value="<?php echo date('Y-m-d\TH:i');?>" class="form-control"/></td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="submit" class="btn btn-primary" value="Clock Out" name="add"/>
		</td>
	</tr>
</table>
</form>
