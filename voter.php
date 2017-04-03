<!--http://placehold.it/500x300-->
<?php
session_start();
if(!isset($_SESSION['email']) or $_SESSION['voter']!='voter973')
{
  header('Location:index.php');
}
include 'connect.php';
$email = $_SESSION['email'];
$query = "select * from voters where email = '$email'";
$result = mysqli_query($connection,$query) or die ('error querying voters');
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
                 <div class="panel panel-info">
                       <div class="panel-heading">Personal Details</div>
                       <div class="panel-body">
                           <div class="row">
                               <div class="col-md-3 col-sm-3 col-xs-3">
                          <img src="showVoter.php" class="img-responsive" align="center"><br>
                               </div>
                               <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9">
                                  <table class="table table-hover table-responsive">
                                  <?php foreach($result as $desc):?>
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
                                       <?php endforeach;?>
                                  </table>
                                  <div class="pull-right">
                                  <a href="election/election.php"><button class="btn btn-primary" >VOTE <span class="glyphicon glyphicon-hand-up"></span></button></a>&nbsp;&nbsp;
                                  <a href="#contact"><button class="btn btn-primary">MESSAGE &nbsp;<span class="glyphicon glyphicon-envelope"></span></button></a>
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