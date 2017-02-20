<?php
session_start();
include 'connect.php';
$email = $_POST['email'];
$password = $_POST['password'];

 $query = "select * from candidate where email='$email' and password='$password'";
    $result = mysqli_query($connection,$query)or die ('unable to query databse');
    $data = mysqli_fetch_array($result);
    if($data==0&& !isset($_SESSION["email"]))
    header("Location:index.php");


?>
<!DOCTYPE html>
 <?php include 'head2.php';?>
   <body>
   <?php include 'navbar2.php';?>
   <div class="container">
       <div class="row main2">
            <div class="col-md-7 col-md-offset-2 col-sm-7 col-sm-offset-2">
                 <div class="panel panel-danger">
                       <div class="panel-heading">Candidate Details</div>
                       <div class="panel-body">
                           <div class="row">
                               <div class="col-md-3 col-sm-3 col-xs-3">
                          <img src="show.php" align="center" class="img-responsive"><br>
                              <img src="http://placehold.it/300x300" class="img-responsive" align="center">
                               </div>
                               <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9">
                                  <table class="table table-hover table-responsive">

                                    <?php

                                    if(isset($email)and isset($password))
                                    {
                                      $_SESSION["email"]=$email;
                                      $query = "select * from candidate where email='$email' and password='$password'";
                                      $result = mysqli_query($connection,$query)or die ('unable to query databse');
                                      $data = mysqli_fetch_array($result);
                                      if($data!=0)
                                      {

                                        foreach ($result as $desc)
                                        {
                                          ?>
                                           <tbody>
                                               <tr>
                                                    <td>NAME :</td>
                                                    <td><?php echo $desc['name']?></td>
                                               </tr>
                                               <tr>
                                                    <td>GENDER :</td>
                                                    <td><?php echo $desc['gender']?></td>
                                               </tr>
                                               <tr>
                                                    <td>AGE :</td>
                                                    <td><?php echo $desc['age']?></td>
                                               </tr>
                                               <tr>
                                                    <td>GUARDIAN NAME :</td>
                                                    <td><?php echo $desc['guardianName']?></td>
                                               </tr>
                                               <tr>
                                                    <td>ADDRESS :</td>
                                                    <td><?php echo $desc['address']?></td>
                                               </tr>
                                               <tr>
                                                    <td>PIN :</td>
                                                    <td><?php echo $desc['pin']?></td>
                                               </tr>
                                               <tr>
                                                    <td>EMAIL :</td>
                                                    <td><?php echo $desc['email']?></td>
                                               </tr>
                                               <tr>
                                                    <td>MOBILE NO. :</td>
                                                    <td><?php echo $desc['mobile']?></td>
                                               </tr>
                                               <tr>
                                                    <td>AADHAR CARD NUMBER :</td>
                                                    <td><?php echo $desc['aadhar']?></td>
                                               </tr>
                                         </tbody>
                                          <?php
                                        }
                                      }
                                    }
                                    ?>

                                    <?php

                                    if(isset($_SESSION['email'])and !isset($email) and !isset($password) )
                                    {

                                      $email2 =$_SESSION['email'];
                                      $query = "select * from candidate where email='$email2'";
                                      $result = mysqli_query($connection,$query)or die ('unable to query databse');
                                      $data = mysqli_fetch_array($result);
                                      if($data!=0)
                                      {
                                        foreach ($result as $desc)
                                        {
                                          ?>
                                           <tbody>
                                               <tr>
                                                    <td>NAME :</td>
                                                    <td><?php echo $desc['name']?></td>
                                               </tr>
                                               <tr>
                                                    <td>GENDER :</td>
                                                    <td><?php echo $desc['gender']?></td>
                                               </tr>
                                               <tr>
                                                    <td>AGE :</td>
                                                    <td><?php echo $desc['age']?></td>
                                               </tr>
                                               <tr>
                                                    <td>GUARDIAN NAME :</td>
                                                    <td><?php echo $desc['guardianName']?></td>
                                               </tr>
                                               <tr>
                                                    <td>ADDRESS :</td>
                                                    <td><?php echo $desc['address']?></td>
                                               </tr>
                                               <tr>
                                                    <td>PIN :</td>
                                                    <td><?php echo $desc['pin']?></td>
                                               </tr>
                                               <tr>
                                                    <td>EMAIL :</td>
                                                    <td><?php echo $desc['email']?></td>
                                               </tr>
                                               <tr>
                                                    <td>MOBILE NO. :</td>
                                                    <td><?php echo $desc['mobile']?></td>
                                               </tr>
                                               <tr>
                                                    <td>AADHAR CARD NUMBER :</td>
                                                    <td><?php echo $desc['aadhar']?></td>
                                               </tr>
                                         </tbody>
                                          <?php
                                        }
                                      }
                                    }
                                    ?>

                                  </table>
                                  <div class="pull-right">
                                  <button class="btn btn-danger">MESSAGE &nbsp;<span class="glyphicon glyphicon-envelope"></span></button>
                                  <button class="btn btn-danger" >RESULT <span class="glyphicon glyphicon-briefcase"></span></button>
                                  </div>
                                  </div>
                           </div>
                       </div>
                 </div>
            </div>
       </div>

   </div><!--end of contaner-->
   <?php include'footer.php';?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   </body>
</html>