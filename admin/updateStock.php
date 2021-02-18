<?php
  $old_stock=$_POST["old_stock"];
  $new_stock=$_POST["new_stock"];
  include('../connection.php');
  $Last_restocked = $_POST["last_restocked"];
  if((int)$new_stock > (int)$old_stock){
    $Last_restocked = date('Y-m-d');
  }
  $Supply_id=$_POST["Supply_id"];
  mysqli_query($con,"update suppliesmst set Stock='$new_stock', Last_restocked='$Last_restocked' where Supply_id='$Supply_id' ");
  header('location:dashboard.php?option=supplies');
?>
