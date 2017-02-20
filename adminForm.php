<?php
session_start();
include 'connect.php';
$email = $_POST['email'];
$mPassword =$_POST['password'];
$password = sha1($mPassword);
$query = "select * from admin where email ='$email' and password='$password'";
$result = mysqli_query($connection,$query)or die('error querying database');
$data = mysqli_fetch_array($result);
if($data==0)
    header("Location:index.php");
else
{
    header("Location:admin.php");
    $_SESSION['email']=$email;
}

?>