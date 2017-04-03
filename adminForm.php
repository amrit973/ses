<?php
session_start();
if(isset($_SESSION['email']) and isset($_SESSION['admin']) and $_SESSION['admin']=="amrit973")
{
    echo "hello";
    header("Location:admin.php");
}
else
{
    header("Location:index.php");
}

?>