<?php
include_once "/var/www/html/portofolio/connection/koneksi.php";
include_once "../../asset/admin_header.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/8ef9aa6db8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="...">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Your+Desired+Font">
    <title>Maharani Delivery</title>
</head>

<body>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="../settings.php" class="no-decoration text-muted">
                        <i class="fa-solid fa-home"></i> Home
                    </a>
                </li>
                <li class="breadcrumb-item active no-decoration text-muted" aria-current="page">
                    <a href="tambah_kategori.php" class="no-decoration text-muted">Tambah Kategori</a>
                </li>
            </ol>
        </nav>
    </div>
    <!-- breadcrumb end-->
    <div class="container mt-5">
        <div class="panel">
            <div class="panel-heading admin">
                <h2>Welcome,
                    Admin</h2>
            </div>
            <div class="panel-body"><br /><br />
                <table class="table table-bordered table-striped menu">
                    <thead>
                        <th scope="col" width="1%">No</th>
                        <th scope="col">kategori</th>
                        <th scope="col" width=17%">opsi</th>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori");
                        $jumlahKategori = mysqli_num_rows($queryKategori);

                        if ($jumlahKategori == 0) {
                        ?>
                            <tr>
                                <td colspan="3">Tidak ada data</td>
                            </tr>
                            <?php
                        } else {
                            while ($d = mysqli_fetch_assoc($queryKategori)) {
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $d['nama']; ?></td>
                                    <td>
                                        <a href="kategori_edit.php?id=<?php echo $d['id']; ?>" class="btn btn-warning text-white">
                                            <i class="fas fa-pen-to-square"></i> Edit</a>
                                        <a href="kategori_hapus.php?id=<?php echo $d['id']; ?>" class="btn btn-danger">
                                            <i class="fas fa-trash"></i> Hapus</a>
            </div>
            </td>
            </tr>
    <?php
                            }
                        }
    ?>
    </tbody>
    </table>
        </div>
    </div>
    </div>
    </div>
</body>

</html>