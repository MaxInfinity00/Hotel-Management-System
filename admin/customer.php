
<table class="table table-bordered table-striped table-hover">
	<h1 >Customer Details</h1><hr>
	<tr>
		<th>Sr No</th>
		<th>Name</th>
		<th>Email</th>
		<th>Age</th>
		<th>Gender</th>
		<th>Contact Number</th>
		<th>Address</th>
		<th>Nationality</th>
	</tr>

<?php
$i=1;
$sql=mysqli_query($con,"select * from customermst where Status='Activated'");
while($res=mysqli_fetch_assoc($sql))
{
?>
<tr>
		<td><?php echo $i;$i++; ?></td>
		<td><?php echo $res['Customer_Name']; ?></td>
		<td><?php echo $res['User_id']; ?></td>
		<td><?php echo $res['Customer_Age']; ?></td>
		<td><?php echo $res['Gender']; ?></td>
		<td><?php echo $res['Contact_number']; ?></td>
		<td><?php echo $res['Address']; ?></td>
		<td><?php echo $res['Nationality']; ?></td>
	</tr>
<?php
}

?>
</table>
