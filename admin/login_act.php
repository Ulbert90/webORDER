<?php
session_start();
include_once "/var/www/html/portofolio/connection/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = md5($_POST['password']);

    $data = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' and password='$password'"); // Change 'username' to the correct column name

    $cek = mysqli_num_rows($data);

    if ($cek > 0) {
        $_SESSION["username"] = $username;
        $_SESSION["status"] = "login_act";
        header("location: ../admin/settings.php");
    } else {
        header("location: index.php?pesan=gagal");
    }
} else {
    // Redirect to index.php if accessed directly
    header("location: index.php");
}
