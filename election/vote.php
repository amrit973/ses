<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/ses/connect.php';
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


