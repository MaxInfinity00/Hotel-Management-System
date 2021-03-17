<?php
  include('../connection.php');
  $op=$_GET['op'];
  $val=$_GET['val'];
  $id=$_GET['id'];
  if(strlen($op) > 0){
    $sql=mysqli_query($con,"select * from suppliesmst s inner join vendormst v on v.vendor_id=s.vendor_id where supply_id='$id'");
    $res=mysqli_fetch_assoc($sql);
    $stock=$res['Stock'];
    if($op == 'p'){
      $Last_restocked = date('Y-m-d');
      echo $stock." ".$val;
      $stock+=$val;
      echo $stock." ".$val;
      mysqli_query($con,"update suppliesmst set Stock='$stock', Last_restocked='$Last_restocked' where Supply_id='$id' ");
    }
    else if ($op == 'm'){
    echo $stock." ".$val;
      $stock-=$val;
      echo $stock." ".$val;
      mysqli_query($con,"update suppliesmst set Stock='$stock' where Supply_id='$id' ");
    }
    printf("error: %s\n", mysqli_error($con));
  }
  else{
    $old_stock=$_POST["old_stock"];
    $new_stock=$_POST["new_stock"];
    $Last_restocked = $_POST["last_restocked"];
    if((int)$new_stock > (int)$old_stock){
      $Last_restocked = date('Y-m-d');
    }
    $Supply_id=$_POST["Supply_id"];
    mysqli_query($con,"update suppliesmst set Stock='$new_stock', Last_restocked='$Last_restocked' where Supply_id='$Supply_id' ");
  }
  header('location:dashboard.php?option=supplies');
?>
