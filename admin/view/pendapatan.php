<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Pendapatan</h3>
                <p class="text-subtitle text-muted"> </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Pendapatan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Basic Tables start -->
<section class="section">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id Pemesanan</th>
                            <th>Id Pelanggan</th>
                            <th>Id Barber</th>
                            <th>Layanan Dipilih</th>
                            <th>Total Harga</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require '../../config/koneksi.php';
                        $query = "select pemesanan.id_pelanggan, layanan_dipesan.id_pemesanan, pemesanan.id_barber, pemesanan.totalharga, pemesanan.tanggal, layanan_dipesan.nama_layanan from pemesanan
                        INNER JOIN layanan_dipesan on layanan_dipesan.id_pemesanan = pemesanan.id_pemesanan
                        ORDER BY id_pemesanan";
                        $result = mysqli_query($koneksi, $query);
                        if (mysqli_num_rows($result) > 0) {
                            $nomor = 1;
                            foreach ($result as $row) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $nomor; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['id_pemesanan']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['id_pelanggan']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['id_barber']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['nama_layanan']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['totalharga']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['tanggal']; ?>
                                    </td>
                                </tr>
                                <?php
                                $nomor++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- Basic Tables end -->
<script src="../assets/extensions/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="../assets/static/js/pages/datatables.js"></script>