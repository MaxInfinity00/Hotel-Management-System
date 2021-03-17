<?php
$id=$_GET['id'];
include('Menu Bar.php');
include('connection.php');
if($user_id==""){
header('location:Login.php');
}
extract($_REQUEST);
if(isset($update)){
  header('location:bookings.php');
}
$sql=mysqli_query($con,"select * from bookingmst b inner join roommst r on b.room_id = r.room_id inner join roomtypemst rt on r.room_type=rt.room_type_id where Booking_id='$id'");
$res=mysqli_fetch_assoc($sql);
?>
<!DOCTYPE html>
<html lang="en">
<?php
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
      <h1 style="font-size:50px">Edit Booking</h1><br>
    </div>
    <div class="col-6">
      <form>
        <div class="row">
          <label for="booking_id" class="col-sm-3 col-form-labe">Booking ID:</label>
          <div class="col-sm-9">
            <input class="form-control" type="text" name="booking_id" id="booking_id" value="<?php echo $id; ?>" readonly required/>
          </div>
        </div>
        <div class="row">
          <label for="room" class="col-sm-3 col-form-labe">Room Type:</label>
          <div class="col-sm-9">
            <select class="form-select" name="type" id="room" required>
             <?php
               $roomsql=mysqli_query($con,"select * from roomtypemst");
               while($room=mysqli_fetch_assoc($roomsql))
               {
             ?>
                 <option value="<?php echo $room['Room_type_id']?>" <?php if($room['Room_type_id']==$res['Room_type_id']) echo selected; ?>><?php echo $room['Room_Name'] ?></option>
             <?php } ?>
            </select>
          </div>
        </div>
       <div class="row">
         <label for="checkin" class="col-sm-3 col-form-label">Check in:</label>
         <div class="col-sm-9">
           <input class="form-control" type="date" name="checkin" id="checkin" value="<?php echo date('Y-m-d',strtotime($res['Check_in'])); ?>" required/>
         </div>
       </div>
       <div class="row">
       <label for="checkout" class="col-sm-3 col-form-label">Check out:</label>
       <div class="col-sm-9">
       <input class="form-control" type="date" name="checkout" id="checkout" value="<?php echo date('Y-m-d',strtotime($res['Check_out'])); ?>"  required/>
        </div>
       </div>
         <div class="row">
         <label for="adults" class="col-sm-3 col-form-label">No. of Adults:</label>
         <div class="col-sm-9">
         <input class="form-control" type="number" min="1" name="adults" id="adults" value="<?php echo $res['No_of_Adults']; ?>"  required/>
       </div>
       </div>
         <div class="row">
         <label for="children" class="col-sm-3 col-form-label">No. of Children:</label>
         <div class="col-sm-9">
         <input class="form-control" type="number" min="0" name="children" id="children" value="<?php echo $res['No_of_children']; ?>" required/>
       </div>
       </div>
         <div class="row">
         <label for="additional" class="col-sm-3 col-form-label">Additional Requests:</label>
         <div class="col-sm-9">
         <textarea class="form-control" name="additional" id="additional"  placeholder="Any Additional Requests"> <?php echo $res['Comments']; ?></textarea>
       </div>
     </div><div class="text-center" style="margin:30px">
         <input type="submit" name="update" class="btn btn-info" value="Book Room" />
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
