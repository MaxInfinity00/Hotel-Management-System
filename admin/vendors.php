
<table class="table table-bordered table-striped table-hover">
	<h1>Vendor Details</h1><hr>
	<tr>
		<td colspan="4"><a href="dashboard.php?option=add_vendor" class="btn btn-primary">Add Vendor</a></td>
	</tr>
	<tr>
		<th>id</th>
		<th>Vendor</th>
		<th>Contact</th>
		<th>Comments</th>
	</tr>

<?php
$i=1;
$sql=mysqli_query($con,"select * from vendormst");
while($res=mysqli_fetch_assoc($sql))
{
?>
<tr>
<td><?php echo $res['Vendor_id']; ?></td>
		<td><?php echo $res['Vendor_Name']; ?></td>
		<td><?php echo $res['Contact_Number']; ?></td>
		<td><?php echo $res['Comments']; ?></td>
	</tr>
<?php
}

?>
</table>
