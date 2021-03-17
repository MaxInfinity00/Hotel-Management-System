<?php
$error="";
if(isset($add))
{
	if(strlen($contact)<10){
		$error.="Improper contact number format<br />";
	}
	if($error==""){
		$lastV=mysqli_query($con,"select vendor_id from vendormst order by vendor_id desc limit 1");
		$vno='V' . ((int)substr($lastV->fetch_object()->vendor_id,1)+1);
		$sql=mysqli_query($con,"select * from vendormst where vendor_id='$vno'");
		if(mysqli_num_rows($sql)){
			echo "this vendor id is already added";
		}
		else{
			mysqli_query($con,"insert into vendormst values('$vno','$name',$contact,'$comments',true)");
			header('location:dashboard.php?option=vendors');
		}
	}
}
?>

<form method="post" enctype="multipart/form-data">
<table class="table table-bordered">
	<h1>Add Vendor Details</h1><hr>
	<tr>
		<th>Vendor Name</th>
		<td><input type="text" name="name"  class="form-control" autocomplete="off" required/>
		</td>
	</tr>
	<tr>
		<th>Contact Number</th>
		<td>
	    <b class="text-center" style='color:red;'><?php echo $error; ?></b>
			<input type="text" name="contact"  class="form-control" autocomplete="off" required/>
		</td>
	</tr>
	<tr>
		<th>Comments</th>
		<td>
			<textarea name="comments"  class="form-control"></textarea>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="submit" class="btn btn-primary" value="Add Vendor" name="add"/>
		</td>
	</tr>
</table>
</form>
