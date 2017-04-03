<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/ses/connect.php';
$email = $_SESSION['email'];
$vote=1;
$query = "update voters set vote ='$vote' where email='$email' ";
$result = mysqli_query($connection,$query) or die('error querying voter');

$id =$_POST['id'];
$query = "select vote from candidate where id='$id' ";
$result = mysqli_query($connection,$query) or die('error querying candidate');
foreach($result as $row)
{
    $number = $row['vote'];
    $number +=1;
    $query = "update candidate set vote ='$number' where id='$id' ";
    $result = mysqli_query($connection,$query) or die('error querying candidate');
    echo 'Your vote has been submitted successfully. Thank you';
}
?>


