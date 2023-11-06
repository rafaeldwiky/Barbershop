<?php
require 'koneksi.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
  $username_or_email = $_POST['username_or_email'];
  $password = $_POST['password'];

  if (filter_var($username_or_email, FILTER_VALIDATE_EMAIL)) {
    $field = 'email_admin';
    $table = 'admin_barber';
  } else {
    $field = 'username_admin';
    $table = 'admin_barber';
  }

  $query = "SELECT * FROM $table WHERE $field='$username_or_email' AND password_admin='$password'";
  $result = mysqli_query($koneksi, $query);

  if ($result && mysqli_num_rows($result) > 0) {
    // Login sebagai admin
    $row = mysqli_fetch_assoc($result);
    $_SESSION['id'] = $row['id_admin'];
    $_SESSION['username'] = $row['username_admin'];
    $_SESSION['level'] = "admin";
    header("location: home.php");
    exit();
  } else {
    if (filter_var($username_or_email, FILTER_VALIDATE_EMAIL)) {
      $field = 'email_pelanggan';
      $table = 'pelanggan';
    } else {
      $field = 'username';
      $table = 'pelanggan';
    }
    $query = "SELECT * FROM $table WHERE $field='$username_or_email' AND password='$password'";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0) {
      // Login sebagai pelanggan
      $row = mysqli_fetch_assoc($result);
      $_SESSION['id'] = $row['id_pelanggan'];
      $_SESSION['username'] = $row['username'];
      $_SESSION['level'] = "pelanggan";

      header("location: landing_page.php");
      exit();
    } else {
      $_SESSION['error_message'] = 'Masukkan username atau email dan password dengan benar.';
      header("location: login.php");
      exit();
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login - Sadimo Barbershop</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.jpg" rel="icon">
  <!-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.jpg" alt="">
                  <span class="d-none d-lg-block">Sadimo Barbershop</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login ke akunmu</h5>
                    <p class="text-center small">masukkan email/username dan password untuk login</p>
                  </div>
                  <?php
                  if (isset($_GET['pesan']) && $_GET['pesan'] == 'register_berhasil') {
                    echo "Register berhasil, silahkan login.";
                  }
                  ?>
                  <form class="row g-3 needs-validation" action="login.php" method="post" novalidate>

                    <div class="col-12">
                      <label for="yourUsernameOrEmail" class="form-label">Username atau Email</label>
                      <div class="input-group has-validation">
                        <input type="text" name="username_or_email" class="form-control" required>
                        <div class="invalid-feedback">mohon masukkan email atau username kamu</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" required>
                      <div class="invalid-feedback">mohon masukkan password kamu</div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="submit">Login</button>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember_me" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>

                    <div class="col-12">
                      <p class="small mb-0">belum memiliki akun? <a href="register.php">daftar</a></p>
                    </div>
                  </form>
                  <?php
                  // session_start();
                  if (isset($_SESSION['error_message'])) {
                    echo '<p class="text-danger">' . $_SESSION['error_message'] . '</p>';
                    unset($_SESSION['error_message']);
                  }
                  ?>

                </div>
              </div>
            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>