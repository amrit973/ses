<?php
$dbhost='localhost';
$dbuser='root';
$dbpassword ='';
$dbdatabse='ses';
$email= $_POST['email'];
$connection=mysqli_connect($dbhost,$dbuser,$dbpassword,$dbdatabse) or die("error connecting databse".mysqli_error($connection));
$query = "select template from voters where email= '$email'";
$result = mysqli_query($connection,$query) or die('error querying databse');
$array = mysqli_fetch_row($result);
echo json_encode($array);
?>