<?php
include_once 'connect.php';
$query2 = "select email from voters";
$result2 = mysqli_query($connection,$query2) or die("Error querying databse");
?>
<h4>List of Voters</h4>
<ul>
<?php foreach($result2 as $list):?>
    <li><?php echo $list['email'];?></li>
<?php endforeach?>
</ul>
<a href="?voters">Send Message to all Voters.</a>