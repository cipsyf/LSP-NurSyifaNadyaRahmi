<?php

require 'app.php';

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
};

$nama = $_SESSION["username"];

$result = mysqli_query($conn, "SELECT * FROM tbuser WHERE username='$nama'");
if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    $id = $row["iduser"];
}

?>

<?php
$title = "Profil";
require_once 'template/header.php'

?>

<div class="container">
    <div class="card">
        <div class="container">
            <h1 class="text-center">Profil</h1>
            <br>
            <?php if (isset($msg)) : ?>
                <?= $msg ?>
            <?php endif ?>
            <div class="tampil text-center my-5">
                <label for="username" class="form-label">Your Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= $nama ?>" readonly>
            </div>
            <div class="col-12 pt-4">
                <div class="row">
                    <div class="col">
                        <div class="d-grid gap-2">
                            <a class="btn btn-primary" href="edit-profil.php?id=<?= $id ?>" role="button">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>