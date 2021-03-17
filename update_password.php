<!DOCTYPE html>
<html lang="en">
<?php
include('Menu Bar.php');
include('hash.php');
if(isset($update)){
  $error=$succ="";
  $user = mysqli_fetch_assoc(mysqli_query($con,"select * from loginmst where user_id='$user_id';"));
  if(passHasher($curr_passw)!=$user['Hashed_Password']){
    $error.="Incorrect Password<br />";
  }
  if($new_passw!=$re_new_passw){
    $error.="New passwords do not match<br />";
  }
  if(strlen($new_passw)<8){
    $error.="New password length must be at least 8 characters<br />";
  }
  if($error==""){
    $new_passw=passHasher($new_passw);
    if(mysqli_query($con,"update loginmst set Hashed_Password='$new_passw' where user_id='$user_id'")){
      $succ="Password updated successfully";
    }
    else{
      printf("%s\n",mysqli_error($con));
    }
  }
}
?>
<div class="container login-form text-center">
  <form method="post">
    <img class="mb-4" src="logo/tb-logo.svg" width="55" height="60">
    <h1 class="h3 fw-normal">Password Update</h1>
    <h5 style='color:red'><?php echo $error; ?></h5>
    <h5 style='color:green'><?php echo $succ; ?></h5>
    <h6 style="text-align:left;">Current Password:</h6>
    <input  type="password" class="form-control" name="curr_passw" required />
    <h6 style="text-align:left;">New Password:</h6>
    <input type="password" class="form-control" name="new_passw" required />
    <h6 style="text-align:left;">Retype Password:</h6>
    <input type="password" class="form-control" name="re_new_passw" />
    <input type="submit" class="btn btn-success " name="update" value="Update Password" required/>
  </form>
</div>

<?php
include('Footer.php')
?>
</body>
</html>
