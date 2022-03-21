<?php

require 'app.php';

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
};

$result = mysqli_query($conn, "SELECT * FROM tbtransaksi");

?>

<?php

$title = "Daftar Transaksi";
require_once 'template/header.php'

?>

<div class="container">
    <h2>List Transaksi</h2>
    <hr>
</div>
<div class="container">
    <div class="card mt-5">
        <div class="card-body">
            <table id="transaksi">
                <thead>
                    <tr>
                        <th>ID Transaksi</th>
                        <th>No. Transaksi</th>
                        <th>Tanggal Transaksi</th>
                        <th>ID User</th>
                        <th>ID Paket Cuci</th>
                        <th>Total Harga</th>
                        <th>Pembayaran</th>
                        <th>Kembalian</th>
                        <th>Paket Tambahan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row["notransaksi"] ?></td>
                            <td><?= $row["tgltransaksi"] ?></td>
                            <td><?= $row["iduser"] ?></td>
                            <td><?= $row["idpaket"] ?></td>
                            <td>Rp. <?= $row["totalharga"] ?>.000</td>
                            <td>Rp. <?= $row["bayar"] ?>.000</td>
                            <td>Rp. <?= $row["kembalian"] ?>.000</td>
                            <td><?= $row["namapakettambahan"] ?></td>
                            <td>
                                <a class="btn btn-danger" onclick="checkDelete()" href="hapus-transaksi.php?id=<?= $row['idtransaksi'] ?>">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<?php
require_once 'template/footer.php'
?>

</div>


<script>
    $(document).ready(function() {
        $('#transaksi').DataTable();
    });
</script>
<script>
    function checkDelete() {
        return confirm('Yakin ingin menghapus?');
    }
</script>
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>