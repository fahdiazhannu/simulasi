<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simulasi BRS INF</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 login-section-wrapper">
                    <div class="brand-wrapper">
                        <img src="assets/images/logo.png" alt="logo" class="logo">
                    </div>
                    <div class="login-wrapper my-auto">
                        <h1 class="login-title">Log in</h1>
                        <?php if (session()->getFlashdata('msg')) : ?>
                            <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                        <?php endif ?>
                        <form method="POST" action="<?= base_url('login/auth'); ?>">
                            <div class="form-group">
                                <label for="nmr_induk">Nomor Induk</label>
                                <input type="nmr_induk" name="nmr_induk" id="nmr_induk" class="form-control" placeholder="Masukkan Nomor Induk">
                            </div>
                            <div class=" form-group mb-4">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password">
                            </div>
                            <input type="checkbox" onclick="myFunction()">Show Password</>
                            <button type="submit" class=" btn btn-block login-btn" name="tombol" id=login>Login</button>
                        </form>
                        <form method="POST" action="<?= base_url('regis/reg'); ?>">
                            <button type="submit" class=" btn btn-block login-btn" name="tombol" id=login>Registrasi</button>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="assets/images/login.jpg" alt="login image" class="login-img">
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>