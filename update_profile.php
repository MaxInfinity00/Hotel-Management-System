<!DOCTYPE html>
<html lang="en">
<?php
  include('Menu Bar.php');
  $sql= mysqli_query($con,"select * from customermst where user_id='$user_id'");
  $res=mysqli_fetch_assoc($sql);
  if(isset($register)){
    $dob=date('Y-m-d',strtotime($dob));
    $phnerr = $mailerr = "";
    $regex = '/^[^0-9][_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
    if($email==$user_id){
      if(mysqli_query($con,"update customermst set Customer_Name='$cust_name',DOB='$dob',Gender='$gender',Contact_number=$contact,Address='$address',Nationality='$country' where user_id='$user_id'")){
      }
    } else{
      if(true){
      } else if(mysqli_num_rows(mysqli_query($con,"select from loginmst where user_id='$email';"))){
        $mailerr="Email already registered";
      } else{
        mysqli_query($con,"insert into login mst values('$email','".$user['Hashed_Password']."');");
        mysqli_query($con,"insert into customermst values('$email','$cust_name','$dob','$gender',$contact,'$address','$country',true);");
        mysqli_query($con,"update bookingmst set user_id='$email' where user_id='$user_id';");
        mysqli_query($con,"delete from customermst where user_id='$user_id';");
        mysqli_query($con,"delete fromk loginmst where user_id='$user_id';");
        $_SESSION['logged_in']=$email;
      }
    }
  }
?>
<div class="container reg">
  <form class="" action="" method="post">
    <div class="row">
      <h1 class="fw-normal">Update Profile</h1>
      <div class="col-6">
        <div class="row">
          <div class="col-4">
            <label>Name: </label>
          </div>
          <div class="col-8">
            <input class="form-control" type="text" name="cust_name" value="<?php echo $res['Customer_Name']; required?>"/>
          </div>
          <div class="col-4">
            <label>Number: </label>
          </div>
          <div class="col-8">
            <div class="row">
              <div class="col-9">
                <input class="form-control" type="text" name="contact" value="<?php echo $res['Contact_number']; required?>"/>
              </div>
            </div>
          </div>
          <div class="col-4">
            <label>Email: </label>
          </div>
          <div class="col-8">
            <input class="form-control" type="email" name="email" value="<?php echo $res['User_id']; required?>"/>
          </div>
          <div class="col-4">
            <label>Date of Birth: </label>
          </div>
          <div class="col-8">
            <input class="form-control" name="dob" type="date"  value="<?php echo $res['DOB']; required?>"/>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="row">
          <div class="col-4">
            <label>Address: </label>
          </div>
          <div class="col-8">
            <textarea class="form-control" name="address"><?php echo $res['Address']; required?></textarea>
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
              <option value=<?php echo $cnt['name']; ?> <?php if ($res['Nationality'] == $cnt['name']) echo "selected";?>><?php echo $cnt['name']; ?></option>
<?php } ?>
            </select>
          </div>
          <div class="col-4">
            <label>Gender: </label>
          </div>
          <div class="col-8">
            <input type="radio" name="gender" value="Male" <?php if ($res['Gender'] == "Male") echo "checked";?>> Male</input><br>
            <input type="radio" name="gender" value="Female" <?php if ($res['Gender'] == "Female") echo "checked";?>> Female</input><br>
            <input type="radio" name="gender" value="Others" <?php if ($res['Gender'] == "Others") echo "checked";?>> Others</input>
          </div>
        </div>
      </div>
    </div>
    <div class="text-center">
      <input type="submit" value="Update" name="update" class="w-25 btn btn-lg btn-success btn-group-justified"/>
    </div>
  </form>
</div>
<?php
    include('Footer.php')
?>
</body>
</html>
