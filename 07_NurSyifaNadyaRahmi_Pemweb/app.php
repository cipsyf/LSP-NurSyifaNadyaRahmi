<?php

session_start();

$conn = mysqli_connect("localhost", "root", "", "db-carwash");

$timezone = new DateTimeZone('Asia/Ujung_Pandang');
$date = new DateTime();
$date->setTimeZone($timezone);

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query) or die("Query error : " . mysqli_error($conn));
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
};

function register($data)
{
    global $conn;

    $username = stripslashes($data["username"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $confirm_password = mysqli_real_escape_string($conn, $data["confirm_password"]);

    if ($password !== $confirm_password) {
        $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Password Tidak Sesuai!
      </div>';
        echo $msg;
        return false;
    }

    mysqli_query($conn, "INSERT INTO tbuser VALUES ('', '$username', '$password')");
    return mysqli_affected_rows($conn);
}

function tambah($data)
{
    global $conn;

    $tgltransaksi = htmlspecialchars($data["tgltransaksi"]);
    $namapakettambahan = htmlspecialchars($data["tambahan"]);
    $totalharga = htmlspecialchars($data["totalharga"]);
    $bayar = number_format($data["pembayaran"]);
    $kembalian = htmlspecialchars($data["kembalian"]);
    $nama = htmlspecialchars($data["nama"]);
    $idpaket = htmlspecialchars($data["idpaket"]);
    $notransaksi = htmlspecialchars($data["notransaksi"]);

    // NGAMBIL ID USER DARI DB USER BERDASARKAN INPUTAN NAMA
    $result = mysqli_query($conn, "SELECT * FROM tbuser WHERE username='$nama'");
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $nama = $row["iduser"];
    }

    // PERKONDISIAN NGAMBIL NAMA PAKET TAMBAHAN BERDASARKAN VALUE
    if ($namapakettambahan == 0) {
        $namapakettambahan = "Tidak Ada";
    } else if ($namapakettambahan == 10000) {
        $namapakettambahan = "Wax";
    } else if ($namapakettambahan == 20000) {
        $namapakettambahan = "Fogging";
    };

    mysqli_query($conn, "INSERT INTO tbtransaksi VALUES ('', '$notransaksi', '$nama', '$idpaket', '$tgltransaksi', '$namapakettambahan', '$totalharga', '$bayar', '$kembalian')");
    return mysqli_affected_rows($conn);
}


function ubah($data)
{
    global $conn;

    $iduser = $data["iduser"];
    $username = $data["username"];

    $query = "UPDATE tbuser SET username='$username' WHERE iduser= $iduser";
    mysqli_query($conn, $query);
    session_destroy();
    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tbtransaksi WHERE idtransaksi = $id");
    return mysqli_affected_rows($conn);
};
