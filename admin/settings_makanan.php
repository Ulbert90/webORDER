<?php
include_once '/var/www/html/portofolio/connection/koneksi.php';
include_once '../asset/admin_header.php';

$kategoriFilter = isset($_POST['kategori']) ? $_POST['kategori'] : 'all';

$query = "SELECT * FROM produk";
if ($kategoriFilter !== 'all') {
    $kategoriFilter = mysqli_real_escape_string($koneksi, $kategoriFilter);
    $query .= " WHERE kategori_id IN (SELECT id FROM kategori WHERE nama='$kategoriFilter')";
}

$get_data = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Maharani</title>
    <style>
    /* Default styles for all devices */
    body {
        font-size: 16px;
    }

    /* Media query for devices with a max width of 768px */
    @media (max-width: 768px) {
        body {
            font-size: 14px;
        }
    }

    /* Media query for devices with a max width of 480px */
    @media (max-width: 480px) {
        body {
            font-size: 12px;
        }
    }
    </style>
</head>

<body>

    <div class="container mt-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="settings.php" class="no-decoration text-muted">
                        <i class="fa-solid fa-home"></i> Home
                    </a>
                </li>
                <li class="breadcrumb-item active no-decoration text-muted" aria-current="page">Makanan
                </li>
            </ol>
        </nav>
    </div>
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <div class="panel">
                    <h2>Welcome, Admin</h2>
                    <!-- Other content of the panel goes here -->
                </div>
            </div>
            <div class="col">
            </div>
            <div class="col-md-3">
                <form method="post" class="d-flex">
                    <select name="kategori" id="kategori" class="form-select">
                        <option value="all">All Categories</option>
                        <option value="makanan">Makanan</option>
                        <option value="minuman">Minuman</option>
                        <option value="tambahan">Tambahan</option>
                    </select>
                    <button type="submit" class="btn btn-info"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>

    </div>

    <div class="container">

        <!--header end -->
        <div class="panel-body"><br /><br />
            <table class="table table-bordered table-striped menu">
                <tr>
                    <th scope="col" width="1%">No</th>
                    <th scope="col">Menu</th>
                    <th scope="col">kategori</th>
                    <th scope="col">stock</th>
                    <th scope="col" width="1%">foto</th>
                    <th scope="col">harga</th>
                    <th scope="col justify-content-center" width="17%">opsi</th>
                </tr>
                <?php
                $no = 1;
                while ($d = mysqli_fetch_array($get_data)) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['menu']; ?></td>
                    <td><?php
                            // Fetch category name based on kategori_id
                            $kategoriId = $d['kategori_id'];
                            $query_kategori = mysqli_query($koneksi, "SELECT nama FROM kategori WHERE id='$kategoriId'");
                            $kategori = mysqli_fetch_assoc($query_kategori)['nama'];
                            echo $kategori;
                            ?></td>
                    <td><?php echo $d['ketersediaan_stock']; ?></td>
                    <td>
                        <?php if ($d['foto'] == "") { ?>
                        <img src="../../../foto_produk/" style="width:100px;height:100px;">
                        <?php } else { ?>
                        <img src="../../../foto_produk/<?php echo $d['foto']; ?>" style="width:100px;height:100px;">
                        <?php } ?>
                    </td>
                    <td><?php echo $d['harga']; ?></td>
                    <td>
                        <a href="../admin/admin_menu/menu_edit.php?id=<?php echo $d['id']; ?>"
                            class="btn btn-warning text-white">
                            <i class="fas fa-pen-to-square"></i> Edit</a>
                        <a href="../admin/admin_menu/menu_hapus.php?id=<?php echo $d['id']; ?>" class="btn btn-danger">
                            <i class="fas fa-trash"></i> Hapus</a>
                    </td>
                </tr>
                <?php
                } // Closing brace for the while loop
                ?>
            </table>
        </div>
    </div>
</body>

</html>