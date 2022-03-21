<?php 
session_start(); //mulai session

$datapaket = array(
    array("Cuci mobil kecil", "Suzuki Karimun, Toyota Agya, Swift, Ayla, Jazz", 40000),
    array("Cuci mobil sedang", "CRV, HRV, Mobilio, Civic", 45000),
    array("Cuci mobil besar", "Fortuner, Pajero, Robicorn", 50000),
    array("Cuci mobil sangat besar", "Alpard, Lexus, Vellfire", 55000)
);

if(!isset($_SESSION['UserData']['Username'])) {
    header("location:login.php");

exit;
}
?>

<html>
    <head>
        <title>Car Wash || Website Sederhana</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="topnav">
            <a class="active" href="#home">Home</a>
            <a href="#">Transaksi</a>
            <a class="logout" href="proses_logout.php">Logout</a>
        </div>
        <div style="padding-left:16px">
            <h1>Daftar Paket Pencucian Mobil</h1>
            <div class="card">
                <div class="container"> <!-- start looping the data on array -->
                    <?php foreach ($datapaket as $data) {
                        echo "<h3>Paket " . $data[0] . "</h3>";
                        echo "<li>Jenis mobil: " . $data[1]. "</li><br>";
                        echo "Rp." . $data[2] . "<br>";
                        echo "<a href='transaksi.php?paket=$data[0]&isi=$data[1]&harga=$data[2]'><p>Pilih paket</p></a>";
                        echo "<br>"; } 
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>