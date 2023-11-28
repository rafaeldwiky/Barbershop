<?php
include '../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = mysqli_real_escape_string($koneksi, $_POST["nama"]);
    $username = mysqli_real_escape_string($koneksi, $_POST["username"]);
    $email = mysqli_real_escape_string($koneksi, $_POST["email"]);
    $nohp = mysqli_real_escape_string($koneksi, $_POST["nohp"]);
    $password = mysqli_real_escape_string($koneksi, $_POST["password"]);

    $id_pengguna = "usr" . rand(10000, 99999);
    $id_pelanggan = "plg" . uniqid();

    mysqli_begin_transaction($koneksi);

    $query_pengguna = "INSERT INTO pengguna (id_pengguna, nama, username, email, nohp, password, level) VALUES ('$id_pengguna', '$nama', '$username', '$email', '$nohp', '$password', 2)";

    if (mysqli_query($koneksi, $query_pengguna)) {
        $query_pelanggan = "INSERT INTO pelanggan (id_pelanggan, id_pengguna, nama) VALUES ('$id_pelanggan', '$id_pengguna', '$nama')";

        if (mysqli_query($koneksi, $query_pelanggan)) {
            mysqli_commit($koneksi);
            echo "Registrasi berhasil. <a href='login.php'>Login</a>";
        } else {
            mysqli_rollback($koneksi);
            echo "Error: " . mysqli_error($koneksi);
        }
    } else {
        mysqli_rollback($koneksi);
        echo "Error: " . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
}
?>