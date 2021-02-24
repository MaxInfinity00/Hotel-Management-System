<?php
if(isset($add)){
	$Last_restocked = date('Y-m-d');
	$lastS=mysqli_query($con,"select Supply_id from suppliesmst order by Supply_id desc limit 1");
	$sno='S' . ((int)substr($lastS->fetch_object()->Supply_id,1)+1);
	$sql=mysqli_query($con,"select * from suppliesmst where supply_id='$sno'");
	if(mysqli_num_rows($sql))
		echo "this Supply id is already added";
	else{
	mysqli_query($con,"insert into suppliesmst values('$sno','$Vendor','$supply_name','$category','$stock','$Last_restocked')");
	echo "Supply added successfully";
	}
}
?>
<form method="post" enctype="multipart/form-data">
<table class="table table-bordered">
	<h1>Add Supply Details</h1><hr>
	<tr>
		<th>Supply Name</th>
		<td><input type="text" name="supply_name" class="form-control"/>
		</td>
	</tr>
	<tr>
	<th>Category</th>
		<td>
			<select class="form-select" name="category" required>
			<?php
			$result = mysqli_query($con,'SHOW COLUMNS FROM suppliesmst WHERE field="Category"');
			while ($row = mysqli_fetch_row($result)) {
	      foreach(explode("','",substr($row[1],6,-2)) as $option) {
					$word = ucwords($option);
          print("<option value='$option'>$word</option>");
	      }
    	}
			?>
			</select>
		</td>
	</tr>

	<tr>
		<th>Stock</th>
		<td>
			<input type="text" name="stock" class="form-control"/>
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
			<option value="<?php echo $ven['Vendor_id']?>"><?php echo $ven['Vendor_Name'] ?></option>
		<?php } ?>
		</select></td>
	</tr>

	<tr>
		<td colspan="2">
			<input type="submit" class="btn btn-primary" value="Add Supply" name="add"/>
		</td>
	</tr>
</table>
</form>
