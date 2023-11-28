<?php
require '../../config/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Booking - Sadimo Barbershop</title>
  <link rel="shortcut icon" type="image/x-icon" href="../img/logo/logo2.jpg">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed:500,600,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="css/animate.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">

  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <section class="ftco-section ftco-team">
    <div class="container-fluid px-md-5">
      <div class="row justify-content-center pb-3">
        <div class="col-md-10 heading-section text-center ftco-animate">
          <span class="subheading">Barberman</span>
          <h2 class="mb-4">Choose your Barber</h2>
          <p>sesuaikan barber kesukaanmu untuk hasil yang maksimal</p>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 ftco-animate">
          <div class="carousel-team owl-carousel">
            <?php
            $query = "SELECT * FROM barber";
            $result = mysqli_query($koneksi, $query);
            while ($row = mysqli_fetch_array($result)) {
              $namaBarber = $row['nama_barber'];
              ?>
              <div class="item">
                <a href="booking_user.php?barber=<?php echo urlencode($namaBarber); ?>" class="team text-center">
                  <div class="img"
                    style="background-image: url(../../upload/foto_barber/<?php echo $row['foto_barber']; ?>); height: 400px;">
                  </div>
                  <h2>
                    <?php echo $namaBarber; ?>
                  </h2>
                  <span class="position">Barberman</span>
                </a>
              </div>
              <?php
            }
            ?>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- END -->
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="js/main.js"></script>

</body>

</html>