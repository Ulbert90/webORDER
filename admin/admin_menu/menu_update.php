<?php
include_once "/var/www/html/portofolio/connection/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $menu = $_POST['menu'];
    $kategori = $_POST['kategori'];
    $stock = $_POST['stock'];
    $harga = $_POST['harga'];

    // Handle photo upload
    $foto_nama = $_FILES['foto']['name'];
    $foto_size = $_FILES['foto']['size'];

    if ($foto_size > 2097152) {
        header("location: ../settings_makanan.php?id=$id&pesan=size");
        exit();
    }

    $foto_nama_new = "";

    if ($foto_nama != "") {
        $ekstensi_izin = array('png', 'jpg', 'jpeg');
        $pisahkan_ekstensi = explode('.', $foto_nama);
        $ekstensi = strtolower(end($pisahkan_ekstensi));
        $file_tmp = $_FILES['foto']['tmp_name'];
        $tanggal = md5(date('Y-m-d h:i:s'));
        $foto_nama_new = $tanggal . '-' . $foto_nama;
        move_uploaded_file($file_tmp, "../../../../foto_produk/" . $foto_nama_new);
    }

    // Retrieve kategori_id based on the provided category name
    $kategori_result = mysqli_query($koneksi, "SELECT id FROM kategori WHERE nama = '$kategori'");
    $kategori_data = mysqli_fetch_assoc($kategori_result);

    if ($kategori_data) {
        $kategori_id = $kategori_data['id'];

        // Update menu item in the database
        $query = mysqli_query($koneksi, "UPDATE produk SET menu='$menu', kategori_id='$kategori_id', ketersediaan_stock='$stock', harga='$harga', foto='$foto_nama_new' WHERE id='$id'");

        if ($query) {
            header("location: ../settings_makanan.php?id=$id&pesan=berhasil");
            exit();
        } else {
            header("location: ../settings_makanan.php?id=$id&pesan=gagal");
            exit();
        }
    } else {
        header("location: ../settings_makanan.php?id=$id&pesan=kategori_not_found");
        exit();
    }
} else {
    header("location: index.php"); // Redirect to index.php if the form is not submitted via POST
    exit();
}