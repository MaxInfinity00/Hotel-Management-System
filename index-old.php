<?php
session_start();
error_reporting(1);
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head><!--Head Open  Here-->
  <title>Bliss Hotel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
  <script src="https://kit.fontawesome.com/9d1fff1705.js" crossorigin="anonymous"></script>
  <!-- <link href="css/style.css"rel="stylesheet"/> -->
  <link href="css/custom.css"rel="stylesheet"/>
 <!-- <link href="css/mrstyle.css"rel="stylesheet"/> -->
 <!-- <link href="css/mrstyle2.css"rel="stylesheet"/> -->
 <!-- <link href="css/animate.css"rel="stylesheet"/> -->
</head> <!--Head Open  Here-->
<body>
  <?php
      include('Menu Bar.php')
  ?>

<div id="myCarousel" class="carousel slide" data-ride="carousel"> <!--Slider Image Start Here-->
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <?php
    		$i=0;
    	  $sql=mysqli_query($con,"select * from slider");
    		while($slider=mysqli_fetch_assoc($sql)){
      ?>
          <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>"
          <?php
          	if($i==0){
              echo 'class="active"';
        		}
          ?>
          ></li>
      <?php
          $i++;
        }
      ?>
    </ol>
    <!--Indicators Close Here-->

    <!-- Wrapper for slides -->

    <div class="carousel-inner" role="listbox">
      <?php
    		$i=0;
    	  $sql=mysqli_query($con,"select * from slider");
    		while($slider=mysqli_fetch_assoc($sql))
    		{
    		$slider_img=$slider['image'];
    		$slider_cap=$slider['caption'];
    		$path="image/Slider/$slider_img";
		   ?>
      <div class="item <?php
    		if($i==0)
    		{
          echo active;
        }
      ?>">
        <img src="<?php echo $path; ?>" alt="Image">
        <div class="carousel-caption">
    		<h2><?php echo $slider_cap; ?></h2>
    	</div>
    </div><?php $i++; } ?>


    </div>

    <!-- <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a> -->
    <!-- Left and right controls Close Here -->

</div> <!--Room Info Start Here-->

 <!-- <div class="container-fluid"id="red"> -->
   <!--Id Is Red-->
<!-- <div class="container text-center">
  <h1> <font color="#a6e22b;">Welcome To <b>Hotel Bliss</b></font></h1><hr><br>
  <div class="row">
    <div class="hov"> -->
      <!--Hov is Class-->


	<!-- <?php
	$sql=mysqli_query($con,"select * from rooms");
	while($r_res=mysqli_fetch_assoc($sql))
	{
	?>
	<div class="col-sm-4">
      <img src="image/rooms/<?php echo $r_res['image']; ?>"class="img-responsive thumbnail"alt="Image"id="img1"> -->
       <!--Id Is Img-->
      <!-- <h4 class="Room_Text">[ <?php echo $r_res['type']; ?>]</h4>
      <p class="text-justify"><?php echo substr($r_res['details'],0,100); ?></p><br>
	    <a href="room_details.php?room_id=<?php echo $r_res['room_id']; ?>" class="btn btn-danger text-center">Read more</a><br><br>
    </div>
	<?php } ?>
  </div>
  </div>
</div>
</div> -->

<?php
  include('Footer.php')
?>
</body>
</html>
