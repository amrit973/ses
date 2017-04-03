
<?php
include_once 'connect.php';
$query2 = "select email from candidate";
$result = mysqli_query($connection,$query2) or die("Error querying databse");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mail</title>
</head>
<body>
<h1>Mail List</h1>
<h4>List of Candidates</h4>
<ul>
<?php foreach($result as $list):?>
    <li><?php echo $list['email'];?></li>
<?php endforeach?>
</ul>
<a href="?all">Send Message to all Candidates.</a>
</body>
</html>