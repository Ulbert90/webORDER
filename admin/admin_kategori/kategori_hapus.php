<?php
include '/var/www/html/portofolio/connection/koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM kategori WHERE id='$id '");
header("location: kategori.php");
