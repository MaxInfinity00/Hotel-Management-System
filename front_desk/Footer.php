<?php
include('connection.php');
extract($_REQUEST);
if(isset($send))
{
mysqli_query($con,"insert into feedback values('','$n','$e','$mob','$msg')");
$msg= "<h4 style='color:green;'>feedback sent successfully</h4>";
}
?>
<!-- Footer1 Start Here-->
<!--
<footer style="background-color: #e9eeee;">
    <div class="container-fluid">
	<div class="col-sm-4 hov">
    <p class="text-justify">A hotel is an establishment that provides paid lodging on a short-term basis. Facilities provided may range from a modest-quality mattress in a small room to large suites with bigger, higher-quality beds, a dresser, a refrigerator and other kitchen facilities, upholstered chairs, a flat screen television, and en-suite bathrooms. Small, lower-priced hotels may offer only the most basic guest services and facilities. Larger, higher-priced hotels may provide additional guest facilities such as a swimming pool, business center</p><br>
      <center><a href="../about.php" class="btn btn-danger"><b>Read More..</b></a></center><br><br><br>
 <?php
  //include('Social ican.php')
?>
	</div>&nbsp;&nbsp;
	<div class="col-sm-4 text-justify">
	       <h3 style="color:#cdd51f;">Contact Us</h3>
      <p style="color:white;"><strong>Address:&nbsp;</strong>Sector,59 Mamura Chowk,Noida</p>
      <p style="color:white;"><strong>Email-Id:&nbsp;</strong>hotal@gmail.com</p>
      <p style="color:white;"><strong>Contact Us:&nbsp;</strong>(+91) 7275308190</p><br><br><br>
     <center><img src="devlop/Bliss_Logo.png"class="img-responsive"></center>
	</div>&nbsp;

  <!--Feedback Start Here-->
	<!-- <div class="col-sm-4 text-center">
      <div class="panel panel-primary">
        <div class="panel-heading">Feedback</div>
          <div class="panel-body">
            <?php echo @$msg; ?>
      <div class="feedback">
      <form method="post"><br>
        <div class="form-group">
          <input type="text" name="n" class="form-control" id="#"placeholder="Enter Your Name"required>
        </div>
        <div class="form-group">
          <input type="Email" name="e" class="form-control" id="#"placeholder="Email"required>
        </div>
        <div class="form-group">
          <input type="Number" name="mob" class="form-control" id="#"placeholder="Mobile Number"required>
        </div>
        <div class="form-group">
          <textarea type="Text" name="msg" class="form-control" id="#"placeholder="Type Your Massage"required></textarea>
        </div>
          <input type="submit" value="send" name="send" class="btn btn-primary btn-group-justified"required>
      </form>
        </div>
       </div>
      </div>
    </div> -->

    <!--Feedback Panel Close here-->

  <!-- </div>
</footer> --> -->
<!--Footer1 Close Here-->

<!--Footer2 start Here-->

<footer class="container-fluid text-center"style="background-color:#000408;height:40px;padding-top:10px;color:#f0f0f0;">
  <p>All Rights Reserved <?php echo date("Y");?></p>
</footer>

<!--Footer2 start Here-->
