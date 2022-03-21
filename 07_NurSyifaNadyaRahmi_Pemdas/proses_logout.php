<?php

session_start(); //memulai session
session_destroy();

echo "<script>alert('Anda telah logout!');window.location=('login.php')</script>"; //alert logout berhasil

exit;
?>