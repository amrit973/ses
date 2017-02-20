<?php
session_start();
include 'connect.php';
if(isset($_SESSION['email']))
{
$email2 =$_SESSION['email'];
$query =("select * From candidate where email='$email2'");
$result=mysqli_query($connection,$query)or die("error querying");
$row = mysqli_fetch_array($result);
$content = $row['images'];
header('Content-type: image/jpg');
echo $content;
}

else
    echo"http://placehold.it/300x300";


?>