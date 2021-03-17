<?php
include('connection.php');
$id=$_GET['id'];
extract($_REQUEST);
if(isset($sbfeedb)){

}
?>
<!DOCTYPE html>
<html lang="en">
<?php
  include('Menu Bar.php');
?>
<div class="container reg" style="width:40%">
  <form method="post">
    <h1 class="fw-normal">Provide Feedback</h1>
    <h4>Booking ID:</h4>
    <input type="text" class="form-control" name="booking_id" value="<?php echo $id; ?>" readonly>
    <h4>Feedback:</h4>
    <textarea class="form-control" name="feedback" placeholder="Enter Feedback" rows="4" autofocus required></textarea>
    <div class="text-center">
      <input type="submit" value="Submit Feedback" name="sbfeedb" class="btn btn-lg btn-success btn-group-justified"/>
    </div>
  </form>
</div>
<?php
    include('Footer.php')
?>
</body>
</html>
