<?php
session_start();
include 'connect.php';
$email = $_POST['email'];
$password = $_POST['password'];

if(isset($email)and isset($password))
{
    $query = "select * from candidate where email='$email' and password='$password'";
    $result = mysqli_query($connection,$query)or die ('unable to query databse');
    $data = mysqli_fetch_array($result);
    if($data!=0)
    {
        $_SESSION["email"]=$email;
        foreach ($result  as $desc) {
            echo $desc['name'];
            # code...
        }

    }
    else
    header("Location:index.php");
    #echo 'wrong username or password';
}
?>