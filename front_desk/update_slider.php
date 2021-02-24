<?php
$id=$_GET['id'];
$sql=mysqli_query($con,"select * from slider where id='$id' ");
$res=mysqli_fetch_assoc($sql);


if(isset($update))
{
	$imgNew=$_FILES['img']['name'];
	if($imgNew=="")
	{
	$sql="update slider set caption='$cap' where id='$id' ";
	}
	else
	{
	$sql="update slider set caption='$cap',image='$imgNew' where id='$id' ";
	unlink("../image/Slider/".$res['image']);
	move_uploaded_file($_FILES['img']['tmp_name'],"../image/Slider/".$_FILES['img']['name']);
	}
	if(mysqli_query($con,$sql))
	{
	header('location:dashboard.php?option=slider');
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
	<h1>Update Slider Image</h1><hr>
	<tr>
		<th>Image</th>
		<td>
			<img id="displayImg" src="<?php echo '../image/Slider/'.$res['image'] ?>" width="200" height="100">
			<input type="file" id="imageSelector" name="img" accept="image/*" class="form-control"/>
		</td>
	</tr>
	<tr style="height:40">
		<th>Caption</th>
		<td><input type="text" name="cap" value="<?php echo $res['caption']; ?>" class="form-control"/></td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="submit" class="btn btn-primary" value="Update" name="update"/>
		</td>
	</tr>
</table>
</form>
