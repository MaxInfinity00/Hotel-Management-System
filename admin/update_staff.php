<?php
$id=$_GET['id'];
$sql=mysqli_query($con,"select * from staffmst s left join loginmst l on s.user_id=l.user_id where staff_id='$id'");
$res=mysqli_fetch_assoc($sql);
if(isset($update))
{
	$old_id=$res['User_id'];
	$user_id=trim($user_id);
	if(strlen($user_id) > 0 && strlen($passw) > 0){
		if($user_id != $old_id){
			mysqli_query($con,"insert into loginmst values('$user_id','$passw','$account_type')");
			mysqli_query($con,"update staffmst set user_id='$user_id' where staff_id='$id'");
			mysqli_query($con,"delete from loginmst where User_id='$old_id'");
		}
		else{
				mysqli_query($con,"update loginmst set Hashed_Password='$passw', Account_Type='$account_type' where User_id='$old_id'");
		}
	}
	else{
		mysqli_query($con,"update staffmst set user_id=NULL where staff_id='$id'");
		mysqli_query($con,"delete from loginmst where User_id='$old_id'");
	}
	if ($_FILES['img']['size'] > 0)
	{
		$imgNew=basename($_FILES['img']['name']);
		$imgpath="image/staff/".$res['Image'];
		unlink($imgpath);
    mysqli_query($con,"update staffmst set Image='$imgNew' where staff_id='$id'");
		move_uploaded_file($_FILES['img']['tmp_name'],"image/staff/".basename($_FILES['img']['name']));
	}
	$sql="update staffmst set Staff_id='$new_staff_id', Staff_Name='$name', Designation='$designtn',Salary='$salary',Address='$address',Age='$age',Gender='$gender',Contact_number='$contact',Leaves_per_month='$lpm',Unclaimed_leave='$unclev' where staff_id='$id'";
	if(mysqli_query($con,$sql))
	{
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
	<h1>Update Staff Details</h1><hr>
	<tr>
		<th>Staff ID</th>
		<td><input type="text" name="new_staff_id" class="form-control" value="<?php echo $res['Staff_id']; ?>"/></td>
	</tr>
	<tr>
		<th>Staff Name</th>
		<td><input type="text" name="name" class="form-control" value="<?php echo $res['Staff_Name']; ?>"/></td>
	</tr>
	<tr>
		<th>Staff Image</th>
		<td>
			<img id="displayImg" src='<?php echo 'image/staff/'.$res['Image'] ?>' width="100" height="120">
			<input type="file" id="imageSelector" class="form-control" name="img" accept="image/*"/>
		</td>
	</tr>
	<tr>
		<th>User Id</th>
		<td><input type="text" name="user_id" class="form-control" value="<?php echo $res['User_id']; ?>"/></td>
	</tr>
	<tr>
		<th>Account Type</th>
		<td><select class="form-select" name="account_type" required>
			<option value="FDM" <?php if ($res['Account_Type'] == "FDM") echo "selected";?>>Front Desk Manager</option>
			<option value="Admin" <?php if ($res['Account_Type'] == "Admin") echo "selected";?>>Admin</option>
		</select>
		</td>
	</tr>
	<tr>
		<th>Password</th>
		<td><input type="password" name="passw" class="form-control" autocomplete="new-password" value="<?php echo $res['Hashed_Password']; ?>"/></td>
	</tr>
	<tr>
		<th>Designation</th>
		<td><input type="text" name="designtn" class="form-control" value="<?php echo $res['Designation']; ?>"/></td>
	</tr>
	<tr>
		<th>Salary</th>
		<td><input type="text" name="salary" class="form-control" value="<?php echo $res['Salary']; ?>"/></td>
	</tr>
	<tr>
		<th>Address</th>
		<td><textarea name="address" class="form-control"><?php echo $res['Address']; ?></textarea></td>
	</tr>
	<tr>
		<th>Age</th>
		<td><input type="text" name="age" class="form-control" value="<?php echo $res['Age']; ?>"/></td>
	</tr>
	<tr>
		<th>Gender</th>
		<td class="text-start">
			<input type="radio" name="gender" value="Male" <?php if ($res['Gender'] == "Male") echo "checked";?>> Male</input><br>
			<input type="radio" name="gender" value="Female" <?php if ($res['Gender'] == "Female") echo "checked";?>> Female</input><br>
			<input type="radio" name="gender" value="Others" <?php if ($res['Gender'] == "Others") echo "checked";?>> Others</input>
		</td>
	</tr>
	<tr>
		<th>Contact</th>
		<td><input type="text" name="contact" class="form-control" value="<?php echo $res['Contact_number']; ?>"/></td>
	</tr>
	<tr>
		<th>Leaves Per Month</th>
		<td><input type="text" name="lpm" class="form-control" value="<?php echo $res['Leaves_per_month']; ?>"/></td>
	</tr>
	<tr>
		<th>Unclaimed Leaves</th>
		<td><input type="text" name="unclev" class="form-control" value="<?php echo $res['Unclaimed_leave']; ?>"/></td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="submit" class="btn btn-primary" value="Update Staff" name="update"/>
		</td>
	</tr>
</table>
</form>
