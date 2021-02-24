<?php
$id=$_GET['id'];
$sql=mysqli_query($con,"select * from roomtypemst where Room_type_id='$id'");
$res=mysqli_fetch_assoc($sql);

if(isset($update))
{
	$imgNew=$_FILES['img']['name'];
	if($imgNew=="")
	{
  	$sql="update roomtypemst set Room_Name='$name',Room_desc='$deets' where room_type_id='$id' ";
	}
	else
	{
  	$sql="update roomtypemst set Room_name='$name',image='$imgNew',Room_desc='$deets' where room_type_id='$id' ";
  	unlink("../image/rooms/".$res['Image']);
	}
	if(mysqli_query($con,$sql))
	{
    move_uploaded_file($_FILES['img']['tmp_name'],"../image/rooms/".$_FILES['img']['name']);
  	header('location:dashboard.php?option=room_types');
	}
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
	<h1>Update Room Type</h1><hr>
	<tr>
		<th>Room Name</th>
		<td><input type="text" name="id" class="form-control" value="<?php echo $res['Room_type_id']; ?>" readonly/></td>
	</tr>
	<tr>
		<th>Room Name</th>
		<td><input type="text" name="name" class="form-control" value="<?php echo $res['Room_Name'] ?>"/></td>
	</tr>
	<tr>
		<th>Image</th>
		<td>
			<img id="displayImg" src="<?php echo '../image/rooms/'.$res['Image'] ?>" width="200" height="100">
			<input type="file" id="imageSelector" name="img" accept="image/*" class="form-control"/>
		</td>
	</tr>
	<tr>
		<th>Details</th>
		<td><textarea name="deets" class="form-control"/><?php echo $res['Room_desc'] ?></textarea></td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="submit" class="btn btn-primary" value="Update Room Type" name="update"/>
		</td>
	</tr>
</table>
</form>
