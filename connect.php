<?php
error_reporting(0);
$dbhost='localhost';
$dbuser='root';
$dbpassword ='';
$dbdatabse='ses';
$connection=mysqli_connect($dbhost,$dbuser,$dbpassword,$dbdatabse) or die("error connecting databse".mysqli_error($connection));
?>