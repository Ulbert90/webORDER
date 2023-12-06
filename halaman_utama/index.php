<?php
include_once "/var/www/html/portofolio/layout/header.php";
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
    echo "Order processed successfully. Total Price: Rp. " . number_format($total_price, 4, ',', '.');
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
    <link rel="stylesheet" type="text/css" href="../asset/css/index.css" />
    <script src="https://kit.fontawesome.com/8ef9aa6db8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="...">
    <title>Maharani Delivery - Point of Sale</title>
</head>

<body>
    <!--background-->


    <div class="container">
        <div class="panel">
            <div class="panel-heading text-light">
                <h1>MAHARANI - Point of Sale</h1>
            </div>
            <div class="panel-body">
                <br />
                <br />
                <form method="post">
                    <div class="row">
                        <?php
                        foreach ($produk as $index => $product) {
                        ?>
                        <div class="col">
                            <div class="card" style="width: 100%; height: 20rem;">
                                <!-- Adjust the height and margin-top as needed -->
                                <img src="
                                <?php echo ($product['foto'] == "") ? '../../../foto_produk/' : '../../../foto_produk/' . $product['foto']; ?>"
                                    class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $product['menu']; ?></h5>
                                    <p class="card-text">Price: Rp.
                                        <?php echo number_format($product['harga'], 2, ',', '.'); ?>
                                    </p>
                                    <a href="#" class="btn btn-primary">Order</a>
                                </div>
                            </div>
                        </div>
                        <?php
                        } // Closing brace for the foreach loop
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!--background-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/8ef9aa6db8.js" crossorigin="anonymous"></script>
</body>

</html>