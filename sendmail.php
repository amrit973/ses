<?php
$email=$_POST['email'];
$message = $_POST['message'];
$to = "amrit.973@gmail.com";
$subject = "user email";
$txt = $message;
$headers = "From: $email" . "\r\n" ;
echo $headers;
if(mail($to,$subject,$txt,$headers))
    echo 'email sent';
else
    echo 'failed';

?>