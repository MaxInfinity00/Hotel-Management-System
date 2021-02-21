<?php
$id=$_GET['id'];
$sql=mysqli_query($con,"select * from servicemst where Service_id='$id'");
$res=mysqli_fetch_assoc($sql);

extract($_REQUEST);
if(isset($update))
{
	if(strcmp($new_stock,$old_stock) != 0){
		$Last_restocked = date('Y-m-d');
	}
mysqli_query($con,"update suppliesmst set Vendor_id='$Vendor',Supply_name='$supply_name',Stock='$new_stock', Last_restocked='$Last_restocked' where Supply_id='$supply_id' ");
header('location:dashboard.php?option=services');
}

?>

<form method="post" enctype="multipart/form-data">
<table class="table table-bordered">
	<h1>Update Service Details</h1><hr>
	<tr>
		<th>Service id</th>
		<td><input type="text"  name="Service_id" value="<?php echo $res['Service_id']; ?>"  class="form-control" readonly/>
		</td>

		<tr>
			<th>Service Name</th>
			<td><input type="text" name="service_name" value="<?php echo $res['Service_Name']; ?>" class="form-control"/>
			</td>
		</tr>

		<tr>
			<th>Associated Supply</th>
			<td><select class="form-control" name="Supply" required>
				<option value="null">No Supply</option>
				<?php
				$supsql=mysqli_query($con,"select * from suppliesmst");
				while($sup=mysqli_fetch_assoc($supsql))
				{
					?>
					<option value="<?php echo $sup['Supply_id']?>" <?php if($res['Supply_id']==$sup['Supply_id']) echo "selected" ?>><?php echo $sup['Supply_Name'] ?></option>
				<?php } ?>
			</select></td>
		</tr>

		<tr>
			<th>Cost</th>
			<td>
				<input type="text" name="cost" value="<?php echo $res['Cost']; ?>" class="form-control"/>
			</td>
		</tr>

	<tr>
		<td colspan="2">
			<input type="submit" class="btn btn-primary" value="Update Service Details" name="update"/>
		</td>
	</tr>
</table>
</form>
