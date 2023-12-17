<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Pengeluaran</h3>
                <p class="text-subtitle text-muted"> </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pengeluaran</li>
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
                            <th>No</th>
                            <th>Keterangan</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require '../../config/koneksi.php';
                        $query = "select * from pengeluaran";
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
                                        <?php echo $row['ket_pengeluaran']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['harga']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['jumlah']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['tanggal']; ?>
                                    </td>
                                    <td>
                                        <button type="button" value="<?= $row['id_pengeluaran']; ?>"
                                            class="EditBtn btn btn-warning"><i class="bi bi-pencil-square"></i></button>
                                        <button type="button" value="<?= $row['id_pengeluaran']; ?>"
                                            class="deleteBtn btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                        <button type="button" value="<?= $row['id_pengeluaran']; ?>"
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

    <!-- modal tambah barber -->
    <div class="modal fade text-left" id="modalTambahBarber" tabindex="-1" role="dialog"
        aria-labelledby="modaladdbarber" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modaladdbarber">Catat Pengeluaran</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="bi bi-x-circle"></i>
                    </button>
                </div>
                <form action="#">
                    <div class="modal-body">
                        <div class="form-group has-icon-left">
                            <label for="ket_pengeluaran">Keterangan</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="masukkan keterangan"
                                    id="ket_pengeluaran">
                                <div class="form-control-icon">
                                    <i class="bi bi-sticky"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group has-icon-left">
                            <label for="hargaKeluar">Harga</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="masukkan harga pengeluaran"
                                    id="hargaKeluar">
                                <div class="form-control-icon">
                                    <i class="bi bi-cash"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group has-icon-left">
                            <label for="jumlahKeluar">Jumlah</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="jumlah" id="jumlahKeluar">
                                <div class="form-control-icon">
                                    <i class="bi bi-calculator"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group has-icon-left">
                            <label for="tanggalKeluar">Tanggal</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="tanggal" id="tanggalKeluar">
                                <div class="form-control-icon">
                                    <i class="bi bi-calendar2-check-fill"></i>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-x-square-fill"></i>
                            <span>Batal</span>
                        </button>
                        <button type="button" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                            <i class="bi bi-floppy2-fill"></i>
                            <span>Simpan</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Basic Tables end -->
<script src="../assets/extensions/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="../assets/static/js/pages/datatables.js"></script>