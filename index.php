
<!--http://placehold.it/500x300-->
<!DOCTYPE html>
 <?php include 'head.php';?>
   <body>
   <div class="container" id="main">
     <?php include 'navbar.php';?>
                   <div class="row">
                     <div class="main2">
                       <div class="col-md-9 col-sm-9 col-xs-9">
                            <?php include 'carousel.php';?>
                       </div>
            <div class="col-md-3 col-sm-3 col-xs-3">
                                <nav class="navbar navbar-inverse " id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">

                <li>
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Events</a>
                </li>

                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
                <li>
                    <a href="https://twitter.com/maridlcrmn">Follow me</a>
                </li>
            </ul>
        </nav>
        <!-- /#sidebar-wrapper -->

                        <div class="panel panel-primary">
                                <div class="panel-heading">SES
                                </div>
                                <div class="panel-body">
                                   <p>
                                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam id fringilla neque. Vestibulum quam metus, ultricies nec eleifend ac, malesuada eget lacus. Sed pulvinar</p>

                                </div>
                        </div>
            </div>
                    </div>
                   </div>
   </div><!--main-->
      <?php include 'footer.php';?>
      <?php include 'modal.php'; ?>
      <?php include 'login.php'; ?>

   <script >
     $("#registration").click(function(event){
           event.preventDefault();
           $('#myModal').modal('show');
     });
     $("#login").click(function(event){
           event.preventDefault();
           $('#loginModal').modal('show');
     });
   </script>
   </body>
</html>

<?php
include 'connect.php';
$name = $_POST['name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$guardian = $_POST['guardian'];
$address = $_POST['address'];
$email =$_POST['email'];
$pin = $_POST['pin'];
$mobile = $_POST['mobile'];
$aadhar = $_POST['aadhar'];
$password = $_POST['password'];
$verify = $_POST['verify'];

$query = "select * from candidate where email='$email'";
    $result = mysqli_query($connection,$query)or die ('unable to query databse');
    $data = mysqli_fetch_array($result);
if($data!=0)
{
  ?>
         <script type="text/javascript">
           alert("duplicate entry not allowed");
         </script>
  <?php
}
else
{
if($verify==$password&& !empty($verify)&& !empty($password))
{


  $tempName = $_FILES['image']['tmp_name'];
  $fp = fopen($tempName,'r');
  $data = fread($fp,filesize($tempName));
  $data = addslashes($data);
  fclose($fp);

      $query = ("Insert into candidate (name, gender, age, guardianName, address,pin,email, mobile, aadhar, password,images)values('$name','$gender','$age','$guardian','$address','$pin',
        '$email','$mobile','$aadhar','$password','$data')");
    $result = mysqli_query($connection,$query)or die("error querying".mysqli_error($connection));

    ?>
                          <script type="text/javascript">
                          alert("successfully registered");
                          </script>
    <?php
  }
else if(isset($password)&&isset($verify))
{
?>
<script type="text/javascript">
    alert("Passwords don't match");
</script>

<?php

}
}
?>