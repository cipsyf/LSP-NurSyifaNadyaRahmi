<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container">
    <h2>Profile</h2>
    <hr>
    <label for="username" class="form-label">Your Username</label>
    <input type="text" class="form-control" id="username" name="username" value="<?= session()->username ?>" disabled>
</div>
<?= $this->endSection() ?>