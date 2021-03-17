<!DOCTYPE html>
<html lang="en">
  <?php
include('send_mail.php');
include('Menu Bar.php');
include('hash.php');
if(isset($register)){
  $dob=date('Y-m-d',strtotime($dob));
  $phnerr = $passerr = $mailerr = "";
  $regex = '/^[^0-9][_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
  if($passw!=$repassw){
    $passerr.="Passwords do not match<br />";
  }
  if(strlen($passw)<8){
    $passerr.="Password length must be at least 8 characters<br />";
  }
  if (!(filter_var($email, FILTER_VALIDATE_EMAIL) and preg_match($regex, $email))) {
    $mailerr.= "Invalid Email Address<br />";
  }
  else if(mysqli_num_rows(mysqli_query($con,"select * from customermst where user_id = '$email' and status;"))){
    $mailerr.= "This email is already registered<br />";
  }
  if(strlen($contact)<10){
    $phnerr.="Improper contact number format<br />";
  }
  if($passerr == "" and $mailerr == "" and $phnerr == "") {
    $passw=passHasher($passw);
    $dob=date('Y-m-d',strtotime($dob));
    if(mysqli_query($con,"insert into loginmst values ('$email','$passw','Customer');") and mysqli_query($con,"insert into customermst values ('$email','$cust_name','$dob','$gender',+".$cntrycd.$contact.",'$address','$country',true);")){
      $subject="Welcome to Bliss";
      $body="Greetings,
Welcome to the World of Bliss.
Your Account has been successfully created and you can now login with your submitted credentials.
Have a wonderful day.

All the best,
The Bliss Hotels";
      send_mail($email,$subject,$body);
      $succ="Account Creation successful<br />";
    }
    else{
      printf("error: %s\n", mysqli_error($con));
    }
  }
}
?>
<div class="container reg">
  <form class="" action="" method="post">
    <div class="row">
      <h1 class="fw-normal">Customer Registration</h1>
      <div class="col-6">
        <div class="row">
          <div class="col-4">
            <label>Name: </label>
          </div>
          <div class="col-8">
            <input class="form-control" type="text" name="cust_name" required/>
          </div>
          <b class="text-center" style='color:red;margin:8px;'><?php echo $phnerr; ?></b>
          <div class="col-4">
            <label>Contact Number: </label>
          </div>
          <div class="col-8">
            <div class="row">
              <div class="col-4">
              <div class="input-group">
                <span class="input-group-text form-control">+</span>
                <input class="form-control" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" type="text" name="cntrycd" required/>
              </div>
              </div>
              <div class="col-8">
                <input class="form-control" type="tel" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" name="contact" required/>
              </div>
            </div>
          </div>
          <b class="text-center" style='color:red;margin:8px;'><?php echo $mailerr; ?></b>
          <div class="col-4">
            <label>Email: </label>
          </div>
          <div class="col-8">
            <input class="form-control" type="email" name="email" required/>
          </div>
          <b class="text-center" style='color:red;margin:8px;'><?php echo $passerr; ?></b>
          <div class="col-4">
            <label>Password: </label>
          </div>
          <div class="col-8">
            <input class="form-control" type="password" name="passw" autocomplete="new-password" required/>
          </div>
          <div class="col-4">
            <label>Retype Password: </label>
          </div>
          <div class="col-8">
            <input class="form-control" type="password" name="repassw" autocomplete="new-password" required/>
          </div>

        </div>
      </div>
      <div class="col-6">
        <div class="row">
          <div class="col-4">
            <label>Date of Birth: </label>
          </div>
          <div class="col-8">
            <input class="form-control" name="dob" type="date" max="<?php echo date('Y-m-d', strtotime($date .' -18 years')) ?>" required/>
          </div>
          <div class="col-4">
            <label>Address: </label>
          </div>
          <div class="col-8">
            <textarea class="form-control" name="address" required></textarea>
          </div>
          <div class="col-4">
            <label>Nationality: </label>
          </div>
          <div class="col-8">
            <select class="form-select" name="country" required>
              <option value="" selected hidden disabled>Select Country</option>
<?php
  $cntsql=mysqli_query($con,"select * from countries;");
  while($cnt=mysqli_fetch_assoc($cntsql)){
?>
              <option value=<?php echo $cnt['name']; ?>><?php echo $cnt['name']; ?></option>
<?php } ?>
            </select>
          </div>
          <div class="col-4">
            <label>Gender: </label>
          </div>
          <div class="col-8">
            <input type="radio" name="gender" value="Male" checked> Male</input><br>
            <input type="radio" name="gender" value="Female"> Female</input><br>
            <input type="radio" name="gender" value="Others"> Others</input>
          </div>

        </div>
      </div>
    </div>
    <div class="text-center">
    <b class="text-center" style='color:green;margin:8px;'><?php echo $succ."<br />"; ?></b>
      <input type="submit" value="Register" name="register" style="width:20%;font-size:25px" class="btn btn-lg btn-success btn-group-justified"/>
    </div>
  </form>
</div>
<?php
    include('Footer.php')
?>
</body>
</html>
