<?php
$id=$_GET['id'];
$sql=mysqli_query($con,"select * from vendormst where Vendor_id='$id'");
$res=mysqli_fetch_assoc($sql);
if(isset($update))
{
	mysqli_query($con,"update vendormst set Vendor_name='$name',Contact_Number=$contact,Comments='$comments' where Vendor_id='$id'");
	header('location:dashboard.php?option=vendors');
}
?>

<form method="post" enctype="multipart/form-data">
<table class="table table-bordered">
	<h1>Update Vendor Details</h1><hr>
	<tr>
		<th>Vendor id</th>
		<td><input type="text"  name="vendor_id" value="<?php echo $res['Vendor_id']; ?>"  class="form-control" readonly/>
		</td>
	</tr>
	<tr>
		<th>Vendor Name</th>
		<td><input type="text" name="name" value="<?php echo $res['Vendor_Name']; ?>" class="form-control"/>
		</td>
	</tr>
	<tr>
		<th>Contact Number</th>
		<td><input type="text" name="contact" value="<?php echo $res['Contact_Number']; ?>" class="form-control"/>
	</tr>
	<tr>
		<th>Comments</th>
		<td><textarea name="comments" class="form-control"><?php echo $res['Comments']; ?></textarea>
		</td>
	</tr>

	<tr>
		<td colspan="2">
			<input type="submit" class="btn btn-primary" value="Update Vendor" name="update"/>
		</td>
	</tr>
</table>
</form>
