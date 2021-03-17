<!DOCTYPE html>
<html lang="en">
<?php
include('Menu Bar.php');
include('connection.php');
function BookingIDGen(){
  $init_source = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"
  $str_source = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  $id = '';
  $id.=substr(str_shuffle($init_source),0,1);
  $id.=substr(str_shuffle($init_source),0,1);
  foreach(range(1, 10) as $number){
    $id.=substr(str_shuffle($str_source),0,1);
  }
  return $id;
}
if($user_id==""){
  header('location:Login.php');
}
@$room_type_id=$_GET['room_type_id'];
if(isset($book)){
  $bookerr="";
  if($checkin>$checkout){
    $bookerr.="Invalid Check in/Check out date<br />";
  } else{
    $roomsql=mysqli_query($con,"select * from roommst where room_type='$type';");
    $available = false;
    while($rooms=mysqli_fetch_assoc($roomsql) and !$available){
      if(mysqli_num_rows(mysqli_query($con,"select * from bookingmst where room_id = ".$rooms['Room_id']." and not((check_in > '$checkout' and check_out > '$checkout') or (check_in < '$checkin' and check_out < '$checkin'));"))){
        $bookres="Rooms not available";
        $rescolor="red";
      } else{
        $book_id=BookingIDGen();
        if(mysqliquery($con,"insert into bookingmst values('$book_id','".$rooms['Room_id']."','$user_id','".date('Y-m-d')."','$checkin','$checkout',$adults,$children,'$additional',true);"))
          $rescolor="green";
          $bookres="Booking Successful!";
          $available=true;
          //mail code
        }
      }
    }
  }
}
if(isset($book)){}
// if(isset($savedata))
// {
//   $sql= mysqli_query($con,"select * from room_booking_details where email='$email' and room_type='$room_type' ");
//   if(mysqli_num_rows($sql))
//   {
//   $msg= "<h1 style='color:red'>You have already booked this room</h1>";
//   }
//   else
//   {
//
//    $sql="insert into room_booking_details(name,email,phone,address,city,state,zip,contry,room_type,check_in_date,check_in_time,check_out_date,Occupancy)
//   values('$name','$email','$phone','$address','$city','$state',1234,'$country',
//   '$room_type','$cdate','$ctime','$codate','$Occupancy')";
//    if(mysqli_query($con,$sql))
//    {
//    $msg= "<h1 style='color:blue'>You have Successfully booked this room</h1><h2><a href='order.php'>View </a></h2>";
//    }
//    else{
//      $msg="<h1>Error booking room$name','$email','$phone','$address','$city','$state',1234,'$country',
//      '$room_type','$cdate','$ctime','$codate','$Occupancy</h1>";
//    }
//
//   }
// }
?>
<style>
  body{
    padding: 0;
  }
</style>
<div class="container-fluid check-avail booking">
<div class="container">
  <div class="row mt-1">
    <div class="col-6">
      <h1 style="font-size:50px">Booking Form</h1><br>
    </div>
    <div class="col-6">
      <form>
        <div class="row">
          <label for="room" class="col-sm-3 col-form-labe">Room Type:</label>
          <div class="col-sm-9">
            <select class="form-select" name="type" id="type" required>
             <?php
               $roomsql=mysqli_query($con,"select * from roomtypemst");
               while($room=mysqli_fetch_assoc($roomsql))
               {
             ?>
                 <option value="<?php echo $room['Room_type_id']?>" <?php if($room_type_id==$room['Room_type_id'] or $book_type==$room['Room_type_id']) echo selected; ?>><?php echo $room['Room_Name'] ?></option>
             <?php } ?>
            </select>
          </div>
        </div>
       <div class="row">
         <label for="checkin" class="col-sm-3 col-form-label">Check in:</label>
         <div class="col-sm-9">
           <input class="form-control" type="date" name="checkin" id="checkin" value="<?php echo $book_checkin; ?>" required/>
         </div>
       </div>
       <div class="row">
         <label for="checkout" class="col-sm-3 col-form-label">Check out:</label>
         <div class="col-sm-9">
           <input class="form-control" type="date" name="checkout" id="checkout" value="<?php echo $book_checkout; ?>" required/>
        </div>
       </div>
       <div class="row">
         <label for="adults" class="col-sm-3 col-form-label">No. of Adults:</label>
         <div class="col-sm-9">
             <input class="form-control" type="number" min="1" name="adults" id="adults" required />
         </div>
       </div>
       <div class="row">
         <label for="children" class="col-sm-3 col-form-label">No. of Children:</label>
         <div class="col-sm-9">
           <input class="form-control" type="number" min="0" name="children" id="children" required />
         </div>
       </div>
       <div class="row">
         <label for="additional" class="col-sm-3 col-form-label">Additional Requests:</label>
         <div class="col-sm-9">
           <textarea class="form-control" name="additional" id="additional" rows="3" placeholder="Any Additional Requests"></textarea>
         </div>
       </div>
       <div class="text-center" style="margin:30px">
         <input type="submit" name="book" class="btn btn-info" value="Book Room" />
       </div>
     </form>
   </div>
  </div>
</div>
</div>

<?php
include('Footer.php');
?>
</body>
</html>
