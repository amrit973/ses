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
                 <div class="panel panel-warning">
                       <div class="panel-heading">Admin Profile</div>
                       <div class="panel-body">
                           <div class="row">
                            <?php
                                           foreach ($result as $desc)
                                           {
                                             ?>
                               <div class="col-md-3 col-sm-3 col-xs-3">
                              <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $desc['images'] ).'" class="img-responsive"/>';?><br>
                               </div>
                               <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9">
                                  <table class="table table-hover table-responsive">

                                                     <tbody>
                                               <tr>
                                                    <td>NAME :</td>
                                                    <td><?php echo $desc['name'];?></td>
                                               </tr>
                                               <tr>
                                                    <td>GENDER :</td>
                                                    <td><?php echo $desc['gender'];?></td>
                                               </tr>
                                               <tr>
                                                    <td>AGE :</td>
                                                    <td><?php echo $desc['age'];?></td>
                                               </tr>
                                               <tr>
                                                    <td>ADDRESS :</td>
                                                    <td><?php echo $desc['address'];?></td>
                                               </tr>
                                               <tr>
                                                    <td>PIN :</td>
                                                    <td><?php echo $desc['pin'];?></td>
                                               </tr>
                                               <tr>
                                                    <td>EMAIL :</td>
                                                    <td><?php echo $desc['email'];?></td>
                                               </tr>
                                               <tr>
                                                    <td>MOBILE NO. :</td>
                                                    <td><?php echo $desc['mobile'];?></td>
                                               </tr>
                                               <tr>
                                                    <td>AADHAR :</td>
                                                    <td><?php echo $desc['aadhar'];?></td>
                                               </tr>
                                         </tbody>
                                            <?php
                                           }
                                         ?>
                                  </table>
                                  </div>
                           </div>
                       </div>
                 </div>
            </div>
     </div><!--end of row-->
    </div><!--end of box-->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   </body>
</html>