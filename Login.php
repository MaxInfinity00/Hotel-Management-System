<?php
session_start();
error_reporting(1);
if($_SESSION['logged_in']!="")
{
header('location:Booking Form.php');
}
error_reporting(1);
require('connection.php');
extract($_REQUEST);
$regex = '/^[^0-9][_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
include('hash.php');
if(isset($login))
{
  if($user_id=="" || $passw==""){
    $error= "Fill all details";
  } else{
    $passw = passHasher($passw);
    if(mysqli_num_rows(mysqli_query($con,"select * from loginmst where user_id='$user_id' && Hashed_Password='$passw' and Account_type='Admin'"))){
      $_SESSION['admin_logged_in']=$user_id;
      header('location:admin/dashboard.php');
    } else if(mysqli_num_rows(mysqli_query($con,"select * from loginmst where user_id='$user_id' && Hashed_Password='$passw' and Account_type='FDM'"))){
      $_SESSION['fdm_logged_in']=$user_id;
      header('location:front_desk/dashboard.php');
    } else if(filter_var($user_id, FILTER_VALIDATE_EMAIL) and preg_match($regex, $user_id)){
        if(mysqli_num_rows(mysqli_query($con,"select * from loginmst l inner join customermst c on l.user_id=c.user_id where l.user_id='$user_id' && Hashed_Password='$passw' and Account_type='Customer' and Status"))){
          $_SESSION['logged_in']=$user_id;
          header('location:Booking Form.php');
        } else{
          printf("error: %s\n", mysqli_error($con));
          $error= "Invalid login details";
        }
    }else{
      $error= "Invalid Email Address";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
include('Menu Bar.php')
?>
<div class="container login-form text-center">
  <form method="post">
    <!-- <img class="mb-4" src="logo/tb-crop.png" width="55" height="60"> -->
    <img class="mb-4" src="logo/tb-logo.svg" width="55" height="60">
    <h1 class="h3 fw-normal">Please Login</h1>
    <h5 style='color:red'><?php echo $error ?></h5>
    <h6 style="text-align: left">Email address:</h6>
    <input type="text" class="form-control" name="user_id" required autofocus>
    <h6 style="text-align: left">Password:</h6>
    <input type="password" class="form-control" name="passw" required>
    <input type="submit" class="w-100 btn btn-lg btn-success" name="login" value="Login">
  </form>
  <div class="forget">
    <a href="Forgot account.php">Forgot Account</a>&nbsp; <b>|</b>&nbsp;
    <a href="Registation form.php">Create an Account</a>
  </div>
</div>
<?php
include('Footer.php')
?>
</body>
</html>
