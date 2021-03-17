<?php
session_start();
$_SESSION['logged_in']=$user_id;  
header('location:index.php');
?>
