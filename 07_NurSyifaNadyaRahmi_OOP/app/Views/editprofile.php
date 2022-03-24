<?php

require'app.php';

if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
};

$id = $_GET["id"];

$data = query("SELECT * FROM tbuser where iduser= $id")[0];

if(isset($_POST["submit"])){
    if (ubah($_POST) > 0){
        echo " <script>
                alert('Data Berhasil Diubah!');
                document.location.href = 'login.php';
                </script>";
    } else {
        echo " <script>
                alert('Data Gagal Diubah!');
                </script>";
    }
};
