<?php
$imgshow='';
if(isset($add))
{
	$imgNew=basename($_FILES['img']['name']);
	if(strlen($user_id) > 0 && strlen($passw) > 0){
		mysqli_query($con,"insert into loginmst values('$user_id','$passw','$account_type')");
		$sql="insert into staffmst values('$staff_id','$user_id','$name','$designtn','$salary','$address','$age','$gender','$contact','$imgNew','$lpm','$lpm')";
	}
	else{
		$sql="insert into staffmst(Staff_id,Staff_Name,Designation,Salary,Address,Age,Gender,Contact_number,Image,Leaves_per_month,Unclaimed_leave) values('$staff_id','$name','$designtn','$salary','$address','$age','$gender','$contact','$imgNew','$lpm','$lpm')";
	}
	if(mysqli_query($con,$sql))
	{
	move_uploaded_file($_FILES['img']['tmp_name'],"image/staff/".basename($_FILES['img']['name']));
	header('location:dashboard.php?option=staff');
	}
	printf("error: %s\n", mysqli_error($con));

}
?>
<script type="text/javascript">
$(function(){
	$('#imageSelector').change(function(event){
    $("#displayImg").attr('src',URL.createObjectURL(event.target.files[0]));
	});
});
</script>
<form method="post" enctype="multipart/form-data">
<table class="table table-bordered">
	<h1>Add Staff Details</h1><hr>
	<tr>
		<th>Staff ID</th>
		<td><input type="text" name="staff_id" class="form-control"/></td>
	</tr>
	<tr>
		<th>Staff Name</th>
		<td><input type="text" name="name" class="form-control"/></td>
	</tr>
	<tr>
		<th>Staff Image</th>
		<td>
			<img id="displayImg" src='' width="100" height="120">
			<input type="file" class="form-control" id="imageSelector" name="img" accept="image/*"/>
		</td>
	</tr>
	<tr>
		<th>User Id</th>
		<td><input type="text" name="user_id" class="form-control"/></td>
	</tr>
	<tr>
		<th>Account Type</th>
		<td><select class="form-select" name="account_type" required>
			<option value="FDM" selected>Front Desk Manager</option>
			<option value="Admin">Admin</option>
		</select>
		</td>
	</tr>
	<tr>
		<th>Password</th>
		<td><input type="password" name="passw" class="form-control" autocomplete="new-password"/></td>
	</tr>
	<tr>
		<th>Designation</th>
		<td><input type="text" name="designtn" class="form-control"/></td>
	</tr>
	<tr>
		<th>Salary</th>
		<td><input type="text" name="salary" class="form-control"/></td>
	</tr>
	<tr>
		<th>Address</th>
		<td><textarea name="address" class="form-control"></textarea></td>
	</tr>
	<tr>
		<th>Age</th>
		<td><input type="text" name="age" class="form-control"/></td>
	</tr>
	<tr>
		<th>Gender</th>
		<td class="text-start">
			<input type="radio" name="gender" value="Male" checked> Male</input><br>
			<input type="radio" name="gender" value="Female"> Female</input><br>
			<input type="radio" name="gender" value="Others"> Others</input>
		</td>
	</tr>
	<tr>
		<th>Contact</th>
		<td><input type="text" name="contact" class="form-control"/></td>
	</tr>
	<tr>
		<th>Leaves Per Month</th>
		<td><input type="text" name="lpm" class="form-control"/></td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="submit" class="btn btn-primary" value="Add Staff" name="add"/>
		</td>
	</tr>
</table>
</form>