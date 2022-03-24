<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container">
    <h1>Dashboard</h1>
    <hr>
    <br>
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Transaksi</h5>
                    <p class="card-text"><?= $total_transaksi; ?></p>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total User</h5>
                    <p class="card-text"><?= $total_user; ?></p>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>