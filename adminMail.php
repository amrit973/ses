<!--http://placehold.it/500x300-->
<?php
session_start();
include 'connect.php';
if(!isset($_SESSION['email']) or $_SESSION['admin']!='amrit973')
{
  header('Location:index.php');
}
$email = $_SESSION['email'];
$query = "select * from admin where email ='$email'";
$result = mysqli_query($connection,$query)or die('error querying database');
$data = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width-device-width, initial-scale=1">
   <title>SES</title>
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="font/bootstrap-social.css">
   <link rel="stylesheet" type="text/css" href="fontawesome/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="styleAdmin.css">
   <style >
     #box{width: 70%;
      margin:0 auto;
      margin-top: 20px}

   </style>
 </head>
   <body>
    <div id="wrapper">
         <nav class="navbar navbar-inverse navbar-fixed-top navposition"><!--top menu-->

              <div class="navbar-header">
                 <button type="button" class="navbar-toggle" data-toggle="collapse"
                 data-target="#myNavbar">
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                 </button>
                <a class="navbar-brand">SES Admin</a>
              </div>
                <div class="collapse navbar-collapse" id="myNavbar">
             <ul class="nav navbar-nav pull-right">
               <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="glyphicon glyphicon-user"></span>
                                  Admin
                                       <b class="caret"></b>
                  </a>
                    <ul class="dropdown-menu">
                       <li><a href="adminLogout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
                    </ul>
               </li>
             </ul>
             </div>
          </nav><!--top menu-->
          <!--sidebar-->

            <ul class="nav navbar-nav side-nav">
                     <li class="active">
                        <a href="#"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="admin.php"><i class="fa fa-user"></i> &nbsp;Profile</a>
                    </li>
                    <li>
                        <a href="/ses/election"><i class="fa fa-wrench"></i> &nbsp;Election</a>
                    </li>
                    <li>
                        <a href="adminMail.php"><i class="fa fa-envelope"></i> &nbsp;Mail</a>
                    </li>
                    <li>
                        <a href="calendarAdmin.php"><i class="fa fa-calendar"></i> &nbsp;Calendar</a>
                    </li>
            </ul>
</div><!--wrapper-->
    <div id="box">
     <div class="row">
        <div class="col-md-7 col-md-offset-2 col-sm-7 col-sm-offset-2">

        <div class="row">
        <dic class="col-md-6">
        <?php
include 'connect.php';
$query = "select email from candidate";
$result1 = mysqli_query($connection,$query) or die("Error querying databse");
include 'mailList.php';
include 'voterMail.php';
?>

        </dic>
        <div class="col-md-6">
        <?php

if(isset($_GET['all']))
{
    include 'mailForm.php';
    $result = $result1;
}

if(isset($_GET['voters']))
{
    include 'mailForm.php';
    $result = $result2;
}

$check = False;

if( isset($_POST['message']))
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
?>
        </div>
     </div><!--end of row-->
    </div><!--end of box-->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   </body>
</html>