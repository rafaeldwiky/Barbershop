<?php
require '../../config/koneksi.php';
session_start();

// Periksa apakah pengguna sudah login dan level-nya adalah 2
if (isset($_SESSION['nama']) && isset($_SESSION['id_pengguna']) && isset($_SESSION['nohp'])) {
  $nama = $_SESSION['nama'];
  $id_pengguna = $_SESSION['id_pengguna'];
  $no_hp = $_SESSION['nohp'];

  // Gunakan $nama, $id_pengguna, dan $no_hp sesuai kebutuhan di halaman ini
} else {
  // Jika pengguna tidak memiliki sesi yang sesuai, mungkin perlu diarahkan ke halaman lain atau tindakan lain
  echo "Anda tidak memiliki izin untuk mengakses halaman ini.";
  // atau
  // header("Location: halaman_tidak_diizinkan.php");
  exit();
}
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
  <section class="ftco-section ftco-booking bg-light">
    <div class="container ftco-relative">
      <div class="row justify-content-center pb-3">
        <div class="col-md-10 heading-section text-center ftco-animate">
          <span class="subheading">Booking</span>
          <h2 class="mb-4">Make an Appointment</h2>
          <p>gunakan booking ini supaya tidak keduluan lagi ketika ingin potong rambut</p>
        </div>
      </div>
      <h3 class="vr">Call Us: 081231377867</h3>
      <div class="row justify-content-center">
        <div class="col-md-10 ftco-animate">
          <form action="#" class="appointment-form">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <?php
                  // booking.php
                  
                  // Periksa apakah parameter 'barber' telah diterima
                  if (isset($_GET['barber'])) {
                    $namaBarberTerpilih = urldecode($_GET['barber']);
                  } else {
                    // Handle jika parameter tidak ditemukan
                    $namaBarberTerpilih = "Barber Tidak Ditemukan";
                  }

                  // Gunakan $namaBarberTerpilih di dalam formulir atau di bagian lain dari halaman
                  ?>
                  <label for="appointment_nama_barber">barber dipilih</label>
                  <input type="text" class="form-control" id="appointment_nama_barber" placeholder="Nama Barber"
                    value="<?php echo $namaBarberTerpilih ?>">
                </div>
              </div>
              <!-- <div class="col-sm-6">
                <div class="form-group">
                  <input type="text" class="form-control" id="appointment_id_barber" placeholder="Id Barber">
                </div>
              </div> -->
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="appointment_nama_pelanggan">nama pelanggan</label>
                  <input type="text" class="form-control" id="appointment_nama_pelanggan" placeholder="Nama Pelanggan"
                    value="<?php echo $_SESSION['nama']; ?>">
                </div>
              </div>
              <!-- <div class="col-sm-6">
                <div class="form-group">
                  <input type="text" class="form-control" id="appointment_id_pelanggan" placeholder="Id Pelanggan">
                </div>
              </div> -->
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="nama_layanan">pilih layanan</label>
                  <div class="select-wrap">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <?php
                    $query = "SELECT nama_layanan FROM layanan";
                    $result = mysqli_query($koneksi, $query);

                    if (mysqli_num_rows($result) > 0) {
                      ?>
                      <select name="nama_layanan" class="form-control">
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                          $nama_layanan = $row["nama_layanan"];
                          ?>
                          <option value="<?php echo $nama_layanan; ?>">
                            <?php echo $nama_layanan; ?>
                          </option>
                          <?php
                        }
                        ?>
                      </select>
                      <?php
                    } else {
                      echo "Tidak ada layanan yang ditemukan.";
                    }
                    ?>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="phone">nomor hp</label>
                  <input type="text" class="form-control" id="phone" placeholder="Phone"
                    value="<?php echo $_SESSION['nohp']; ?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">pilih tanggal</label>
                  <input class="form-control appointment_date" placeholder="Date">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">pilih jam</label>
                  <input class="form-control appointment_time" placeholder="Time">
                </div>
              </div>
              <!-- <div class="col-md-12">
                <div class="form-group">
                  <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                </div>
              </div> -->
            </div>
            <div class="form-group">
              <input type="submit" value="Make an Appointment" class="btn btn-primary">
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- END -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Get all the team items (barber profiles) on the hair artist.php page
      var teamItems = document.querySelectorAll('.carousel-team .item');

      // Get the input element for barber name
      var barberNameInput = document.getElementById('appointment_nama_barber');

      // Add event listeners to each team item
      teamItems.forEach(function (item) {
        item.addEventListener('click', function (event) {
          // Prevent the default link behavior
          event.preventDefault();

          // Get the barber name and update the input field
          var barberName = item.querySelector('h2').innerText;
          barberNameInput.value = barberName;
        });
      });
    });
  </script>

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