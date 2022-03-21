<?php 

require 'app.php';

if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
};

$id = $_GET["id"];

if(hapus ($id) >0){
    echo " <script>
                alert('Data Berhasil Dihapus!');
                document.location.href = 'daftartransaksi.php';
                </script>";
} else {
    echo " <script>
                alert('Data Gagal Dihapus!');
                </script>";
}
