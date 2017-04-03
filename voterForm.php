<?php
session_start();
include 'connect.php';
if(isset($_POST['email']) and isset($_POST['check']) and $_POST['check']=='success')
{
   $email = $_POST['email'];
   $query = "select * from voters where email ='$email'";
   $result = mysqli_query($connection,$query)or die('error querying database');
   $data = mysqli_fetch_array($result);
   if($data==0)
    header("Location:index.php");
   else
      {
         header("Location:voter.php");
         $_SESSION['voter']="voter973";
         $_SESSION['email']=$email;
      }
}
else
{
    header("Location:index.php");
}


?>