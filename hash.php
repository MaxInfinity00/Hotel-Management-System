<?php
function passHasher($pass){
  return hash('md5',$pass,false);
}
 ?>
