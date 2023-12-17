<?php
require '../../config/koneksi.php';
session_start();

if (isset($_SESSION['nama']) && isset($_SESSION['id_pengguna']) && isset($_SESSION['nohp'])) {
    $nama = $_SESSION['nama'];
    $id_pengguna = $_SESSION['id_pengguna'];
    $no_hp = $_SESSION['nohp'];

} else {
    echo "Anda tidak memiliki izin untuk mengakses halaman ini.";
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Booking - Sadimo Barbershop</title>
    <link rel="shortcut icon" href="../../assets/static/images/logo/logo_kecil.png" type="image/x-icon">

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">


    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->
    <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script> -->

    <link rel="stylesheet" type="text/css" href="css/appointment.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.css">
    <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
</head>

<body>

    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <h3>Tentukan Jadwal</h3>
                <p>isi data dengan benar dan pilih jadwal yang diinginkan dan tersedia!</p>
                <a href="hair_artist.php" class="btnBackBarber">
                    <button type="button">&lt;- Prev Page</button>
                </a>
            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Make an Appointment</h3>
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_pelanggan">Nama Pelanggan*</label>
                                    <input type="text" class="form-control" id="" placeholder="Nama Pelanggan"
                                        value="<?php echo $_SESSION['nama']; ?>">
                                </div>

                                <div class="form-group">
                                    <?php
                                    $query = "SELECT nama_layanan FROM layanan";
                                    $result = mysqli_query($koneksi, $query);

                                    if (mysqli_num_rows($result) > 0) {
                                        ?>
                                        <label for="nama_layanan">Pilih Layanan:</label>
                                        <select name="nama_layanan" class="form-control">
                                            <option class="hidden" selected disabled>Pilih Layanan</option>
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
                                <?php
                                $query = "SELECT DISTINCT tanggal FROM pemesanan";
                                $result = mysqli_query($koneksi, $query);

                                $dates = array();
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $dates[] = date('Y-m-d', strtotime($row['tanggal']));
                                }
                                ?>


                                <div class="form-group">
                                    <label>Pilih Tanggal yang tersedia*</label>
                                    <input type="text" class="form-control" id="event_date">
                                    <script>
                                        var bookedDates = <?php echo json_encode($dates); ?>;
                                        $(document).ready(function () {
                                            $('#event_date').datepicker({
                                                'title': "Pilih Tanggal",
                                                'format': 'yyyy-mm-dd',
                                                'todayBtn': "linked",
                                                'todayHighlight': true,
                                                'orientation': "left",
                                                'clearBtn': true,
                                                'startDate': new Date(),
                                                datesDisabled: bookedDates
                                            });
                                        });
                                    </script>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nohp">Masukkan Nomor Hp*</label>
                                    <input type="text" minlength="10" maxlength="10" name="txtEmpPhone"
                                        class="form-control" placeholder="Your Phone *"
                                        value="<?php echo $_SESSION['nohp']; ?>">
                                </div>

                                <div class="form-group">
                                    <?php
                                    $query = "SELECT nama_barber FROM barber";
                                    $result = mysqli_query($koneksi, $query);

                                    if (!$result) {
                                        die("Query gagal: " . mysqli_error($koneksi));
                                    }

                                    $selectedBarber = isset($_GET['barber']) ? urldecode($_GET['barber']) : "Pilih Barber";
                                    ?>
                                    <label for="nama_barber">Pilih Barber:</label>
                                    <select name="nama_barber" id="nama_barber" class="form-control">
                                        <option class="hidden" selected disabled>
                                            <?php echo $selectedBarber; ?>
                                        </option>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $nama_barber = $row["nama_barber"];
                                            ?>
                                            <option value="<?php echo $nama_barber; ?>" <?php echo ($selectedBarber == $nama_barber) ? 'selected' : ''; ?>>
                                                <?php echo $nama_barber; ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <script>
                                        document.getElementById('nama_barber').addEventListener('change', function () {
                                            var selectedBarber = this.value;
                                            window.location.href = updateQueryStringParameter(window.location.href, 'barber', selectedBarber);
                                        });
                                        function updateQueryStringParameter(uri, key, value) {
                                            var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
                                            var separator = uri.indexOf('?') !== -1 ? "&" : "?";
                                            if (uri.match(re)) {
                                                return uri.replace(re, '$1' + key + "=" + value + '$2');
                                            } else {
                                                return uri + separator + key + "=" + value;
                                            }
                                        }
                                    </script>
                                </div>

                                <?php
                                require_once './model/show_barberavaibility.php';
                                $result = barberReady::getJadwalBarber($koneksi, $selectedBarber);
                                ?>
                                <div class="form-group">
                                    <label for="time">Pilih waktu yang tersedia</label>
                                    <select name="event_time" class="form-control">
                                        <option class="hidden" selected disabled>Pilih Jam</option>
                                        <?php
                                        mysqli_data_seek($result, 0);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $jam = $row["jam"];
                                            echo "<option value='$jam'>$jam</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                            </div>
                            <input type="submit" class="btnBook" value="Buat Jadwal">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>