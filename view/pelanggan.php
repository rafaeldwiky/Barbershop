<div class="container-fluid">
    <div class="row">
        <div class="col-xl-1 col-md-6 mb-5">
            <div class="dropdown">
                <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    semua
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">semua</a></li>
                    <li><a class="dropdown-item" href="#">Hari ini</a></li>
                    <li><a class="dropdown-item" href="#">Bulan ini</a></li>
                    <li><a class="dropdown-item" href="#">Tahun ini</a></li>
                    <li><a class="dropdown-item" href="#">berdasar tanggal</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- tabel -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="table-secondary">No</th>
                            <th class="table-secondary">Id Pelanggan</th>
                            <th class="table-secondary">Id Pengguna</th>
                            <th class="table-secondary">Nama Pelanggan</th>
                            <th class="table-secondary">Nomor HP</th>
                            <th class="table-secondary">Email</th>
                            <th class="table-secondary">Username</th>
                            <th class="table-secondary">Password</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require '../config/koneksi.php';
                        $query = "select * from view_pelanggan";
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
                                        <?php echo $row['id_pelanggan']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['id_pengguna']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['nama']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['username']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['email']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['nohp']; ?>
                                    </td>
                                    <td>
                                        <?php echo str_repeat('*', strlen($row['password'])); ?>
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
</div>
<!-- Custom scripts for all pages-->
<script src="./assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="./vendor/datatables/jquery.dataTables.min.js"></script>
<script src="./vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="./assets/js/demo/datatables-demo.js"></script>