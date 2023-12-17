<?php
include '../../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['buka_booking'])) {
        $buka_booking = $_POST['buka_booking'];
        $tgl_closebooking = $_POST['tgl_closebooking'];

        $query = "UPDATE toko_info SET buka_booking = $buka_booking, tgl_closebooking = ";

        if ($buka_booking == 1) {
            $query .= "NULL";
        } else {
            // Gunakan format tanggal MySQL: 'YYYY-MM-DD'
            $tgl_closebooking = date('Y-m-d', strtotime($tgl_closebooking));
            $query .= "'$tgl_closebooking'";
        }

        $query .= " WHERE id_info = 1";

        if ($koneksi->query($query) === TRUE) {
            echo "Status Booking berhasil diubah.";
        } else {
            echo "Error updating record: " . $koneksi->error;
        }
    } else {
        echo "Invalid request.";
    }
}
$koneksi->close();
?>