<?php
require '../config/auth.php'; // Adjusted path to match the location of auth.php
logout();
header("Location: login.php");
?>
