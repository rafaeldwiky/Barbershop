<?php
include '../model/login_query.php';
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
                <div class="col-md-5 col-5">
                    <div id="auth-left">
                        <h1 class="auth-title mb-3">Log in.</h1>
                        <!-- <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p> -->

                        <form class="form" method="post" data-parsley-validate>
                            <div class="form-group position-relative has-icon-left mb-4 mandatory">
                                <input type="text" name="email_username" class="form-control form-control-xl"
                                    placeholder="Username atau Email" autocomplete="off" data-parsley-required="true">
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                                <!-- <div class="invalid-feedback">Mohon masukkan email atau username kamu</div> -->
                            </div>
                            <div class="form-group position-relative has-icon-left mb-4">
                                <input type="password" name="password" class="form-control form-control-xl"
                                    id="password" placeholder="Password" data-parsley-required="true">
                                <div class="form-control-icon">
                                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                                </div>
                                <!-- <div class="invalid-feedback">Mohon masukkan password kamu</div> -->
                            </div>

                            <div class="form-check form-check-lg d-flex align-items-end">
                                <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                    Remember Me
                                </label>
                            </div>
                            <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Log
                                in</button>
                        </form>
                        <div class="text-center mt-3 text-lg fs-4">
                            <p class="text-gray-600">Belum mempunyai akun? <a href="auth-register.php"
                                    class="font-bold">Daftar</a></p>
                            <p><a class="font-bold" href="auth-forgot-password.php">Lupa Passsword?</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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