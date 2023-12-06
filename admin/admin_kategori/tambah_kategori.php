<?php
include_once '/var/www/html/portofolio/connection/koneksi.php';
include_once "../../asset/admin_header.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="...">
    <link rel="stylesheet" href="https://kit.fontawesome.com/8ef9aa6db8.css" crossorigin="anonymous">
    <title>Admin Maharani</title>
</head>

<body>
    <div class="container mt-5">
        <div class="text-center mb-5">
            <h2>Tambah Kategori Menu</h2>
        </div>
        <hr>

        <form action="kategori_act.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <div class="card">
                    <div class="card-body">
                        <label for="nama_kategori" class="form-label">Menu:</label>
                        <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="mb-3 text-center">
                <button type="submit" name="tambah_kategori" class="btn btn-primary">Add Menu</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
</body>

</html>