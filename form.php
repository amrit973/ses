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

if($verify==$password)
{
      $query = ("Insert into candidate (name, gender, age, guardianName, address,pin,email, mobile, aadhar, password)values('$name','$gender','$age','$guardian','$address','$pin',
        '$email','$mobile','$aadhar','$password')");
    $result = mysqli_query($connection,$query)or die("error querying".mysqli_error($connection));

}
else
{
?>
<script type="text/javascript">
    alert("Passwords don't match");
</script>

<?php

}




?>
