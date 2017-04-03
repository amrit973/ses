<!--http://placehold.it/500x300-->
<?php
session_start();
if(!isset($_SESSION['email']) or $_SESSION['admin']!='amrit973')
{
  header('Location:index.php');
}
include $_SERVER['DOCUMENT_ROOT'].'/ses/connect.php';
if(!isset($_SESSION['email']))
{
  header('Location:..');
}

if(isset($_POST['election'])and $_POST['election']=='start')
{
         $_SESSION['title'] = $_POST['title'];
         $_SESSION['date']= $_POST['date'];
         $_SESSION['election']='election';
         //echo "helo";
         header('Location:election.php');
         exit();
}

if(isset($_POST['action']) && $_POST['action']=='Delete candidate')
{
  $id = $_POST['id'];
  $query = "Delete from candidate where id= '$id'";
  $result =mysqli_query($connection,$query)or die('error deleting candidates');
  header('Location: '.$_SERVER['PHP_SELF'].'?newelection&candidates');
  exit();
}

if(isset($_POST['action']) && $_POST['action']=='Delete voter')
{
  $id = $_POST['id'];
  $query = "Delete from voters where id= '$id'";
  $result =mysqli_query($connection,$query)or die('error deleting candidates');
  header('Location: '.$_SERVER['PHP_SELF'].'?newelection&voters');
  exit();
}

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
      margin-top: 20px;
      text-align: center;}
     table,th
     {
      text-align: center;
     }
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
                                  Admin
                                       <b class="caret"></b>
                  </a>
                    <ul class="dropdown-menu">
                       <li><a href="adminLogout.php">Logout</a></li>
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
                        <a href="../admin.php"><i class="fa fa-user"></i> &nbsp;Profile</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-wrench"></i> &nbsp;Election</a>
                    </li>
                    <li>
                        <a href="../adminMail.php"><i class="fa fa-envelope"></i> &nbsp;Mail</a>
                    </li>
                    <li>
                        <a href="../calendarAdmin.php"><i class="fa fa-calendar"></i> &nbsp;Calendar</a>
                    </li>
            </ul>
</div><!--wrapper-->
    <div id="box">
     <div class="row">
     <?php
                  $query = 'select * from candidate';
                  $candidates = mysqli_query($connection,$query) or die ('Error querying candidate');
//list of voters
  $query = 'select * from voters';
  $voters = mysqli_query($connection,$query) or die ('Error querying candidate');
  include 'electionModule.php';
  if(isset($_GET['newelection']))
{
    include 'newElection.php';
}

if(isset($_GET['candidates']))
{
    $action='Delete candidate';
    $title='List of candidates';
    $array = $candidates;
    include 'list.php';
}

if(isset($_GET['voters']))
{
    $action='Delete voter';
    $title='List of voters';
    $array = $voters;
    include 'list.php';
}



if(isset($_GET['election']))
{
  include 'form.php';
}



if(isset($_GET['result']))
{
  $query = "select * from candidate";
  $result =mysqli_query($connection,$query)or die('error deleting candidates');
  include 'result.php';
}


     ?>
           </div><!--end of row-->
    </div><!--end of box-->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   </body>
</html>