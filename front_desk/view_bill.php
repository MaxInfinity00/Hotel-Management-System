<?php
  $id=$_GET['id'];
  @$search_term=$_GET['search'];
  if(isset($search_btn)){
  	header('location:dashboard.php?option=view_bill&id=".$id."&search='.$search);
  }
?>
<script>
	function delBill(id){
		if(confirm("You want to delete this bill record?"))
		{
  		window.location.href='delete_bill.php?id='+id;
		}
	}
</script>
<table class="table table-bordered table-striped table-hover">
	<div class="table-head row">
		<div class="col-8">
			<h1>Bills</h1>
		</div>
		<div class="col-4 text-end">
			<div class="input-group mb-3">
				<form method="post" enctype="multipart/form-data">
				  <input type="text" name="search" class="form-control"  placeholder="Search..." autofocus>
					<button name="search_btn" class="btn btn-outline-info" type="submit"><i class="bi bi-search"></i></button>
				</form>
			</div>
		</div>
	</div><hr>
	<tr>
  <td colspan="7"><a class="btn btn-success" href="dashboard.php?option=add_bill&id=<?php echo $id; ?>">Add Bill</a></td>

	</tr>
  <tr>
         <th>Booking/Bill ID</th>
         <th>Room ID</th>
         <th>Item</th>
         <th>Quantity</th>
         <th>Price</th>
         <th>Subtotal</th>
         <th>Delete</th>
        </tr>
<?php
  $i=1;
  $res=mysqli_fetch_assoc(mysqli_query($con,"select *,datediff(check_out,check_in) no_of_days from bookingmst b inner join roommst r on b.room_id = r.room_id inner join roomtypemst rt on r.room_type=rt.room_type_id where Booking_id='".$id."'"));
  $grandtotal = $subtotal = $res['Room_tariff']*$res['no_of_days'];

?>
        <tr>
          <td><?php echo $res['Booking_id']; ?></td>
          <td><?php echo $res['Room_id']; ?></td>
          <td><?php echo $res['Room_Name']; ?></td>
          <td><?php echo $res['no_of_days']; ?></td>
          <td><?php echo $res['Room_tariff']; ?></td>
          <td><?php echo $subtotal; ?></td>
          <td></td>
        </tr>
<?php
  $sql=mysqli_query($con,"select * from billmst b inner join servicemst s on b.service_id=s.service_id where Booking_id='".$id."'");
  while($res=mysqli_fetch_assoc($sql)){
    $subtotal = $res['Quantity']*$res['Cost'];
    $grandtotal += $subtotal;
?>
        <tr>
          <td><?php echo $res['Bill_id']; ?></td>
          <td><?php echo $res['Room_id']; ?></td>
          <td><?php echo $res['Service_Name']; ?></td>
          <td><?php echo $res['Quantity']; ?></td>
          <td><?php echo $res['Cost']; ?></td>
          <td><?php echo $subtotal; ?></td>
          <td><a class="btn btn-danger" href="#" onclick="delBill('<?php echo $res['Bill_id']; ?>')">Delete Bill</a></td>
        </tr>
<?php } ?>
        <tr>
          <th colspan="5" class="text-end">Grand Total&nbsp;</th>
          <th colspan="2" class="text-start"><?php echo $grandtotal; ?></th>
        </tr>
        </table>
