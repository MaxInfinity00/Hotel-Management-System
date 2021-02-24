<?php
$id=$_GET['id'];
$sql=mysqli_query($con,"select * from suppliesmst where Supply_id='$id'");
$res=mysqli_fetch_assoc($sql);

if(isset($update))
{
	if((int)$new_stock > (int)$old_stock){
		$Last_restocked = date('Y-m-d');
	}
mysqli_query($con,"update suppliesmst set Vendor_id='$Vendor',Supply_name='$supply_name',Stock='$new_stock', Last_restocked='$Last_restocked' where Supply_id='$supply_id' ");
header('location:dashboard.php?option=supplies');
}

?>

<form method="post" enctype="multipart/form-data">
<table class="table table-bordered">
	<h1>Update Supply Details</h1><hr>
	<tr>
		<th>Supply id</th>
		<td><input type="text"  name="supply_id" value="<?php echo $res['Supply_id']; ?>"  class="form-control" readonly/>
		</td>
	</tr>
		<tr>
			<th>Supply Name</th>
			<td><input type="text"  name="supply_name" value="<?php echo $res['Supply_Name']; ?>"  class="form-control"/>
			</td>
		</tr>
	<tr>
		<th>Category</th>
		<td><select class="form-select" name="category" required>
			<?php
			$result = mysqli_query($con,'SHOW COLUMNS FROM suppliesmst WHERE field="Category"');
			while ($row = mysqli_fetch_row($result)) {
				foreach(explode("','",substr($row[1],6,-2)) as $option) {
					$word = ucwords($option);
					if($res['Category'] == $option){
						print("<option value='$option' selected>$word</option>");
					}
					else{
					print("<option value='$option'>$word</option>");
					}
				}
			}
			?>
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

		<td><select class="form-select" name="Vendor" required>
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
