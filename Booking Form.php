<?php
include('Menu Bar.php');
include('connection.php');
if($eid=="")
{
header('location:Login.php');
}
$sql= mysqli_query($con,"select * from customermst where email='$eid' ");
$result=mysqli_fetch_assoc($sql);
//print_r($result);
extract($_REQUEST);
error_reporting(1);
if(isset($savedata))
{
  $sql= mysqli_query($con,"select * from room_booking_details where email='$email' and room_type='$room_type' ");
  if(mysqli_num_rows($sql))
  {
  $msg= "<h1 style='color:red'>You have already booked this room</h1>";
  }
  else
  {

   $sql="insert into room_booking_details(name,email,phone,address,city,state,zip,contry,room_type,check_in_date,check_in_time,check_out_date,Occupancy)
  values('$name','$email','$phone','$address','$city','$state',1234,'$country',
  '$room_type','$cdate','$ctime','$codate','$Occupancy')";
   if(mysqli_query($con,$sql))
   {
   $msg= "<h1 style='color:blue'>You have Successfully booked this room</h1><h2><a href='order.php'>View </a></h2>";
   }
   else{
     $msg="<h1>Error booking room$name','$email','$phone','$address','$city','$state',1234,'$country',
     '$room_type','$cdate','$ctime','$codate','$Occupancy</h1>";
   }

  }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
  include('Menu Bar.php');
?>
<div class="container-fluid check-avail booking">
<div class="container">
  <div class="row">
    <div class="col-6">
      <h1 style="font-size:50px">Booking Form</h1><br>
    </div>
    <div class="col-6">
      <form>
        <div class="row">
          <label for="checkin" class="col-sm-3 col-form-labe">Room Type:</label>
          <div class="col-sm-9">
            <select class="form-select" name="type" id="type" required>
             <?php
               $roomsql=mysqli_query($con,"select * from roomtypemst");
               while($room=mysqli_fetch_assoc($roomsql))
               {
             ?>
                 <option value="<?php echo $room['Room_type_id']?>"><?php echo $room['Room_Name'] ?></option>
             <?php } ?>
            </select>
          </div>
        </div>
       <div class="row">
         <label for="checkin" class="col-sm-3 col-form-label">Check in:</label>
         <div class="col-sm-9">
           <input class="form-control" type="datetime-local" name="checkin" id="checkin"/>
         </div>
       </div>
       <div class="row">
       <label for="checkout" class="col-sm-3 col-form-label">Check out:</label>
       <div class="col-sm-9">
       <input class="form-control" type="datetime-local" name="checkout" id="checkout"/>
        </div>
       </div>
         <div class="row">
         <label for="adults" class="col-sm-3 col-form-label">No. of Adults:</label>
         <div class="col-sm-9">
         <input class="form-control" type="text" name="adults" id="adults" />
       </div>
       </div>
         <div class="row">
         <label for="children" class="col-sm-3 col-form-label">No. of Children:</label>
         <div class="col-sm-9">
         <input class="form-control" type="text" name="children" id="children" />
       </div>
       </div>
         <div class="row">
         <label for="additional" class="col-sm-3 col-form-label">Additional Requests:</label>
         <div class="col-sm-9">
         <textarea class="form-control" name="additional" id="additional" ></textarea>
       </div>
     </div><div class="text-center" style="margin:30px">
         <input type="submit" class="btn btn-info" value="Book Room" />
       </div>
     </form>
    </div>
  </div>
</div>
</div>

<?php
include('Footer.php')
?>
</body>
</html>
