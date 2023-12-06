<?php
include_once "/var/www/html/portofolio/project/webORDER/asset/admin_header.php";
include_once "/var/www/html/portofolio/connection/koneksi.php";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_order'])) {
    // Process the order
    $selected_products = $_POST['selected_products'];
    $total_price = 0;

    // Fetch selected products' details and calculate the total price
    foreach ($selected_products as $product_id) {
        $query_product = mysqli_query($koneksi, "SELECT * FROM produk WHERE id='$product_id'");
        $product = mysqli_fetch_assoc($query_product);

        // Add the product price to the total
        $total_price += $product['harga'];
        // Here, you can also add the product to the order table or perform other order-related tasks
    }

    // Display a message or redirect to another page after processing the order
    echo "Order processed successfully. Total Price: Rp. " . number_format($total_price, 0, ',', '.');
    exit;
}

// Fetch products to display on the page
$get_data = mysqli_query($koneksi, "SELECT * FROM produk");
$produk = mysqli_fetch_all($get_data, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/8ef9aa6db8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="...">
    <title>Maharani Delivery - Point of Sale</title>
</head>

<body>
    <!--background-->
    <div class="container">
        <div class="panel">
            <div class="panel-heading">
                <h1>MAHARANI - Point of Sale</h1>
            </div>
            <div class="panel-body">
                <br />
                <br />
                <form method="post">
                    <table class="table table-bordered table-striped menu">
                        <tr>
                            <th scope="col" width="1%">No</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Category</th>
                            <th scope="col">Stock</th>
                            <th scope="col" width="20%">Foto</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Action</th>
                        </tr>
                        <?php
                        $no = 1;
                        foreach ($produk as $product) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $product['menu']; ?></td>
                                <td><?php
                                    // Fetch category name based on kategori_id
                                    $kategoriId = $product['kategori_id'];
                                    $query_kategori = mysqli_query($koneksi, "SELECT nama FROM kategori WHERE id='$kategoriId'");
                                    $kategori = mysqli_fetch_assoc($query_kategori)['nama'];
                                    echo $kategori;
                                    ?></td>
                                <td><?php echo $product['ketersediaan_stock']; ?></td>
                                <td>
                                    <?php if ($product['foto'] == "") { ?>
                                        <img src="../../../../foto_produk/" style="width:100px;height:100px;">
                                    <?php } else { ?>
                                        <img src="../../../../foto_produk/<?php echo $product['foto']; ?>" style="width:100px;height:100px;">
                                    <?php } ?>
                                </td>
                                <td><?php echo $product['harga']; ?></td>
                                <td>
                                    <input type="checkbox" name="selected_products[]" value="<?php echo $product['id']; ?>">
                                </td>
                            </tr>
                        <?php
                        } // Closing brace for the foreach loop
                        ?>
                    </table>
                    <button type="submit" class="btn btn-primary" name="submit_order">Submit Order</button>
                </form>
            </div>
        </div>
    </div>

    <!--background-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/8ef9aa6db8.js" crossorigin="anonymous"></script>
</body>

</html>