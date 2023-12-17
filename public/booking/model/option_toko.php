<?php
require '../../../config/koneksi.php';

$sql = "SELECT buka_booking, tgl_closebooking FROM toko_info WHERE id_info = 1";
$result = $koneksi->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $buka_booking = $row['buka_booking'];
    $tgl_closebooking = $row['tgl_closebooking'];
} else {
    die("Data tidak ditemukan");
}
$koneksi->close();
if ($buka_booking == 0) {
    header("Location: ../../error-404.php");
} else {
    header("Location: ../../../auth/auth-login.php");
}
?>