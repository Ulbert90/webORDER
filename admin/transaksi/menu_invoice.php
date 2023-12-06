<?php
include_once "/var/www/html/portofolio/connection/koneksi.php";

// Get products from the database
$get_data = mysqli_query($koneksi, "SELECT * FROM produk");
$produk = mysqli_fetch_all($get_data, MYSQLI_ASSOC);

// Calculate total price
$totalPrice = 0;
foreach ($produk as $product) {
    $totalPrice += $product['harga'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="...">
</head>
<style>
body {
    font-family: Arial, sans-serif;
}

.container {
    max-width: 800px;
    margin: 20px auto;
}

h2 {
    text-align: center;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th,
td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.invoice-total {
    text-align: right;
    margin-top: 20px;
}
</style>

<body>
    <div class="container">
        <div class="col-md-12 col-md-offset-0">
            <h2>Pendapatan Harian</h2>
        </div>
        <p>Date: <?php echo date('Y-m-d H:i:s'); ?></p>
        <table>
            <thead>
                <tr>
                    <th width="1%">No</th>
                    <th>Menu</th>
                    <th>Category</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produk as $key => $product) : ?>
                <tr>
                    <td><?php echo $key + 1; ?></td>
                    <td><?php echo $product['menu']; ?></td>
                    <td><?php
                            // Fetch category name based on kategori_id
                            $kategoriId = $product['kategori_id'];
                            $query_kategori = mysqli_query($koneksi, "SELECT nama FROM kategori WHERE id='$kategoriId'");
                            $kategori = mysqli_fetch_assoc($query_kategori)['nama'];
                            echo $kategori;
                            ?></td>
                    <td><?php echo "Rp. " . number_format($product['harga'], 3, ',', '.'); ?></td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <th>Total</th>
                    <td><?php echo "Rp. " . number_format($totalPrice, 3, ',', '.'); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
    window.print();
    </script>
</body>

</html>