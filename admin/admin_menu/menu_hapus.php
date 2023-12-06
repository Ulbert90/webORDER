<?php
include '/var/www/html/portofolio/connection/koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM produk WHERE id='$id '");
header("location: ../settings_makanan.php");
