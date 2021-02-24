<?php
@$search_term=$_GET['search'];
@$active=!(bool)$_GET['disabled'];
if(isset($search_btn)){
	header('location:dashboard.php?option=services&search='.$search.'&disabled='.!$active);
}
?>
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
	<div class="row">
		<div class="col-8">
			<h1>Service Details</h1>
		</div>
		<div class="col-4 text-end">
			<div class="input-group mb-3">
				<form method="post" enctype="multipart/form-data">
				  <input type="text" name="search" onchange="this.form.submit()" class="form-control"  placeholder="Search...">
					<button name="search_btn" class="btn btn-outline-info" type="submit"><i class="bi bi-search"></i></button>
				</form>
			</div>
<?php if ($active){ ?>
	<a class="btn btn-danger" href="dashboard.php?option=services&disabled=1">Disabled Services</a>
<?php }else{ ?>
			<a class="btn btn-success" href="dashboard.php?option=services&disabled=0">Active Services</a>
<?php } ?>
		</div>
	</div><hr>
	<tr>
	<td colspan="8"><a href="dashboard.php?option=add_services" class="btn btn-primary">Add New Services</a></td>
	</tr>
	<tr>
		<th>Service id</th>
		<th>Service</th>
		<th>Associated Supply</th>
		<th>Cost</th>
		<th>Update</th>
<?php if ($active){ ?>
	<th>Disable</th>
<?php }else{ ?>
	<th>Enable</th>
	<th>Delete</th>
<?php } ?>
	</tr>

<?php
$i=1;
$sql=mysqli_query($con,"select * from servicemst sv left join suppliesmst s on sv.supply_id=s.supply_id where sv.Active_Status='$active' and (service_name like '%$search_term%' or service_id like '%$search_term%')");
while($res=mysqli_fetch_assoc($sql))
{
	$toggleurl="dashboard.php?option=toggle_service&id=".$res['Service_id']."&search=".$search_term."&disabled=".!$active;
?>
<tr>
		<td><?php echo $res['Service_id']; ?></td>
		<td><?php echo $res['Service_Name']; ?></td>
		<td><?php echo $res['Supply_Name']; ?></td>
		<td><?php echo $res['Cost']; ?></td>

		<td><a class="btn btn-primary" href="dashboard.php?option=update_service&id=<?php echo $res['Service_id']; ?>">Update Service</a></td>
<?php if ($active){ ?>
	<td><a class="btn btn-danger" href="<?php echo $toggleurl; ?>">Disable Service</a></td>
<?php }else{ ?>
	<td><a class="btn btn-success" href="<?php echo $toggleurl; ?>">Enable Service</a></td>
	<td><a class="btn btn-danger" href="#" onclick="delService('<?php echo $res['Service_id']; ?>')">Delete Service</a></td>
<?php } ?>
	</tr>
<?php
}

?>
</table>
