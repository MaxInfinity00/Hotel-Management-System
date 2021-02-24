<?php
session_start();
error_reporting(1);
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
  <?php
      include('Menu Bar.php')
  ?>
<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
      <?php
    		$i=0;
    	  $sql=mysqli_query($con,"select * from slider");
    		while($slider=mysqli_fetch_assoc($sql)){
      ?>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="<?php echo $i; ?>"
          <?php
          	if($i==0){
              echo 'class="active"';
        		}
          ?>
          ></button>
      <?php
          $i++;
        }
      ?>
    </div>
    <div class="carousel-inner">
      <?php
    		$i=0;
    	  $sql=mysqli_query($con,"select * from slider");
    		while($slider=mysqli_fetch_assoc($sql))
    		{
    		$slider_img=$slider['image'];
    		$slider_cap=$slider['caption'];
    		$path="image/Slider/$slider_img";
		   ?>
      <div class="carousel-item <?php
    		if($i==0)
    		{
          echo active;
        }
      ?>">
        <img src="<?php echo $path; ?>" class="d-block w-100" alt="Image">
         <div class="carousel-caption d-none d-md-block">
      		<h5><?php echo $slider_cap; ?></h5>
      	</div>
      </div><?php $i++; } ?>
    </div>
    <button style="left: -50px;" class="carousel-control-prev" type="button" data-bs-target="#myCarousel"  data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button style="right: -50px;" class="carousel-control-next" type="button" data-bs-target="#myCarousel"  data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>
</div>

<div class="container-fluid check-avail">
<div class="container">
    <h3 style="margin:20px auto">Check Availability</h3>
  <div class="input-group input-group-lg mb-3">
      <select class="form-select" name="type" id="type" required>
        <?php
        $roomsql=mysqli_query($con,"select * from roomtypemst");
        while($room=mysqli_fetch_assoc($roomsql))
        {
          ?>
          <option value="<?php echo $room['Room_type_id']?>"><?php echo $room['Room_Name'] ?></option>
        <?php } ?>
      </select>
      <input class="form-control" type="text" onfocus="(this.type='date')" placeholder="Check in Date" name="checkin" id="checkin"/>
      <input class="form-control" type="text" placeholder="Check out Date" onfocus="(this.type='date')" name="checkout" id="checkout" />
      <input type="submit" class="btn btn-info" value="Check Availability" />
    </div>
</form>
</div>
</div>
<div class="home-info row">
  <div class="col-3">
    <img src="image/site images/sea_view.jpg" width="100%"/>
  </div>
  <div class="col-9 home-info-text">
    <h3>Incredible Sea View</h3>
    <p>
      Glorious views of the crystal-clear waters of the Arabian Sea come as standard in all of our five-star hotels and luxury villas. Alongside stunning seaside locations, effortlessly elegant interiors and impeccable service – including the assistance of our knowledgeable concierges – you can look forward to a stylish selection of destination bars and restaurants, luxury spas.
    </p>
  </div>
</div>
<div class="home-info row">
  <div class="col-3">
    <img src="image/site images/city_view.jpg" width="100%"/>
  </div>
  <div class="col-9 home-info-text">
    <h3>City Night Lights</h3>
    <p>Modernity and a rich Colonial heritage coexist in India’s city of dreams. Its illustrious past as one of the subcontinent’s prime hubs of trade lends it an infectious vibe that is inimitable. Get ready to be swept away by the infectious energy of this island city and its residents.</p>
  </div>
</div>
<div class="home-info row">
  <div class="col-3">
    <img src="image/site images/room.jpg" width="100%"/>
  </div>
  <div class="col-9 home-info-text">
    <h3>Amazing Rooms</h3>
    <p>Our suites of contemporary conference centres are both impressive and flexible. Plush interior design, swathes of natural sunlight and picture – perfect panoramas of the sea make them just as popular a choice for weddings and other tailor-made events as for business. Book your holiday or event with us – and check our special offers – to experience the very best the Arabian coast has to offer.</p>
  </div>
</div>
<div class="home-info row">
  <div class="col-3">
    <img src="image/site images/spa.jpg" width="100%"/>
  </div>
  <div class="col-9 home-info-text">
    <h3>Heavenly Spa</h3>
    <p>Enjoy a wide range of breath taking views of the Arabian sea at the The Bliss Hotel; Mumbai’s majestic masterpiece from a bygone era. Explore magnificent architectural structures with antique wooden furniture and a vast collection of marvellous art. The spa offers as a sanctuary in the midst of this metro and gives you a soothing blend of contemporary massages and aromatherapy for quick rejuvenation.</p>
  </div>
</div>
<!-- <div class="home-info row">
  <div class="col-3">
    <img src="image/site images/stand.jpg" width="100%"/>
  </div>
  <div class="col-9 home-info-text">
    <h3>Quality Services</h3>
    <p>Our suites of contemporary conference centres are both impressive and flexible. Plush interior design, swathes of natural sunlight and picture – perfect panoramas of the sea make them just as popular a choice for weddings and other tailor-made events as for business. Book your holiday or event with us – and check our special offers – to experience the very best the Arabian coast has to offer.</p>
  </div>
</div> -->
<div class="home-info row">
  <div class="col-3">
    <img src="image/site images/dine.jpg" width="100%"/>
  </div>
  <div class="col-9 home-info-text">
    <h3>Unique Dining Experience</h3>
    <p>Get access to some of the most renowned fine-dining restaurants in India when you stay at The Bliss. Discover tantalising Indian, Middle Eastern and Oriental cuisines, served with a dash of tradition and a sprinkling of innovation. With over nine dining options to choose from, you will definitely be spoilt for choice.</p>
  </div>
</div>
<?php
  include('Footer.php')
?>
</body>
</html>
