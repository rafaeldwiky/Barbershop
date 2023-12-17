<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Booking</h3>
                <p class="text-subtitle text-muted"> </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Booking</li>
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
                            <th>Id Pemesanan</th>
                            <th>Tanggal Booking</th>
                            <th>Jam Booking</th>
                            <th>Id Pelanggan</th>
                            <th>Nama Pelanggan</th>
                            <th>Barber Dipilih</th>
                            <th>Layanan Dipilih</th>
                            <th>Total Harga</th>
                            <th>Catatan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require '../../config/koneksi.php';
                        $query = "SELECT
                        pemesanan.id_pemesanan,
                        pemesanan.tanggal,
                        pemesanan.jam,
                        pemesanan.id_pelanggan,
                        pelanggan.nama AS nama_pelanggan,
                        pemesanan.id_barber,
                        barber.nama_barber AS barber_dipilih,
                        pemesanan.totalharga,
                        pemesanan.catatan,
                        status_pemesanan.nama_status AS status
                    FROM
                        pemesanan
                        INNER JOIN pelanggan ON pemesanan.id_pelanggan = pelanggan.id_pelanggan
                        INNER JOIN barber ON pemesanan.id_barber = barber.id_barber
                        INNER JOIN status_pemesanan ON pemesanan.id_status = status_pemesanan.id_status";
                        $result = mysqli_query($koneksi, $query);
                        if (mysqli_num_rows($result) > 0) {
                            foreach ($result as $row) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $row['id_pemesanan']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['tanggal']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['jam']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['id_pelanggan']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['nama_pelanggan']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['id_barber']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['barber_dipilih']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['totalharga']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['catatan']; ?>
                                    </td>
                                    <td>
                                        <?php
                                        $status = $row['status'];
                                        $badgeClass = '';
                                        switch ($status) {
                                            case 'menunggu':
                                                $badgeClass = 'badge bg-warning';
                                                break;
                                            case 'diproses':
                                                $badgeClass = 'badge bg-primary';
                                                break;
                                            case 'selesai':
                                                $badgeClass = 'badge bg-success';
                                                break;
                                            case 'batal':
                                                $badgeClass = 'badge bg-danger';
                                                break;
                                            default:
                                                $badgeClass = 'badge bg-secondary';
                                        }
                                        ?>
                                        <span class="<?php echo $badgeClass; ?>"
                                            id="statusBadge_<?php echo $row['id_pemesanan']; ?>"
                                            data-status-id="<?php echo $row['status']; ?>"
                                            data-pemesanan-id="<?php echo $row['id_pemesanan']; ?>" data-toggle="tooltip"
                                            title="Klik untuk mengubah status" style="cursor: pointer;">
                                            <?php echo $status; ?>
                                        </span>
                                    </td>
                                </tr>
                                <?php
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

<!-- script -->

<script src="../assets/extensions/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="../assets/static/js/pages/datatables.js"></script>
<script>
    $(document).ready(function () {
        $("span[id^='statusBadge']").on('click', function () {
            var statusId = $(this).data('status-id');
            var pemesananId = $(this).data('pemesanan-id');
            updateStatus(statusId, pemesananId);
        });

        function updateStatus(statusId, pemesananId) {
            $.ajax({
                type: "POST",
                url: "./model/update-sp.php",
                data: {
                    statusId: statusId,
                    pemesananId: pemesananId
                },
                success: function (response) {
                    console.log(response);
                    $("span[data-pemesanan-id='" + pemesananId + "']").text(response);
                    updateBadgeColor(response, pemesananId);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        function updateBadgeColor(status, pemesananId) {
            var badgeClass = '';
            switch (status) {
                case 'menunggu':
                    badgeClass = 'badge bg-warning';
                    break;
                case 'diproses':
                    badgeClass = 'badge bg-primary';
                    break;
                case 'selesai':
                    badgeClass = 'badge bg-success';
                    break;
                case 'batal':
                    badgeClass = 'badge bg-danger';
                    break;
                default:
                    badgeClass = 'badge bg-secondary';
            }

            $("span[data-pemesanan-id='" + pemesananId + "']").removeClass().addClass(badgeClass);
        }
    });
</script>