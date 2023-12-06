<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Maharani</title>
    <link rel="stylesheet" href="../asset/css/login.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div id="app" style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    </div>
    <div class="container mt-5 loading">
        <br>
        <form action="../admin/login_act.php" method="post">
            <br>
            <article class="login">
                <img src="../asset/img/user-tie-solid.svg" alt="user-icon" />
                <h3>Login Sebagai Admin</h3>
                <div class="mb-3">
                    <input type="text" name="username" placeholder="Masukkan username.." class="form-control" />
                </div>
                <div class="mb-3">
                    <input type="password" name="password" placeholder="Masukkan password.." class="form-control" />
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                <p>Belum punya akun? <a href="register.php">Register</a></p>
            </article>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
</body>

</html>