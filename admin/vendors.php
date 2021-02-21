<script>
	function delVendor(id)
	{
		if(confirm("You want to delete this Vendor?"))
		{
		window.location.href='delete_vendor.php?id='+id;
		}
	}
</script>
<table class="table table-bordered table-striped table-hover">
	<h1>Vendor Details</h1><hr>
	<tr>
		<td colspan="6"><a href="dashboard.php?option=add_vendor" class="btn btn-primary">Add Vendor</a></td>
	</tr>
	<tr>
		<th>id</th>
		<th>Vendor</th>
		<th>Contact</th>
		<th>Comments</th>
		<th>Update</th>
		<th>Delete</th>
	</tr>
<?php
$i=1;
$sql=mysqli_query($con,"select * from vendormst");
while($res=mysqli_fetch_assoc($sql)){
?>
	<tr>
		<td><?php echo $res['Vendor_id']; ?></td>
		<td><?php echo $res['Vendor_Name']; ?></td>
		<td><?php echo $res['Contact_Number']; ?></td>
		<td><?php echo $res['Comments']; ?></td>
		<td><a class="btn btn-primary" href="dashboard.php?option=update_vendor&id=<?php echo $res['Vendor_id']; ?>">Update Vendor</a></td>
		<td><a class="btn btn-danger" href="#" onclick="delVendor('<?php echo $res['Vendor_id']; ?>')">Delete Vendor</a></td>
	</tr>
<?php
}

?>
</table>
