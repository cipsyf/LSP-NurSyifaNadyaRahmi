<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <h2>Tambah User</h2>
    <hr>
    <!-- alert berhasil login -->
    <?php if (session()->getFlashdata('success')) { ?>
        <div class="alert alert-success">
            <?php echo session()->getFlashdata('success'); ?>
        </div>
    <?php } ?>

    <!-- alert gagal login -->
    <?php if (session()->getFlashdata('error')) { ?>
        <div class="alert alert-danger">
            <?php foreach (session()->getFlashdata('error') as $field => $error) : ?>
                <p><?= $error ?></p>
            <?php endforeach ?>
        </div>
    <?php } ?>

    <?= form_open('tambahuser'); ?>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <div class="form-group">
        <button class="btn btn-primary">Tambah</button>
    </div>
    <?= form_close(); ?>
</div>

<?= $this->endSection() ?>