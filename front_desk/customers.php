<?php
@$search_term=$_GET['search'];
@$active=!(bool)$_GET['disabled'];
if(isset($search_btn)){
	header('location:dashboard.php?option=customers&search='.$search.'&disabled='.!$active);
}
?>
<script type="text/javascript">
	function delCustomer(id){
		if(confirm("You want to delete this Customer and all its Bookings?")){
		window.location.href='delete_customer.php?id='+id;
		}
	}
</script>
<table class="table table-bordered table-striped table-hover">
	<div class="table-head row">
		<div class="col-4">
			<h1 >Customer Details</h1>
		</div>
		<div class="col-4">
			<div class="input-group mb-3 text-center">
				<form method="post" enctype="multipart/form-data">
					<input type="text" name="search" class="form-control"  placeholder="Search..." autofocus>
					<button name="search_btn" class="btn btn-outline-info" type="submit"><i class="bi bi-search"></i></button>
				</form>
			</div>
		</div>
		<div class="col-4 text-end">
<?php if ($active){ ?>
	<a class="btn btn-danger" href="dashboard.php?option=customers&disabled=1">Disabled Customers</a>
<?php }else{ ?>
			<a class="btn btn-success" href="dashboard.php?option=customers&disabled=0">Active Customers</a>
<?php } ?>
		</div>
	</div><hr>
	<tr>
		<td colspan="11"><a href="../Registration form.php" class="btn btn-success">Add Customer</a></td>
	</tr>
	<tr>
		<th>Sr No</th>
		<th>Name</th>
		<th>Email</th>
		<th>Date of Birth</th>
		<th>Gender</th>
		<th>Contact Number</th>
		<th>Address</th>
		<th>Nationality</th>
		<th>Edit</th>
<?php if ($active){ ?>
		<th>Disable</th>
<?php }else{ ?>
		<th>Enable</th>
		<th>Delete</th>
<?php } ?>
	</tr>

<?php
$i=1;
$sql=mysqli_query($con,"select * from customermst where Status='$active' and CONCAT_WS('',User_id,Customer_Name,Gender,Contact_number,Address,Nationality) like '%$search_term%'");
while($res=mysqli_fetch_assoc($sql))
{
	$toggleurl="dashboard.php?option=toggle_customer&id=".$res['User_id']."&search=".$search_term."&disabled=".!$active;
?>
<tr>
		<td><?php echo $i;$i++; ?></td>
		<td><?php echo $res['Customer_Name']; ?></td>
		<td><?php echo $res['User_id']; ?></td>
		<td><?php echo $res['DOB']; ?></td>
		<td><?php echo $res['Gender']; ?></td>
		<td><?php echo $res['Contact_number']; ?></td>
		<td><?php echo $res['Address']; ?></td>
		<td><?php echo $res['Nationality']; ?></td>
		<td><a class="btn btn-primary" href="dashboard.php?option=update_vendor&id=<?php echo $res['Vendor_id']; ?>">Update Vendor</a></td>
<?php if ($active){ ?>
		<td><a class="btn btn-danger" href="<?php echo $toggleurl; ?>">Disable Customer</a></td>
<?php }else{ ?>
		<td><a class="btn btn-success" href="<?php echo $toggleurl; ?>">Enable Customer</a></td>
		<td><a class="btn btn-danger" href="#" onclick="delCustomer('<?php echo $res['Vendor_id']; ?>')">Delete Customer</a></td>
<?php } ?>

	</tr>
<?php
}

?>
</table>
