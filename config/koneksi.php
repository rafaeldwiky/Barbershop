<?php
$koneksi = mysqli_connect("localhost", "root", "", "barber_rafael");

if (!$koneksi) {
    die('Connection Failed' . mysqli_connect_error());
}
?>