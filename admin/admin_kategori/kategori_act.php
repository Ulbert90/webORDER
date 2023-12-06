<?php
include_once "/var/www/html/portofolio/connection/koneksi.php";

if (isset($_POST['tambah_kategori'])) {
    $nama_kategori = $_POST['nama_kategori'];

    // Melakukan validasi atau operasi lainnya sebelum eksekusi query

    $query = "INSERT INTO kategori (nama) VALUES ('$nama_kategori')";

    if (mysqli_query($koneksi, $query)) {
        header("Location: kategori.php");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}

// Tambahan kode untuk edit atau hapus kategori bisa ditambahkan di sini