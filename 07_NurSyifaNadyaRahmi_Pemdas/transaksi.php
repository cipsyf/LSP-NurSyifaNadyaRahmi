<html>
    <head>
    <title>Car Wash || Website Sederhana</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="style.css"> 
    </head>
    <body>
        <!-- top navbar -->
        <div class="topnav">
            <a href="index.php">Home</a>
            <a class="active" href="#">Transaksi</a>
            <a class="logout" href="proses_logout.php">Logout</a>
        </div>

        <!-- isi -->
        <div style="padding-left:16px">
        <h1>Transaksi</h1>
            <form action="" method="post" name="transaksi">
                <label for="nomor">No Transaksi:</label>
                <br>
                <input type="number" id="nomor" name="nomor">
                <br>
                <label for="tanggaltransaksi">Tanggal Transaksi:</label><br>
                <input type="date" id="tanggaltransaksi" name="tanggaltransaksi">
                <br>
                <label for="nama">Nama Kostumer:</label><br>
                <input type="text" id="nama" name="nama">
                <br>
                <label for="paket">Pilihan paket:</label><br>
                <input type="text" id="paket" name="paket" value="<?php echo $_GET['paket']; ?>">
                <br>
                <label for="harga">Harga Paket:</label><br>
                <input type="text" id="harga" name="harga" value="<?php echo $_GET['harga']; ?>">
                <br><br>
                <input type="radio" id="tidakadatambahan" name="pilihan" value="0">
                <label for="tidakadatambahan">Tidak ada tambahan - Rp. 0</label>
                <br>
                <input type="radio" id="wax" name="pilihan" value="10000">
                <label for="wax">Wax - Rp. 10.000</label>
                <br>
                <input type="radio" id="fogging" name="pilihan" value="20000">
                <label for="fogging">Fogging - Rp. 20.000</label>
                <br><br> 
                
                <input type="submit" value="Hitung Total Harga"><br><br>
                <label for="total">Total Harga:</label><br>
                    <!-- pertambahan -->
                    <?php
                        $jumlah= $_GET['harga'] + $_POST['pilihan'];
                        echo "<input type='text' name='jumlah' value='$jumlah'>";
                        echo "<br>";
                    ?>
                <label for="pembayaran">Pembayaran:</label><br>
                <input type="number" id="pembayaran" name="pembayaran"><br><br>
                <input type="submit" value="Hitung Kembalian"><br><br>
                <label for="kembalian">Kembalian:</label><br>
                    <!-- pengurangan -->
                    <?php
                        $kembalian= $_POST['pembayaran'] - $_POST['jumlah'];
                        echo "<input type='text' name='kembalian' value='$kembalian'>";
                        echo "<br><br>";
                    ?>

                    <!-- button simpan (back to dashboard) -->
                   <a href="index.php" onclick="myFunction()"><p>Simpan Transaksi</p></a>
            </form>
            <script>
                function myFunction() {
                alert("Transaksi Berhasil!");

                window.location=("location:index.php");
                }
            </script>         
        </div>
    </body>
</html>