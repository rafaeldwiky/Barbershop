<?php
include '../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama_layanan = mysqli_real_escape_string($koneksi, $_POST["nama_layanan"]);
  $tanggal = mysqli_real_escape_string($koneksi, $_POST["tanggal"]);
  $totalharga = mysqli_real_escape_string($koneksi, $_POST["totalharga"]);
  $bayar = mysqli_real_escape_string($koneksi, $_POST["bayar"]);
  $kembalian = mysqli_real_escape_string($koneksi, $_POST["kembalian"]);
  $total = mysqli_real_escape_string($koneksi, $_POST["total"]);
  $jumlah = mysqli_real_escape_string($koneksi, $_POST["jumlah"]);
  $harga = mysqli_real_escape_string($koneksi, $_POST["harga"]);
  $id_barber = mysqli_real_escape_string($koneksi, $_POST["id_barber"]);
  $id_layanan = mysqli_real_escape_string($koneksi, $_POST["id_layanan"]);

  $id_kasir = "ksr/" . rand(10000, 99999);

  mysqli_begin_transaction($koneksi);

  $query_kasir = "INSERT INTO kasir (id_kasir, tanggal, id_barber, totalharga, bayar, kembalian) VALUES ('$id_kasir', '$tanggal', '$id_barber', '$totalharga', '$bayar', '$kembalian')";

  if (mysqli_query($koneksi, $query_kasir)) {
    $query_layanan_pesan_kasir = "INSERT INTO layanan_pesan_kasir (id_kasir, id_layanan, nama_layanan, jumlah, harga, total) VALUES ('$id_kasir', '$id_layanan', '$nama_layanan', '$jumlah', '$harga', '$total')";

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