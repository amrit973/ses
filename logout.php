<?php
session_start();
unset($_SESSION['email']);
echo "You've been logged out.<a href='index.php'>Click here</a> to login again ";
?>