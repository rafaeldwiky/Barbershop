<?php

include '../config/koneksi.php';

if (isset($_POST['save_barber'])) {
    $random_number = mt_rand(1000, 9999);

    $id_layanan = 'serv' . $random_number;

    $nama_layanan = mysqli_real_escape_string($koneksi, $_POST['nama_layanan']);
    $deskripsi_layanan = mysqli_real_escape_string($koneksi, $_POST['deskripsi_layanan']);
    $harga_layanan = mysqli_real_escape_string($koneksi, $_POST['harga_layanan']);

    if (empty($nama_layanan) || empty($harga_layanan)) {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "INSERT INTO layanan (id_layanan, nama_layanan, deskripsi_layanan, harga_layanan) VALUES ('$id_barber','$nama_layanan','$deskripsi_layanan','$harga_layanan')";
    $query_run = mysqli_query($koneksi, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'layanan berhasil ditambahkan'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'layanan gagal ditambah'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['update_layanan'])) {
    $id_barber = mysqli_real_escape_string($koneksi, $_POST['id_layanan']);
    $nama_layanan = mysqli_real_escape_string($koneksi, $_POST['nama_layanan']);
    $deskripsi_layanan = mysqli_real_escape_string($koneksi, $_POST['deskripsi_layanan']);
    $deskripsi_layanan = mysqli_real_escape_string($koneksi, $_POST['harga_layanan']);

    if ($nama_layanan == NULL || $harga_layanan == NULL) {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "UPDATE barber SET nama_layanan='$nama_layanan', deskripsi_layanan='$deskripsi_layanan', harga_layanan='$harga_layanan' WHERE id_layanan='$id_layanan'";
    $query_run = mysqli_query($koneksi, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'layanan berhasil diperbarui'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'layanan gagal diperbarui'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_GET['id_layanan'])) {
    $id_barber = mysqli_real_escape_string($koneksi, $_GET['id_layanan']);

    $query = "SELECT * FROM layanan WHERE id_layanan='$id_layanan'";
    $query_run = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($query_run) == 1) {
        $barber = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'layanan Fetch Successfully by id',
            'data' => $barber
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 404,
            'message' => 'id_layanan Not Found'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['delete_layanan'])) {
    $id_layanan = mysqli_real_escape_string($koneksi, $_POST['id_layanan']);

    $query = "DELETE FROM layanan WHERE id_layanan='$id_layanan'";
    $query_run = mysqli_query($koneksi, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Barber Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Barber Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}
?>