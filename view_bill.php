<!DOCTYPE html>
<html lang="en">
<?php
  include('connection.php');
  include('Menu Bar.php');
  include('money_formatting.php');
  $id=$_GET['id'];
  extract($_REQUEST);
?>
<div class="container-fluid first-element" style="width:70%">
  <h1 class="text-center">Your Bill</h1><br>
  <div class="container">
    <div class="row">
      <table class="table table-striped table-bordered table-hover table-responsive"style="height:150px;">
       <tr>
        <th>Sr No.</th>
        <th>Item</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Subtotal</th>
       </tr>
<?php
  $i=1;
  $res=mysqli_fetch_assoc(mysqli_query($con,"select *,datediff(check_out,check_in) no_of_days from bookingmst b inner join roommst r on b.room_id = r.room_id inner join roomtypemst rt on r.room_type=rt.room_type_id where Booking_id='".$id."'"));
  $grandtotal = $subtotal = $res['Room_tariff']*$res['no_of_days'];

?>
        <tr>
      		<td><?php echo $i;$i++; ?></td>
          <td><?php echo $res['Room_Name']; ?></td>
          <td><?php echo $res['no_of_days']; ?></td>
          <td><?php echo moneyFormatIndia(substr($res['Room_tariff'],0,-3)).substr($res['Room_tariff'],-3); ?></td>
          <td><?php echo moneyFormatIndia($subtotal); ?></td>
        </tr>
<?php
  $sql=mysqli_query($con,"select * from billmst b inner join servicemst s on b.service_id=s.service_id where Booking_id='".$id."'");
  while($res=mysqli_fetch_assoc($sql)){
    $subtotal = $res['Quantity']*$res['Cost'];
    $grandtotal += $subtotal;
?>
        <tr>
          <td><?php echo $i;$i++; ?></td>
          <td><?php echo $res['Service_Name']; ?></td>
          <td><?php echo $res['Quantity']; ?></td>
          <td><?php echo moneyFormatIndia(substr($res['Cost'],0,-3)).substr($res['Cost'],-3); ?></td>
          <td><?php echo moneyFormatIndia($subtotal); ?></td>
        </tr>
<?php } ?>
        <tr>
          <th colspan="4" class="text-end">Grand Total&nbsp;</th>
          <th><?php echo moneyFormatIndia($grandtotal); ?></th>
        </tr>
        <tr>
          <!-- <th colspan="5" class="text-center"><a class="btn btn-success" href="payment.php?id=<?php echo $id ?>&amount=<?php echo $grandtotal ?>">Pay Bill</a></th> -->
          <th colspan="5" class="text-center"><a class="btn btn-success" href="https://www.paypal.com/in/home">Pay Bill</a></th>
        </tr>
        </table>
      </div>
    </div>
  </div>
<?php
  include('Footer.php')
?>
</body>
</html>
