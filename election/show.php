<?php
session_start();
$id =$list['id'];
$query =("select * From candidate where id='$id'");
$result=mysqli_query($connection,$query)or die("error querying");
$row = mysqli_fetch_array($result);
$content = $row['images'];
header('Content-type: image/jpg');
echo $content;
?>