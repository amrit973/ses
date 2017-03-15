<?php
include 'connect.php';
$query = "select email from candidate";
$result = mysqli_query($connection,$query) or die("Error querying databse");
include 'mailList.php';

if(isset($_GET['all']))
{
    include 'mailForm.php';
}

$check = False;

if(isset($_POST['email']) and isset($_POST['message']))
{

    foreach($result as $list )
    {

             require_once("PHPMailer-master/PHPMailerAutoload.php");
             $mail = new PHPMailer();
             $address = htmlspecialchars($_POST['email'],ENT_QUOTES,'UTF-8');;
             $message = htmlspecialchars($_POST['message'],ENT_QUOTES,'UTF-8');;
             $mail->IsSMTP();
             $email= $list['email'];
             $mail->Host = "smtp.gmail.com";  // specify main and backup server
             $mail->SMTPAuth = true;     // turn on SMTP authentication
             $mail->Username = "amrituuu999@gmail.com";  // SMTP username
             $mail->Password = "insanepain"; // SMTP password
             $emaill="amrituuu999@gmail.com";
             $mail->From = $emaill;
             $mail->FromName = "ses";
             $mail->AddAddress($email);
             $mail->WordWrap = 50;
             $mail->IsHTML(true);
             $mail->Subject = "User Query";
             $mail->Body .="<p>{$message}</p>";
             if(!$mail->Send())
                      {
                         echo "Message could not be sent. <p>";
                        echo "Mailer Error: " . $mail->ErrorInfo;
                        exit;
                      }
              $check = true;
    }
    if($check)
    {
        echo 'Your Message has been sent';
    }
}
