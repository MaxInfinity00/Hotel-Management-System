<?php
session_start();
error_reporting(1);
include('connection.php');
$user_id=$_SESSION['logged_in'];
extract($_REQUEST);
?>
<!DOCTYPE html>
<html lang="en">
<script>
  function delProfile(user_id){
    if(confirm("You want to delete your costumer profile?")){
  		window.location.href='delete_profile.php?id='+user_id;
		}
  }
</script>
<?php
  include('Menu Bar.php');
?>
<?php
   $sql= mysqli_query($con,"select * from customermst where user_id='$user_id'");
   $res=mysqli_fetch_assoc($sql);
?>
<div class="container reg profile">
    <div class="row">
      <div class="col-6">
        <h1 class="fw-normal">Profile</h1>
      </div>
      <span class="col-6 justify-content-around">
        <a class="btn btn-success" href="update_profile.php">Update Profile</a>
        <a class="btn btn-success" href="update_password.php">Update Password</a>
        <a class="btn btn-danger" href="#" onclick="delProfile('<?php echo $user_id; ?>')">Delete Profile</a>
      </span>
      <div class="col-6">
        <div class="row">
          <div class="col-4">
            <label>Name: </label>
          </div>
          <div class="col-8">
            <label><?php echo $res['Customer_Name'] ?></label>
          </div>
          <div class="col-4">
            <label>Number: </label>
          </div>
          <div class="col-8">
            <label><?php echo $res['Contact_number'] ?></label>
          </div>
          <div class="col-4">
            <label>Email: </label>
          </div>
          <div class="col-8">
            <label><?php echo $res['User_id'] ?></label>
          </div>
          <div class="col-4">
            <label>Date of Birth: </label>
          </div>
          <div class="col-8">
            <label><?php echo $res['DOB'] ?></label>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="row">
          <div class="col-4">
            <label>Address: </label>
          </div>
          <div class="col-8">
            <label><?php echo $res['Address'] ?></label>
          </div>
          <div class="col-4">
            <label>Nationality: </label>
          </div>
          <div class="col-8">
            <label><?php echo $res['Nationality'] ?></label>
          </div>
          <div class="col-4">
            <label>Gender: </label>
          </div>
          <div class="col-8">
            <label><?php echo $res['Gender'] ?></label>
          </div>
        </div>
      </div>
    </div>
</div>
<?php
include('Footer.php')
?>
</body>
</html>
