<?php
if(isset($add)){
	$Last_restocked = date('Y-m-d');
	$lastSV=mysqli_query($con,"select Service_id from servicemst order by Service_id desc limit 1");
	$svno='SV' . ((int)substr($lastSV->fetch_object()->Service_id,2)+1);
	$sql=mysqli_query($con,"select * from servicemst where service_id='$svno'");
	if(mysqli_num_rows($sql))
		echo "this Service id is already added";
	else{
		if($Supply == "null"){
			mysqli_query($con,"insert into servicemst(Service_id,Service_Name,Cost) values('$svno','$service_name','$cost')");
				}
		else{
			mysqli_query($con,"insert into servicemst values('$svno','$Supply','$service_name','$cost')");
		}
	echo "Service added successfully";
}
	}
?>

<form method="post" enctype="multipart/form-data">
<table class="table table-bordered">
	<h1>Add Service Details</h1><hr>
	<tr>
		<th>Service Name</th>
		<td><input type="text" name="service_name" class="form-control"/>
		</td>
	</tr>

	<tr>
		<th>Associated Supply</th>
		<td><select class="form-select" name="Supply" required>
			<option value="null">No Supply</option>
			<?php
			$supsql=mysqli_query($con,"select * from suppliesmst");
			while($sup=mysqli_fetch_assoc($supsql))
			{
				?>
				<option value="<?php echo $sup['Supply_id']?>"><?php echo $sup['Supply_Name'] ?></option>
			<?php } ?>
		</select></td>
	</tr>

	<tr>
		<th>Cost</th>
		<td>
			<input type="text" name="cost" class="form-control"/>
		</td>
	</tr>

	<tr>
		<td colspan="2">
			<input type="submit" class="btn btn-primary" value="Add Service" name="add"/>
		</td>
	</tr>
</table>
</form>
