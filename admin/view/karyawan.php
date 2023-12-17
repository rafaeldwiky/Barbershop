<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Karyawan</h3>
                <p class="text-subtitle text-muted"> </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Karyawan</li>
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
                <div class="pb-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modalTambahBarber">
                        + Tambah Data
                    </button>
                </div>
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID Barber</th>
                            <th>Nama Barber</th>
                            <th>Nomor HP</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require '../../config/koneksi.php';

                        $query = "SELECT * FROM barber";
                        $query_run = mysqli_query($koneksi, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            $nomor = 1;
                            foreach ($query_run as $row) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $nomor; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['id_barber']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['nama_barber']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['nohp_barber']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['foto_barber']; ?>
                                    </td>
                                    <td>
                                        <button type="button" value="<?= $row['id_barber']; ?>"
                                            class="EditBtn btn btn-warning"><i class="bi bi-pencil-square"></i></button>
                                        <button type="button" value="<?= $row['id_barber']; ?>"
                                            class="deleteBtn btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                        <button type="button" value="<?= $row['id_barber']; ?>"
                                            class="viewBtn btn btn-primary"><i class="bi bi-eye-fill"></i></button>
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

    <?php
    include '../modal-form/karyawan-modal.php';
    ?>

</section>
<!-- Basic Tables end -->
<script src="../assets/extensions/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="../assets/static/js/pages/datatables.js"></script>