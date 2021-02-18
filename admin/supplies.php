<script>
	function delSupply(id)
	{
		if(confirm("You want to delete this Supply ?"))
		{
		window.location.href='delete_supply.php?id='+id;
		}
	}
</script>

<table class="table table-bordered table-striped table-hover">
	<h1>Supplies Details</h1><hr>
	<tr>
	<td colspan="8"><a href="dashboard.php?option=add_supplies" class="btn btn-primary">Add New Supplies</a></td>
	</tr>
	<tr>
		<th>Supply id</th>
		<th>Supply Name</th>
		<th>Category</th>
		<th>Stock</th>
		<th>Last Restocked</th>
		<th>Vendor Name</th>
		<th>Update</th>
		<th>Delete</th>
	</tr>

<?php
$i=1;
$sql=mysqli_query($con,"select * from suppliesmst s inner join vendormst v on v.vendor_id=s.vendor_id");
while($res=mysqli_fetch_assoc($sql))
{
?>
<form action="updateStock.php" method="post">

<tr>
		<td>
			<input type="hidden" name="Supply_id" value="<?php echo $res['Supply_id']; ?>" />
			<?php echo $res['Supply_id']; ?>
		</td>
		<td><?php echo $res['Supply_Name']; ?></td>
		<td><?php echo $res['Category']; ?></td>
		<td>
			<input type="hidden" name="old_stock" value="<?php echo $res['Stock']; ?>" />
			<input type="text" name="new_stock" value="<?php echo $res['Stock']; ?>" onChange="this.form.submit()">
		</td>
		<td>
			<input type="hidden" name="last_restocked" value="<?php echo $res['Last_restocked']; ?>" />
			<?php echo $res['Last_restocked']; ?>
		</td>
		<td><?php echo $res['Vendor_Name']; ?></td>

		<td><a href="dashboard.php?option=update_supply&id=<?php echo $res['Supply_id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
		<td><a href="#" onclick="delSupply('<?php echo $res['Supply_id']; ?>')"><span class="glyphicon glyphicon-remove" style='color:red'></span></a></td>
	</tr>
</form>
<?php
}

?>
</table>
