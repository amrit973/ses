<?php
session_start();
include_once 'connect.php';
$document_root = $_SERVER['DOCUMENT_ROOT'];
$date = date('H:i, jS F Y');
$query = "select name, vote from candidate";
$result =mysqli_query($connection,$query) or die("error querying");
$output = "\r\n".$date."\r\n";
if(isset($_SESSION))
{
    $output .= "Title : ".$_SESSION['title']."\r\n";
}
foreach($result as $row)
{
  $output .= $row['name']."\t".$row['vote']."\r\n";
}
@$fp = fopen("$document_root\\ses\\election\\result.txt", 'a+');
if(!$fp)
{
    echo "<p>Your order could not be processed at this time</p>";
    exit();
}
fwrite($fp,$output);
fclose($fp);
echo "Election has been successfully stopped";
session_destroy();
?>
<br>
