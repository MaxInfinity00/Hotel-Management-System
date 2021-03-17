<?php
@$search_term=$_GET['search'];
@$active=!(bool)$_GET['disabled'];
if(isset($search_btn)){
	header('location:dashboard.php?option=vendors&search='.$search.'&disabled='.!$active);
}
?>
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
	<div class="table-head row">
			<div class="col-4">
				<h1>Vendor Details</h1>
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
	<a class="btn btn-danger" href="dashboard.php?option=vendors&disabled=1">Disabled Vendors</a>
<?php }else{ ?>
			<a class="btn btn-success" href="dashboard.php?option=vendors&disabled=0">Active Vendors</a>
<?php } ?>
		</div>
	</div><hr>
	<tr>
		<td colspan="7"><a href="dashboard.php?option=add_vendor" class="btn btn-success">Add Vendor</a></td>
	</tr>
	<tr>
		<th>id</th>
		<th>Vendor</th>
		<th>Contact</th>
		<th>Comments</th>
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
$sql=mysqli_query($con,"select * from vendormst where Active_Status='$active' and (Vendor_name like '%$search_term%' or Vendor_id like '%$search_term%' or Comments like '%$search_term%')");
while($res=mysqli_fetch_assoc($sql)){
	$toggleurl="dashboard.php?option=toggle_vendor&id=".$res['Vendor_id']."&search=".$search_term."&disabled=".!$active;
?>
	<tr>
		<td><?php echo $res['Vendor_id']; ?></td>
		<td><?php echo $res['Vendor_Name']; ?></td>
		<td><?php echo $res['Contact_Number']; ?></td>
		<td><?php echo $res['Comments']; ?></td>
		<td><a class="btn btn-primary" href="dashboard.php?option=update_vendor&id=<?php echo $res['Vendor_id']; ?>">Update Vendor</a></td>
<?php if ($active){ ?>
		<td><a class="btn btn-danger" href="<?php echo $toggleurl; ?>">Disable Vendor</a></td>
<?php }else{ ?>
		<td><a class="btn btn-success" href="<?php echo $toggleurl; ?>">Enable Vendor</a></td>
		<td><a class="btn btn-danger" href="#" onclick="delVendor('<?php echo $res['Vendor_id']; ?>')">Delete Vendor</a></td>
<?php } ?>

	</tr>
<?php
}

?>
</table>
