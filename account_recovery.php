<!DOCTYPE html>
<html lang="en">
<?php
include('Menu Bar.php');
include('hash.php');
$error='';
if(isset($reset)){
  $error="";
  if($passw!=$repassw){
    $error.="Passwords do not match<br />";
  }
  if(strlen($passw)<8){
    $error.="Password length must be at least 8 characters<br />";
  }
  if($error==""){
    $user=mysqli_fetch_assoc(mysqli_query($con,"select * from accrecovery where randomkey='$key';"));
    if(mysqli_query($con,"update loginmst set Hashed_Password='".passHasher($passw)."' where user_id='".$user['user_id']."';")){
      $resetsucc = "success";
      mysqli_query($con,"delete from accrecovery where randomkey='$key';");
        header('location:resetinfo.php?reset='.$resetsucc);
    } else{
      $resetsucc = "failure";
      printf("error: %s\n", mysqli_error($con));
    }
  }
}
if(mysqli_num_rows(mysqli_query($con,"select * from accrecovery where randomkey='$key'"))){
?>
<div class="container login-form text-center">
  <form method="post">
    <img class="mb-4" src="logo/tb-logo.svg" width="55" height="60">
    <h1 class="h3 fw-normal">Account Recovery</h1>
    <h5 style='color:red'><?php echo $error; ?></h5>
    <h6 style="text-align:left;">New Password:</h6>
    <input type="password" class="form-control" name="passw" required autocomplete="new-password"/>
    <h6 style="text-align:left;">Retype Password:</h6>
    <input type="password" class="form-control" name="repassw" required autocomplete="new-password"/>
    <input type="submit" class="btn btn-success " name="reset" value="Reset Password" required/>
  </form>
</div>
<?php } else { ?>
  <div class="jumbotron mx-5 ps-5" style="margin-top:125px">
    <h1>Invalid URL</h1>
    <br />
    <p class="lead"><b>The url submitted either doesn't exist, or has expired.</b></p>
 </div>
<?php
}
include('Footer.php')
?>
</body>
</html>
