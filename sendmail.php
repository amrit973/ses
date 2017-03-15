<?php
if($_POST['email']!='' and $_POST['message']!='')
{
require("PHPMailer-master/PHPMailerAutoload.php");
$mail = new PHPMailer();
$address = htmlspecialchars($_POST['email'],ENT_QUOTES,'UTF-8');;
$message = htmlspecialchars($_POST['message'],ENT_QUOTES,'UTF-8');;
// set mailer to use SMTP
$mail->IsSMTP();
$email= 'amrit.973@gmail.com';

// As this email.php script lives on the same server as our email server
// we are setting the HOST to localhost
$mail->Host = "smtp.gmail.com";  // specify main and backup server

$mail->SMTPAuth = true;     // turn on SMTP authentication

// When sending email using PHPMailer, you need to send from a valid email address
// In this case, we setup a test email account with the following credentials:
// email: send_from_PHPMailer@bradm.inmotiontesting.com
// pass: password
$mail->Username = "amrituuu999@gmail.com";  // SMTP username
$mail->Password = "insanepain"; // SMTP password

// $email is the user's email address the specified
// on our contact us page. We set this variable at
// the top of this page with:
// $email = $_REQUEST['email'] ;
$emaill="amrituuu999@gmail.com";
$mail->From = $emaill;
$mail->FromName = "ses";

// below we want to set the email address we will be sending our email to.
$mail->AddAddress($email);

// set word wrap to 50 characters
$mail->WordWrap = 50;
// set email format to HTML
$mail->IsHTML(true);

$mail->Subject = "User Query";

// $mail->Body  is the user's message they typed in
// on our contact us page. We set this variable at
// the top of this page with:
// $mail->Body  = $_REQUEST['message'] ;

$mail->Body .="<p>email: {$address}</p>";
$mail->Body .="<p>{$message}</p>";

if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}

echo "Your Message has been sent";
}

else
{
echo 'Please enter valid email and message';
}
?>