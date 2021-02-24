<?php

if(isset($add))
{
  $lastR=mysqli_query($con,"select room_type_id from roomtypemst order by room_type_id desc limit 1");
	$rno='RM' . ((int)substr($lastR->fetch_object()->room_type_id,2)+1);
	$sql=mysqli_query($con,"select * from roomtypemst where room_type_id='$rno'");
	$imgNew=basename($_FILES['img']['name']);

  printf("error: %s\n", $rno);
	$sql="insert into roomtypemst values('$rno','$name','$imgNew','$deets')";

	if(mysqli_query($con,$sql))
	{
	move_uploaded_file($_FILES['img']['tmp_name'],"../image/rooms/".basename($_FILES['img']['name']));
	header('location:dashboard.php?option=room_types');
	}
printf("error: %s\n", mysqli_error($con));
}
?>
<script type="text/javascript">
$(function(){
	$('#imageSelector').change(function(event){
    $("#displayImg").attr('src',URL.createObjectURL(event.target.files[0]));
	});
});
</script>
<form method="post" enctype="multipart/form-data">
<table class="table table-bordered">
	<h1>Add Room Type</h1><hr>
	<tr>
		<th>Room Name</th>
		<td><input type="text" name="name" class="form-control"/></td>
	</tr>
	<tr>
		<th>Image</th>
		<td>
			<img id="displayImg" width="200" height="100">
			<input type="file" id="imageSelector" name="img" accept="image/*" class="form-control"/>
		</td>
	</tr>
	<tr>
		<th>Details</th>
		<td><textarea name="deets" class="form-control"/></textarea></td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="submit" class="btn btn-primary" value="Add Room Type" name="add"/>
		</td>
	</tr>
</table>
</form>
