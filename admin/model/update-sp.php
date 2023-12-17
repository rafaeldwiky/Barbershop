<?php
include '../../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['statusId']) && isset($_POST['pemesananId'])) {
    $statusId = $_POST['statusId'];
    $pemesananId = $_POST['pemesananId'];

    $idStatus = getIdStatusByName($statusId);

    if ($idStatus !== false) {
        $query = "UPDATE pemesanan SET id_status = $idStatus WHERE id_pemesanan = $pemesananId";

        if ($koneksi->query($query) === TRUE) {
            echo $statusId;
        } else {
            echo "Gagal memperbarui status: " . $koneksi->error;
        }
    } else {
        echo "Status tidak ditemukan.";
    }
} else {
    echo "Invalid request.";
}

function getIdStatusByName($namaStatus)
{
    global $koneksi;

    $query = "SELECT id_status FROM status_pemesanan WHERE nama_status = '$namaStatus'";
    $result = $koneksi->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['id_status'];
    } else {
        return false;
    }
}
?>