<?php
@$search_term=$_GET['search'];
@$active=!(bool)$_GET['disabled'];
if(isset($search_btn)){
	header('location:dashboard.php?option=supplies&search='.$search.'&disabled='.!$active);
}
?>
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
	<div class="row">
		<div class="col-8">
			<h1>Supplies Details</h1>
		</div>
		<div class="col-4 text-end">
			<div class="input-group mb-3">
				<form method="post" enctype="multipart/form-data">
				  <input type="text" name="search" onchange="this.form.submit()" class="form-control"  placeholder="Search...">
					<button name="search_btn" class="btn btn-outline-info" type="submit"><i class="bi bi-search"></i></button>
				</form>
			</div>
<?php if ($active){ ?>
	<a class="btn btn-danger" href="dashboard.php?option=supplies&disabled=1">Disabled Supplies</a>
<?php }else{ ?>
			<a class="btn btn-success" href="dashboard.php?option=supplies&disabled=0">Active Supplies</a>
<?php } ?>
		</div>
	</div><hr>
	<tr>
	<td colspan="9"><a href="dashboard.php?option=add_supplies" class="btn btn-primary">Add New Supplies</a></td>
	</tr>
	<tr>
		<th>Supply id</th>
		<th>Supply Name</th>
		<th>Category</th>
		<th width="250">Stock</th>
		<th>Last Restocked</th>
		<th>Vendor Name</th>
		<th>Update</th>
<?php if ($active){ ?>
		<th>Disable</th>
<?php }else{ ?>
		<th>Enable</th>
		<th>Delete</th>
<?php } ?>

	</tr>

<?php
$sql=mysqli_query($con,"select * from suppliesmst s inner join vendormst v on v.vendor_id=s.vendor_id and s.Active_Status='$active' and (Supply_name like '%$search_term%' or Supply_id like '%$search_term%' or Category like '%$search_term%')");
while($res=mysqli_fetch_assoc($sql))
{
	$toggleurl="dashboard.php?option=toggle_supply&id=".$res['Supply_id']."&search=".$search_term."&disabled=".!$active;
?>
<form action="updateStock.php" method="post">

<tr>
		<td>
			<input type="hidden" name="Supply_id" value="<?php echo $res['Supply_id']; ?>" />
			<?php echo $res['Supply_id']; ?>
		</td>
		<td><?php echo $res['Supply_Name']; ?></td>
		<td><?php echo ucwords($res['Category']); ?></td>
		<td>
			<input type="hidden" name="old_stock" value="<?php echo $res['Stock']; ?>" />
			<div class="input-group input-group-sm">
				<a class="btn btn-danger" href="updateStock.php?op=m&val=10&id=<?php echo $res['Supply_id']; ?>" >-10</a>
				<a class="btn btn-danger" href="updateStock.php?op=m&val=1&id=<?php echo $res['Supply_id']; ?>" >-1</a>
				<input type="text" name="new_stock" value="<?php echo $res['Stock']; ?>" onChange="this.form.submit()" class="form-control">
				<a class="btn btn-success" href="updateStock.php?op=p&val=1&id=<?php echo $res['Supply_id']; ?>" >+1</a>
				<a class="btn btn-success" href="updateStock.php?op=p&val=10&id=<?php echo $res['Supply_id']; ?>" >+10</a>
			</div>
		</td>
		<td>
			<input type="hidden" name="last_restocked" value="<?php echo $res['Last_restocked']; ?>" />
			<?php echo $res['Last_restocked']; ?>
		</td>
		<td><?php echo $res['Vendor_Name']; ?></td>

		<td><a class="btn btn-primary" href="dashboard.php?option=update_supply&id=<?php echo $res['Supply_id']; ?>">Update Supply</a></td>
<?php if ($active){ ?>
		<td><a class="btn btn-danger" href="<?php echo $toggleurl; ?>">Disable Supply</a></td>
<?php }else{ ?>
		<td><a class="btn btn-success" href="<?php echo $toggleurl; ?>">Enable Supply</a></td>
		<td><a class="btn btn-danger" href="#" onclick="delSupply('<?php echo $res['Supply_id']; ?>')">Delete Supply</a></td>
<?php } ?>

	</tr>
</form>
<?php
}

?>
</table>
