<?php
session_start();
error_reporting(1);
require('../connection.php');
extract($_REQUEST);
if(isset($login))
{
	if($userid=="" || $pass=="")
	{
	$error= "<h3 style='color:red'>fill all details</h3>";
	}
	else
	{
	$sql=mysqli_query($con,"select * from loginmst where user_id='$userid' && hashed_password='$pass' && Account_type='Admin' ");
		if(mysqli_num_rows($sql))
		{
		$_SESSION['admin_logged_in']=$userid;
		header('location:dashboard.php');
		}
		else
		{
		$error= "<h3 style='color:red'>Invalid login details</h3>";
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<?php
include('Menu Bar.php');
	?>
<div style="margin:100px;background-color:#dce8f3;" class="container-fluid"> <!-- Primary Id-->
  <div class="container">
    <div class="row"><br>
      <div class="col-sm-4"></div>
		<div class="col-sm-4 text-center"style="box-shadow:2px 2px 2px;background-color:#990707;">

			<h1 align="center"><b><font style="font-family: 'Libre Baskerville', serif;text-shadow:5px 5px #000;">Admin Login ?</font></b></h1>

          <img src="../image/clipart/user.png"alt="Bird" width="200" height="170"style="padding-top:30px;">

			<?php echo @$error;?>
          <form action="#" method="post"><br>
              <div class="form-group">
                <input type="text" class="form-control"name="userid" placeholder="Email Id"required>
              </div>
            <div class="form-group">
                <input type="Password" class="form-control"name="pass" placeholder="Password"required>
            </div>
          <input type="submit" value="Login" name="login" class="btn btn-primary btn-group btn-group-justified"required>
      	</form><br>
        </div>
    </div><br>
  </div>
</div>
<?php
include('Footer.php');
?>
</body>
</html>
