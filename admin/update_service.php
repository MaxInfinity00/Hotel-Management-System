<?php
$id=$_GET['id'];
$sql=mysqli_query($con,"select * from suppliesmst where Supply_id='$id'");
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

	<tr>
		<th>Service id</th>
		<td><input type="text"  name="Service_id" value="<?php echo $res['Service_id']; ?>"  class="form-control" readonly/>
		</td>

		<tr>
			<th>Service Name</th>
			<td><input type="text" name="service_name" value="<?php echo $res['Supply_Name']; ?>" class="form-control"/>
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



	</tr>
		<tr>
			<th>Supply Name</th>
			</td>
		</tr>
	<tr>
		<th>Category</th>
		<td><select class="form-control" name="category" required>
			<option value="Cleaning" <?php if ($res['Category'] == "Cleaning") echo "selected";?>>Cleaning</option>
			<option value="tools" <?php if ($res['Category'] == "tools") echo "selected";?>>Tools</option>
			<option value="linens" <?php if ($res['Category'] == "linens") echo "selected";?>>Linens</option>
			<option value="toiletries" <?php if ($res['Category'] == "toiletries") echo "selected";?>>Toiletries</option>
			<option value="electrical" <?php if ($res['Category'] == "electrical") echo "selected'";?>>Electrical</option>
			<option value="statioery" <?php if ($res['Category'] == "stationery") echo "selected'";?>>Stationery</option>
			<option value="Snacks" <?php if ($res['Category'] == "Snacks") echo "selected'";?>>Snacks</option>
			<option value="others" <?php if ($res['Category'] == "others") echo "selected'";?>>Others</option>
		</select>
		</td>
	</tr>

	<tr>
		<th>Stock</th>
		<td>
			<input type="hidden" name="old_stock" value="<?php echo $res['Stock']; ?>" class="form-control"/>
			<input type="text" name="new_stock" value="<?php echo $res['Stock']; ?>" class="form-control"/>
		</td>
	</tr>

	<tr>
		<th>Last Restocked</th>
		<td>
			<input type="text" name="Last_restocked" value="<?php echo $res['Last_restocked']; ?>" class="form-control"/>
		</td>
	</tr>

	<tr>
		<th>Vendor</th>

		<td><select class="form-control" name="Vendor" required>
		<?php
		$vensql=mysqli_query($con,"select * from vendormst");
		while($ven=mysqli_fetch_assoc($vensql))
		{
			?>
			<option value="<?php echo $ven['Vendor_id']?>" <?php if ($res['Vendor_id'] == $ven['Vendor_id']) echo "selected";?>><?php echo $ven['Vendor_Name'] ?></option>
			<?php } ?>
		</select></td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="submit" class="btn btn-primary" value="Update Supply Details" name="update"/>
		</td>
	</tr>
</table>
</form>
