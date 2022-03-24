<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container">
    <h2>List Transaksi</h2>
    <hr>
    <br>
    <table id="transaksi" class="table-striped">
        <thead>
            <tr>
                <th>NO</th>
                <th>ID TRANSAKSI</th>
                <th>ID PAKET</th>
                <th>TANGGAL TRANSAKSI</th>
                <th>PAKET TAMBAHAN</th>
                <th>TOTAL HARGA</th>
                <th>NOMINAL PEMBAYARAN</th>
                <th>NOMINAL KEMBALIAN</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($dataTransaksi as $row) : ?>
                <tr>
                    <th><?= $no++; ?></th>
                    <td><?= $row->idtransaksi; ?></td>
                    <td><?= $row->idpaket; ?></td>
                    <td><?= $row->tgltransaksi; ?></td>
                    <td><?= $row->namapakettambahan; ?></td>
                    <td>Rp. <?= $row->totalharga; ?>.000</td>
                    <td>Rp. <?= $row->bayar; ?>.000</td>
                    <td>Rp. <?= $row->kembalian; ?>.000</td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>


<?= $this->endSection() ?>