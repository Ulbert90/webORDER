<?php
include_once "/var/www/html/portofolio/connection/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/8ef9aa6db8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="...">
    <title>Tambah Menu - Maharani Delivery</title>
</head>

<body>
    <div class="container maharani">
        <div class="panel">
            <div class="panel-heading">
                <h1>Tambah Menu</h1>
            </div>
            <div class="panel-body">
                <form action="tambah_menu_act.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="menu" class="form-label">Menu Name:</label>
                        <input type="text" class="form-control" id="menu" name="menu" required>
                    </div>

                    <div class="mb-3">
                        <label for="kategori" class="form-label">Category:</label>
                        <select class="form-select" id="kategori" name="kategori" required>
                            <!-- Populate categories from your database -->
                            <?php
                            $get_categories = mysqli_query($koneksi, "SELECT * FROM kategori");
                            while ($category = mysqli_fetch_assoc($get_categories)) {
                                echo "<option value='{$category['nama']}'>{$category['nama']}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock:</label>
                        <input type="text" class="form-control" id="stock" name="stock" required>
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label">Photo:</label>
                        <input type="file" class="form-control" id="foto" name="foto" accept="image/*" required>
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Price:</label>
                        <input type="text" class="form-control" id="harga" name="harga" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Add Menu</button>
                    <a href="../settings_makanan.php" class="btn btn-secondary">kembali</a>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Font Awesome -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/8ef9aa6db8.js" crossorigin="anonymous"></script>
</body>

</html>