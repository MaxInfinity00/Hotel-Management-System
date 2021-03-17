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
    		while($slider=mysqli_fetch_assoc($sql)){
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
    <button style="width: 100px;" class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button style="width: 100px;" class="carousel-control-next" type="button" data-bs-target="#myCarousel"  data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>
