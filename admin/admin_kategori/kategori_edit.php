<?php
include '/var/www/html/portofolio/connection/koneksi.php';
include_once "../../asset/admin_header.php";

if (isset($_GET['id'])) {
    $id = ($_GET["id"]);
    $query = "SELECT * FROM kategori WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query Error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
    }

    $data = mysqli_fetch_assoc($result);

    if (!count($data)) {
        echo "<div class='alert alert-warning'>Data tidak ditemukan pada database</div>";
        echo "<script>setTimeout(function(){ window.location='kategori.php'; }, 2000);</script>";
    }
} else {
    echo "<div class='alert alert-warning'>Masukkan data id.</div>";
    echo "<script>setTimeout(function(){ window.location='kategori.php'; }, 2000);</script>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama_kategori = $_POST['nama_kategori'];

    $query_update = "UPDATE kategori SET nama='$nama_kategori' WHERE id='$id'";
    $result_update = mysqli_query($koneksi, $query_update);

    if ($result_update) {
        echo "<div class='alert alert-success'>Data berhasil diubah</div>";
        echo "<script>setTimeout(function(){ window.location='kategori.php'; }, 2000);</script>";
    } else {
        echo "<div class='alert alert-danger'>Error updating data: " . mysqli_error($koneksi) . "</div>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Kategori</title>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit Kategori <?php echo $data['nama']; ?></h1>
        <div class="card">
            <div class="card-body">
                <form method="POST" action="">
                    <input name="id" value="<?php echo $data['id']; ?>" hidden />
                    <div class="mb-3">
                        <label for="nama_kategori" class="form-label">Nama Kategori</label>
                        <input type="text" name="nama_kategori" class="form-control" value="<?php echo $data['nama']; ?>" autofocus required />
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                        <a href="kategori.php" class="btn btn-danger">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="alert alert-warning fixed-bottom text-center" role="alert">
            <h4 class="alert-heading">Perhatian!</h4>
            <p>Pastikan data yang anda masukkan sudah benar.</p>
        </div>
    </div>
</body>

</html>