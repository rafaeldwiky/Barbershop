<?php
require '../model/registerplg_query.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sadimo Barbershop</title>

    <link rel="shortcut icon" href="../assets/static/images/logo/logo_kecil.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/compiled/css/app.css">
    <link rel="stylesheet" href="../assets/compiled/css/app-dark.css">
    <link rel="stylesheet" href="../assets/compiled/css/auth.css">
</head>

<body>
    <script src="../assets/static/js/initTheme.js"></script>
    <div id="auth">

        <div class="row h-100">
            <div class="row align-items-center justify-content-center h-100">
                <div class="col-lg-5 col-12">
                    <div id="auth-left">
                        <h1 class="auth-title mb-3">Sign Up</h1>

                        <form class="form" method="post" data-parsley-validate>
                            <div class="form-group position-relative has-icon-left mb-4">
                                <input type="text" name="nama" class="form-control form-control-xl"
                                    placeholder="Nama Lengkap" autocomplete="off" data-parsley-required="true">
                                <div class="form-control-icon">
                                    <i class="bi bi-person-vcard-fill"></i>
                                </div>
                                <!-- <div class="invalid-feedback">Mohon masukkan nama lengkap</div> -->
                            </div>
                            <div class="form-group position-relative has-icon-left mb-4">
                                <input type="email" name="email" class="form-control form-control-xl"
                                    placeholder="Email" data-parsley-required="true">
                                <div class="form-control-icon">
                                    <i class="bi bi-envelope"></i>
                                </div>
                                <!-- <div class="invalid-feedback">Mohon masukkan email yang valid.</div> -->
                            </div>
                            <div class="form-group position-relative has-icon-left mb-4">
                                <input type="text" name="username" class="form-control form-control-xl"
                                    placeholder="Username" data-parsley-required="true">
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                                <!-- <div class="invalid-feedback">Mohon masukkan username</div> -->
                            </div>

                            <div class="form-group position-relative has-icon-left mb-4">
                                <input type="text" name="nohp" class="form-control form-control-xl" placeholder="nohp"
                                    data-parsley-required="true">
                                <div class="form-control-icon">
                                    <i class="bi bi-phone"></i>
                                </div>
                                <!-- <div class="invalid-feedback">Mohon masukkan nomor HP yang valid.</div> -->
                            </div>

                            <div class="form-group position-relative has-icon-left mb-4">
                                <input type="password" name="password" class="form-control form-control-xl"
                                    id="password" placeholder="Password" data-parsley-required="true">
                                <div class="form-control-icon">
                                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                                </div>
                                <!-- <div class="invalid-feedback">Mohon masukkan password</div> -->
                            </div>
                            <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5"
                                type="submit">Daftar</button>
                        </form>
                        <div class="text-center mt-3 text-lg fs-4">
                            <p class='text-gray-600'>Sudah memiliki akun? <a href="auth-login.php" class="font-bold">Log
                                    in</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- script -->
    <script src="../assets/extensions/jquery/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            var togglePassword = $("#togglePassword");
            var password = $("#password");
            togglePassword.click(function () {
                password.attr("type", password.attr("type") === "password" ? "text" : "password");
                togglePassword.toggleClass("bi-eye-slash bi-eye");
            });
        });
    </script>

    <script src="../assets/extensions/parsleyjs/parsley.min.js"></script>
    <script src="../assets/static/js/pages/parsley.js"></script>
</body>

</html>