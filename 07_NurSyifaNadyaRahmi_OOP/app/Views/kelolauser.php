<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>


<div class="container">
    <a href="<?php echo base_url('tambahuser'); ?>" class="btn btn-success">+ Tambah data pengguna</a>

    <br><br>

    <h2>Daftar Pengguna</h2>
    <hr>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">ID</th>
                <th scope="col">USERNAME</th>
                <th scope="col">PASSWORD</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($dataUser as $row) : ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $row->iduser; ?></td>
                    <td><?= $row->username; ?></td>
                    <td><?= $row->password; ?></td>
                    <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit<?= $row->iduser; ?>">Edit</button>
                        <a class="btn btn-danger" onclick="return confirm('Apakah anda yakin data ini ingin dihapus?')" href="<?php echo base_url('KelolaUser/hapus'); ?>/<?= $row->iduser; ?>">Hapus</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<!-- Modal edit-->
<?php
foreach ($dataUser as $row) : ?>
    <div class="modal" id="modal-edit<?= $row->iduser; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit data user</h5>
                </div>
                <form action="<?php echo base_url('KelolaUser/edit') ?>" method="POST">
                    <div class="modal-body">
                        <input type="hidden" value="<?= $row->iduser; ?>" name="iduser">
                        <div class="form-group">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" value="<?= $row->username; ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>


<?= $this->endSection() ?>