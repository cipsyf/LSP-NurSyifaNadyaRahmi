<?php

require 'app.php';

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
};

$id = $_GET["id"];

$data = query("SELECT * FROM tbuser where iduser= $id")[0];

if (isset($_POST["submit"])) {
    if (ubah($_POST) > 0) {
        echo " <script>
                alert('Data Berhasil Diubah!');
                document.location.href = 'login.php';
                </script>";
    } else {
        echo " <script>
                alert('Data Gagal Diubah!');
                </script>";
    }
};

?>

<?php
$title = "Profil";
require_once 'template/header.php'

?>

<div class="container">
    <div class="card">
        <div class="container">
            <h1 class="text-center">Sunting Profil</h1>
            <br>
            <?php if (isset($msg)) : ?>
                <?= $msg ?>
            <?php endif ?>
            <form action="" method="post">
                <input type="hidden" name="iduser" value="<?= $id ?>">
                <div class="tampil text-center my-5">
                    <label for="username" class="form-label">Your Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= $data["username"] ?>">
                </div>
                <div class="col-12 pt-4">
                    <div class="row">
                        <div class="col">
                            <div class="d-grid gap-2">
                                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>