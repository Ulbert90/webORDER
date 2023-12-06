<?php
include_once '/var/www/html/portofolio/connection/koneksi.php';
include_once '../asset/admin_header.php';

session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}

// Fetch the username from the session
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Maharani</title>
</head>

<body>
    <div class="container">
        <div class="panel">
            <div class="panel-heading admin">
                <h2>Welcome, <?php echo $username; ?></h2>

                <div class="alert alert-primary mt-5">
                    <h1>Selamat Datang Di Dashbord Admin</h1>
                    <p class="text-danger">!!Semua perubahan yang anda lakukan di sini berakibat pada halaman utama
                        web</p>
                    <p> Yang Bisa anda lakukan pada web ini adalah :
                        <li>Membuat menu</li>
                        <hr>
                        <li>Mengedit menu</li>
                        <hr>
                        <li>Menghapus menu</li>
                    </p>
                </div>
                <div class="alert alert-danger">
                    <h4>HARAP BERHATI HATI DALAM MELAKUKAN PERUBAHAN DATA</h4>
                </div>
            </div>
        </div>
    </div>
</body>

</html>