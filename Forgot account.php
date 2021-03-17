<!DOCTYPE html>
<html lang="en">
<?php
include('send_mail.php');
include('Menu Bar.php');
function randomKeyGen(){
  $str_source = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
  $randomkey = '';
  foreach(range(1, 50) as $number){
    $randomkey.=substr(str_shuffle($str_source),0,1);
  }
  return $randomkey;
}

$regex = '/^[^0-9][_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
$error='';
if(isset($reset)){
  if (!(filter_var($email, FILTER_VALIDATE_EMAIL) and preg_match($regex, $email))) {
    $error.= "Invalid Email Address<br />";
  } else if(!mysqli_num_rows(mysqli_query($con,"select * from customermst where user_id = '".$email."';"))){
      $error.= "This email is not registered<br />";
  } else{
    $randkey = randomKeyGen();
    $subject="Reset your password";
    $body="Hello,
You can reset your Bliss Hotel account password by clicking the link below:
http://localhost/Hotel_management_system/account_recovery.php?key=$randkey
If you didn't request a password reset, feel free to delete this email!

All the best,
The Bliss Hotels";
    if(mysqli_query($con,"insert into accrecovery values ('$randkey','$email');")){
      if(send_mail($email,$subject,$body)){
        $mailsucc = "success";
      } else{
        $mailsucc = "failure";
      }
      header('location:resetinfo.php?mailsent='.$mailsucc);
    } else{
      printf("error: %s\n", mysqli_error($con));
    }
  }
}
?>
<div class="container login-form text-center">
  <form method="post">
    <img class="mb-4" src="logo/tb-logo.svg" width="55" height="60">
    <h1 class="h3 fw-normal">Account Recovery</h1>
    <h5 style='color:red'><?php echo $error ?></h5>
    <h6 style="text-align:left;margin:30px auto;">Email address:</h6>
    <input style="margin:30px auto;" type="text" class="form-control" name="email" />
    <input type="submit" class="btn btn-success " name="reset" value="Reset Password"/>
  </form>
</div>

<?php
include('Footer.php')
?>
</body>
</html>
