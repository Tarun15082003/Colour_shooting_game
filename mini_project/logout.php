<?php
ini_set('display_errors', 1);
error_reporting(-1);
session_start();
unset($_SESSION['Student_id']);
unset($_SESSION['password']);
session_destroy();
session_destroy();
$_SESSION['logged_in'] = false;
header("Location: Student_login.php")
?>