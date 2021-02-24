<?php
$i=1;
$sql=mysqli_query($con,"select * from loginmst where user_id='$admin'");
while($res=mysqli_fetch_assoc($sql))
{
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bliss Hotel</title>
	<link href="https://fonts.googleapis.com/css?family=Baloo+Bhai" rel="stylesheet">
</head>
<body>
	<center><img src="../logo/new royal logo2.png" style="width:75%"></center>
	<!-- <div class="container"style="width:100%;">
	  <form action="/action_page.php">
	    <div class="form-group">
	      <label for="name">User id:</label>
	       <input type="text" id="username" value="<?php echo $res['User_id']; ?>" class="form-control" name="name" readonly="readonly"/>
	    </div>
	    <div class="form-group">
	      <label for="pwd">Password:</label>
	      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd"value="<?php echo $res['Hashed_Password']; ?>">
	    </div>
	  </form>
	</div> -->
<?php
}
?>
</body>
</html>
