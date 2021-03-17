<?php

if(isset($add))
{
	$imgNew=basename($_FILES['img']['name']);

	$sql="insert into slider(image,caption) values('$imgNew','$cap')";

	if(mysqli_query($con,$sql))
	{
	move_uploaded_file($_FILES['img']['tmp_name'],"../image/Slider/".basename($_FILES['img']['name']));
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
	<h1>Add Slider Image</h1><hr>
	<tr>
		<th>Image</th>
		<td>
			<img id="displayImg" width="200" height="100">
			<input type="file" id="imageSelector" name="img" accept="image/*" class="form-control"/>
		</td>
	</tr>
	<tr>
		<th>Caption</th>
		<td><input type="text" name="cap" class="form-control"/></td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="submit" class="btn btn-primary" value="Add new Slider" name="add"/>
		</td>
	</tr>
</table>
</form>
