<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "barber_rafael";
$koneksi = mysqli_connect($server, $username, $password, $db);

if (mysqli_connect_errno()) {
  echo "koneksi gagal" . mysqli_connect_error();
}
?>