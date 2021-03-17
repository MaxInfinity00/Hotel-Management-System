<?php
$id=$_GET['id'];
$staff=mysqli_fetch_assoc(mysqli_query($con,"select * from staffmst where staff_id='$id'"));
?>
<script>
	function delAttendance(id,clock_in)
	{
		if(confirm("You want to delete this attendance record?"))
		{
		window.location.href='delete_attendance.php?id='+id+'&clock_in='+clock_in;
		}
	}
</script>
<form method="post" enctype="multipart/form-data">
<table class="table table-bordered">
	<h1>Staff Attendance Details</h1><hr>
	<h4>
		<b>Staff ID:</b> <?php echo $staff['Staff_id'];?><br />
		<b>Name:</b> <?php echo $staff['Staff_Name'];?>
	</h4>
	<tr>
	<td colspan="6"><a class="btn btn-success" href="dashboard.php?option=add_attendance&id=<?php echo $id ?>">Add Attendance</a></td>
	</tr>

	<tr>
		<th>Clock in</th>
		<th>Clock out</th>
		<th>Edit Attendance</th>
		<th>Delete Attendance</th>
	</tr>

	<?php
	$sql=mysqli_query($con,"select * from staffattendancemst sa left join staffmst s on sa.Staff_id=s.Staff_id where sa.staff_id='$id' order by Clock_in desc");
	while($res=mysqli_fetch_assoc($sql))
	{
		?>
	<tr>
		<td><?php echo date('F j, Y H:i',strtotime($res['Clock_in']));?></td>
		<?php
		if(!is_null($res['Clock_out'])){ ?>
		<td><?php echo date('F j, Y H:i',strtotime($res['Clock_out'])); ?></td>
	<?php }else{?>
		<td><a href="dashboard.php?option=clock_out&id=<?php echo $id; ?>&clock_in=<?php echo $res['Clock_in']; ?>" class="btn btn-success">Clock_out</a></td>
	<?php }?>
		<td><a class="btn btn-primary" href="dashboard.php?option=edit_attendance&id=<?php echo $id; ?>&clock_in=<?php echo $res['Clock_in']; ?>">Edit Attendance</a></td>
		<td><a class="btn btn-danger" href="#" onclick="delAttendance('<?php echo $id; ?>','<?php echo $res['Clock_in']; ?>')">Delete Attendance</a></td>
	</tr>
<?php } ?>
</table>
</form>
