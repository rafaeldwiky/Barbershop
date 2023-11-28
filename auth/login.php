<?php
require '../model/login_query.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/loginstyle.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Anton&display=swap');
  </style>
  <title>Login - Sadimo Barbershop</title>
  <link href="../assets/img/logo_kecil.png" rel="icon">
</head>

<body>
  <!----------------------- Main Container -------------------------->
  <div class="container d-flex justify-content-center align-items-center min-vh-100">

    <!----------------------- Login Container -------------------------->
    <div class="row border rounded-5 p-3 bg-white shadow box-area">

      <!--------------------------- Left Box ----------------------------->
      <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
        style="background: #fff; box-shadow: inset 0 0 25px rgba(0, 0, 0, 0.12);">
        <div class="featured-image mb-3">
          <img src="../assets/img/logo.jpg" class="img-fluid" style="width: 400px;">
        </div>
        <p class="text-black fs-2" style="font-family: 'Anton', sans-serif;">SADIMO
          BARBERSHOP
        </p>
      </div>

      <!-------------------- ------ Right Box ---------------------------->
      <div class="col-md-6 right-box">
        <div class="row align-items-center">
          <div class="header-text mb-4">
            <h2>Akses ke Sadimo</h2>
            <p>Masukkkan data akun dengan benar untuk ke halaman selanjutnya</p>
          </div>
          <form class="row g-3 needs-validation" action="" method="post" novalidate>
            <div class="col-12">
              <label for="yourUsernameOrEmail" class="form-label">Username atau Email</label>
              <div class="input-group has-validation">
                <input type="text" name="email_username" class="form-control" required>
                <div class="invalid-feedback">Mohon masukkan email atau username kamu</div>
              </div>
            </div>
            <div class="col-12">
              <label for="yourPassword" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" required>
              <div class="invalid-feedback">Mohon masukkan password kamu</div>
            </div>

            <div class="col-12">
              <button class="btn btn-primary w-100" type="submit">Login</button>
            </div>

            <div class="col-12 d-flex justify-content-between align-items-center">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember_me" value="true" id="rememberMe">
                <label class="form-check-label" for="rememberMe">Remember me</label>
              </div>
              <div class="mt-0 ms-2">
                <p class="mb-0">
                  <a href="#" class="text-decoration-none">Lupa Akun?</a>
                </p>
              </div>
            </div>

            <div class="col-12">
              <p class="small mb-0">Belum memiliki akun? <a href="register.php">Daftar</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>

</html>