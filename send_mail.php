<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exceptione;
  require 'vendor/autoload.php';

function send_mail($to,$subject,$body){
  // $to = 'uditshroff00@gmail.com';
  // $subject = "This is subject";
  // $body = "THis is content";

  $mail= new PHPMailer(true);

  $mail->isSMTP();
  $mail->SMTPDebug = 0;
	$mail->CharSet = 'UTF-8';
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;

  $mail->Username = 'theblisshotels@gmail.com';
  $mail->Password = 'mypassword88';
  $mail->SMTPSecure = 'tls';
  $mail->Port = 587; //5465 or 4465 or 465

  $mail->setFrom('theblisshotels@gmail.com','The Bliss Hotel');
  $mail->addAddress($to);
  $mail->Subject = $subject;
  $mail->Body = $body;

  return($mail->send());
}
?>
