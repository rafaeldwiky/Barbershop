<?php

include '../config/koneksi.php';

if (isset($_POST['save_barber'])) {
    $random_number = mt_rand(1000, 9999);

    $id_barber = 'BRB' . $random_number;

    $nama_barber = mysqli_real_escape_string($koneksi, $_POST['nama_barber']);
    $nohp_barber = mysqli_real_escape_string($koneksi, $_POST['nohp_barber']);

    if (empty($nama_barber) || empty($nohp_barber)) {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "INSERT INTO barber (id_barber, nama_barber, nohp_barber) VALUES ('$id_barber','$nama_barber','$nohp_barber')";
    $query_run = mysqli_query($koneksi, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Barber Created Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Error creating barber'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['update_barber'])) {
    $id_barber = mysqli_real_escape_string($koneksi, $_POST['id_barber']);
    $nama_barber = mysqli_real_escape_string($koneksi, $_POST['nama_barber']);
    $nohp_barber = mysqli_real_escape_string($koneksi, $_POST['nohp_barber']);

    if ($nama_barber == NULL || $nohp_barber == NULL) {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "UPDATE barber SET nama_barber='$nama_barber', nohp_barber='$nohp_barber' WHERE id_barber='$id_barber'";
    $query_run = mysqli_query($koneksi, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Barber Updated Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Barber Not Updated'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_GET['id_barber'])) {
    $id_barber = mysqli_real_escape_string($koneksi, $_GET['id_barber']);

    $query = "SELECT * FROM barber WHERE id_barber='$id_barber'";
    $query_run = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($query_run) == 1) {
        $barber = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Barber Fetch Successfully by id',
            'data' => $barber
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 404,
            'message' => 'Barber Id Not Found'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['delete_barber'])) {
    $id_barber = mysqli_real_escape_string($koneksi, $_POST['id_barber']);

    $query = "DELETE FROM barber WHERE id_barber='$id_barber'";
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