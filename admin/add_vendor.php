<?php
if(isset($add))
{
	$lastV=mysqli_query($con,"select vendor_id from vendormst order by vendor_id desc limit 1");
	$vno='V' . ((int)substr($lastV->fetch_object()->vendor_id,1)+1);
	$sql=mysqli_query($con,"select * from vendormst where vendor_id='$vno'");
	if(mysqli_num_rows($sql))
	{
	echo "this vendor id is already added";
	}
	else
	{
	mysqli_query($con,"insert into vendormst values('$vno','$name',$contact,'$comments')");
	header('location:dashboard.php?option=vendors');
	}
}
?>

<form method="post" enctype="multipart/form-data">
<table class="table table-bordered">
	<tr>
		<th>Vendor Name</th>
		<td><input type="text" name="name"  class="form-control"/>
		</td>
	</tr>
	<tr>
		<th>Contact Number</th>
		<td><input type="text" name="contact"  class="form-control"/>
	</tr>
	<tr>
		<th>Comments</th>
		<td><textarea name="comments"  class="form-control"></textarea>
		</td>
	</tr>

	<tr>
		<td colspan="2">
			<input type="submit" class="btn btn-primary" value="Add Vendor" name="add"/>
		</td>
	</tr>
</table>
</form>
