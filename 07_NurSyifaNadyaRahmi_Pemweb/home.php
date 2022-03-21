<?php

require 'app.php';

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
};

$result = mysqli_query($conn, "SELECT * FROM tbpaket");

?>

<?php

$title = "Home";
require_once 'template/header.php'

?>

<div class="container">
    <!-- BAGIAN DAFTAR -->
    <div class="daftar pt-3">
        <!-- BAGIAN TITLE DAFTAR -->
        <h2>Daftar Paket Pencucian Mobil</h2>
        <br>
        <!-- BAGIAN ROW DAFTAR -->
        <div class="row pt-2">
            <?php while ($row = $result->fetch_assoc()) : ?>
                <div class="col">
                    <div class="card py-3">
                        <div class="card-body">
                            <h3>Paket <?= $row["namapaket"] ?></h3>
                            <p>Seperti <?= $row["deskripsi"] ?> </p>
                            <div class="card-subtitle">Seharga Rp. <?= $row["harga"] ?></div>
                        </div>
                    </div>
                    <div class="pilih pt-4">
                        <a class="btn btn-primary d-grid" href="transaksi.php?id=<?= $row["idpaket"] ?>" role="button">Pilih Paket</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>

<?php
require_once 'template/footer.php'
?>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>