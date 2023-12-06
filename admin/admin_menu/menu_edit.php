<?php
include_once "../../asset/admin_header.php";
include_once "/var/www/html/portofolio/connection/koneksi.php";

// Check if ID parameter is set
if (!isset($_GET['id'])) {
    header("Location: menu.php"); // Redirect to index.php if ID is not provided
    exit();
}

$id = $_GET['id'];

// Fetch menu item details based on the provided ID
$query = mysqli_query($koneksi, "SELECT * FROM produk WHERE id='$id'");
$menuData = mysqli_fetch_assoc($query);

// Check if menu item with the provided ID exists
if (!$menuData) {
    header("Location: menu.php"); // Redirect to index.php if menu item is not found
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/8ef9aa6db8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="...">
    <title>Edit Menu - Maharani Delivery</title>
</head>

<body>
    <div class="container">
        <div class="panel">
            <div class="panel-heading">
                <h1>Edit Menu</h1>
            </div>
            <div class="panel-body">
                <form action="menu_update.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $menuData['id']; ?>">

                    <div class="mb-3">
                        <label for="menu" class="form-label">Menu Name:</label>
                        <input type="text" class="form-control" id="menu" name="menu"
                            value="<?php echo $menuData['menu']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="kategori" class="form-label">Category:</label>
                        <select class="form-select" id="kategori" name="kategori">
                            <!-- Populate categories from your database -->
                            <?php
                            $get_categories = mysqli_query($koneksi, "SELECT * FROM kategori");
                            while ($category = mysqli_fetch_assoc($get_categories)) {
                                $selected = ($category['id'] == $menuData['kategori_id']) ? 'selected' : '';
                                echo "<option value='{$category['nama']}' $selected>{$category['nama']}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock:</label>
                        <input type="text" class="form-control" id="stock" name="stock"
                            value="<?php echo $menuData['ketersediaan_stock']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label">Photo:</label>
                        <?php if ($menuData['foto'] != "") { ?>
                        <img src="../../../../foto_produk/<?php echo $menuData['foto']; ?>"
                            style="width:100px;height:100px;">
                        <?php } ?>
                        <input type="file" class="form-control" id="foto" name="foto">
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Price:</label>
                        <input type="text" class="form-control" id="harga" name="harga"
                            value="<?php echo $menuData['harga']; ?>">
                    </div>

                    <button type="submit" class="btn btn-primary">Update Menu</button>
                    <a href="menu.php" type="submit" class="btn btn-outline-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Font Awesome -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/8ef9aa6db8.js" crossorigin="anonymous"></script>
</body>

</html>