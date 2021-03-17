<!DOCTYPE html>
<html lang="en">
<?php
  include('Menu Bar.php');
?>
<div class="jumbotron mx-5 text-center" style="margin-top:125px;
<?php
if($mailsent=="success"){
  ?>
background-color:#b3ffb3;color:green;">
  <h1>Check your Mail!</h1>
  <br />
  <p class="lead"><b>A password reset link has been sent to your mail.</b></p>
<?php } else if($mailsent=="failure"){ ?>
background-color:#ffb3b3;color:red">
    <h1>Oh no!</h1>
    <br />
    <p class="lead"><b>We encountered an error while send you a reset link.</b></p>
<?php } else if($reset=="success"){
  ?>
background-color:#b3ffb3;color:green;">
  <h1>Your password has been reset</h1>
  <br />
  <p class="lead"><b>You can now login to the website with your updated password.</b></p>
<?php } else{ ?>
background-color:#ffb3b3;color:red">
    <h1>Uh-Oh!</h1>
    <br />
    <p class="lead"><b>We encountered an error while updating your password.</b></p>
<?php } ?>
  </div>
<?php
  include('Footer.php');
?>
