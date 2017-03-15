<!DOCTYPE html>
<html>
<head>
    <title>Admin Mail</title>
</head>
<body>
<h1>Mail List</h1>
<h4>List of Candidates</h4>
<ul>
<?php foreach($result as $list):?>
    <li><?php echo $list['email'];?></li>
<?php endforeach?>
</ul>
<a href="?all">Send Message to all Members.</a>
</body>
</html>