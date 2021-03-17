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
	<div class="table-head row">
		<div class="col-4">
			<h1>Service Details</h1>
		</div>
		<div class="col-4">
			<div class="input-group mb-3">
				<form method="post" enctype="multipart/form-data">
					<input type="text" name="search" class="form-control"  placeholder="Search..." autofocus>
					<button name="search_btn" class="btn btn-outline-info" type="submit"><i class="bi bi-search"></i></button>
				</form>
			</div>
		</div>
		<div class="col-4 text-end">
<?php if ($active){ ?>
	<a class="btn btn-danger" href="dashboard.php?option=services&disabled=1">Disabled Services</a>
<?php }else{ ?>
			<a class="btn btn-success" href="dashboard.php?option=services&disabled=0">Active Services</a>
<?php } ?>
		</div>
	</div><hr>
	<tr>
		<th>Service id</th>
		<th>Service</th>
		<th>Associated Supply</th>
		<th>Cost</th>
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

	</tr>
<?php
}

?>
</table>
