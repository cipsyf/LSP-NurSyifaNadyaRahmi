<?php session_start();
session_destroy();
echo "<script>alert('Anda telah logout!')</script>";
header("location:login.php");
exit;
