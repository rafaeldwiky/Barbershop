<?php
include '../config/koneksi.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailUsername = $_POST["email_username"];
    $password = $_POST["password"];

    $emailUsername = mysqli_real_escape_string($koneksi, $emailUsername);
    $password = mysqli_real_escape_string($koneksi, $password);

    $query = "SELECT p.*, a.nama AS admin_nama, k.nama AS karyawan_nama
              FROM pengguna p
              LEFT JOIN admin_barber a ON p.id_pengguna = a.id_pengguna
              LEFT JOIN karyawan_akses k ON p.id_pengguna = k.id_pengguna
              WHERE (p.email = '$emailUsername' OR p.username = '$emailUsername') AND p.password = '$password'";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $level = $row["level"];

            if ($level == 1) {
                $_SESSION['namaadmin'] = $row['admin_nama'];
                $_SESSION['id_penggunaamdin'] = $row['id_pengguna'];
                $_SESSION['foto_admin'] = $row['foto_admin'];
                header("Location: ../admin/index.php");
            } elseif ($level == 2) {
                $_SESSION['nama'] = $row['nama'];
                $_SESSION['id_pengguna'] = $row['id_pengguna'];
                $_SESSION['nohp'] = $row['nohp'];
                header("Location: ../public/booking/hair_artist.php");
            } elseif ($level == 3) {
                $_SESSION['nama_employee'] = $row['karyawan_nama'];
                $_SESSION['id_penggunaempl'] = $row['id_pengguna'];
                header("Location: ../karyawan/index.php");
            } else {
                echo "Level pengguna tidak valid.";
            }
        } else {
            echo "Email/Username atau password salah.";
        }
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
}
?>