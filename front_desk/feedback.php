<?php
@$search_term=$_GET['search'];
if(isset($search_btn)){
	header('location:dashboard.php?option=feedback&search='.$search);
}
?>
<script>
	function delFeedback(id)
	{
		if(confirm("You want to delete this Feedback ?"))
		{
		window.location.href='delete_feedback.php?id='+id;
		}
	}
</script>
<table class="table table-bordered table-striped table-hover">
	<div class="table-head row">
		<div class="col-8">
			<h1>Feedback</h1>
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
		<th>Sr No</th>
		<th>User</th>
		<th>Booking</th>
		<th>Message</th>
		<th>Delete</th>
	</tr>
<?php
$i=1;
$sql=mysqli_query($con,"select b.user_id, f.*  from bookingmst b inner join feedbackmst f on b.booking_id=f.booking_id where CONCAT_WS('',user_id,f.Booking_id,Feedback) like '%$search_term%';");
while($res=mysqli_fetch_assoc($sql)){
?>
	<tr>
		<td><?php echo $i;$i++; ?></td>
		<td><?php echo $res['user_id']; ?></td>
		<td><?php echo $res['Booking_id']; ?></td>
		<td><?php echo $res['Feedback']; ?></td>
		<td><a class="btn btn-danger" href="#"onclick="delFeedback('<?php echo $id; ?>')">Delete Feedback</a></td>
	</tr>
<?php
}
?>

</table>
