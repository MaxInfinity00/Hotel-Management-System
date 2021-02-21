<script>
	function delService(id)
	{
		if(confirm("You want to delete this Service ?"))
		{
		window.location.href='delete_service.php?id='+id;
		}
	}
</script>

<table class="table table-bordered table-striped table-hover">
	<h1>Service Details</h1><hr>
	<tr>
	<td colspan="8"><a href="dashboard.php?option=add_services" class="btn btn-primary">Add New Services</a></td>
	</tr>
	<tr>
		<th>Service id</th>
		<th>Service</th>
		<th>Associated Supply</th>
		<th>Cost</th>
		<th>Update</th>
		<th>Delete</th>
	</tr>

<?php
$i=1;
$sql=mysqli_query($con,"select * from servicemst sv left join suppliesmst s on sv.supply_id=s.supply_id");
while($res=mysqli_fetch_assoc($sql))
{
?>
<tr>
		<td><?php echo $res['Service_id']; ?></td>
		<td><?php echo $res['Service_Name']; ?></td>
		<td><?php echo $res['Supply_Name']; ?></td>
		<td><?php echo $res['Cost']; ?></td>

		<td><a class="btn btn-primary" href="dashboard.php?option=update_service&id=<?php echo $res['Service_id']; ?>">Update Service</a></td>
		<td><a class="btn btn-danger" href="#" onclick="delService('<?php echo $res['Service_id']; ?>')">Delete Service</a></td>
	</tr>
<?php
}

?>
</table>
