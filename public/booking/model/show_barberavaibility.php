<?php
class barberReady
{
    public static function getJadwalBarber($koneksi, $selectedBarber)
    {
        $query = "SELECT jadwal_barber.hari, jadwal_barber.jam FROM barber
                  INNER JOIN jadwal_barber ON barber.id_barber = jadwal_barber.id_barber
                  WHERE barber.nama_barber = '$selectedBarber'";
        $result = mysqli_query($koneksi, $query);

        if (!$result) {
            die("Query gagal: " . mysqli_error($koneksi));
        }

        return $result;
    }
}
?>