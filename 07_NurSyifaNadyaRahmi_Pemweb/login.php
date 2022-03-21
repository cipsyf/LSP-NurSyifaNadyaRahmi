<?php

require 'app.php';

if (isset($_COOKIE["login"])) {
    if ($_COOKIE["login"] == 'true') {
        $_SESSION["login"] = true;
    }
};

if (isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
};

if (isset($_POST['submit'])) {
    $_SESSION["username"] = $_POST["username"];
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $result = mysqli_query($conn, "SELECT * FROM tbuser WHERE username='$username' AND password='$password'");
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($password === $row["password"]) {
            $_SESSION["login"] = true;

            header("location: home.php");
            exit;
        }
    } else {
        echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Masuk || Car Wash</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/style.css" />

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="wrap">
                        <div class="img" style="background-image: url(images/bg-2.jpg)"></div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Masuk ke <b>Website Car Wash</b></h3>
                                    <p>Required for access</p>
                                </div>
                            </div>
                            <?php if (isset($msg)) : ?>
                                <?= $msg ?>
                            <?php endif ?>
                            <form action="" method="post" class="signin-form">
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" name="username" placeholder="Masukkan Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Masukkan Password">
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-primary">Login</button>
                                </div>
                            </form>
                            <p class="text-center">
                                Belum mempunyai akses? <a href="register.php"> Daftar</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>