<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Layanan</h3>
                <p class="text-subtitle text-muted"> </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Layanan</li>
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
                        data-bs-target="#modalTambahLayanan">
                        + Tambah Data
                    </button>
                </div>
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>id layanan</th>
                            <th>nama layanan</th>
                            <th>deskripsi layanan</th>
                            <th>harga layanan</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require '../../config/koneksi.php';

                        $query = "SELECT * FROM layanan";
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
                                        <?php echo $row['id_layanan']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['nama_layanan']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['deskripsi_layanan']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['harga_layanan']; ?>
                                    </td>
                                    <td>
                                        <button type="button" value="<?= $row['id_layanan']; ?>"
                                            class="EditBtn btn btn-warning"><i class="bi bi-pencil-square"></i></button>
                                        <button type="button" value="<?= $row['id_layanan']; ?>"
                                            class="deleteBtn btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                        <button type="button" value="<?= $row['id_layanan']; ?>"
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
    <!-- Basic Tables end -->
</section>


<!-- modal tambah Layanan -->
<div class="modal fade text-left" id="modalTambahLayanan" tabindex="-1" role="dialog"
    aria-labelledby="modalTambahLayanan" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalTambahLayanan">Tambah Layanan</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-circle"></i>
                </button>
            </div>
            <form id="tambahLayanan">
                <div class="modal-body">
                    <!-- <div class="alert alert-danger alert-dismissible show fade d-none" id="errorMessage">
                        Harap isi Semua Form
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div> -->
                    <div id="errorMessage" class="alert alert-warning d-none"></div>

                    <div class="form-group has-icon-left">
                        <label for="">Nama Layanan</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="masukkan nama Layanan"
                                name="nama_layanan" id="nama_layanan">
                            <div class="form-control-icon">
                                <i class="bi bi-menu-up"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group has-icon-left">
                        <label for="">Deskripsi</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Tulis deskripsi bila perlu"
                                name="deskripsi_layanan" id="deskripsi_layanan">
                            <div class="form-control-icon">
                                <i class="bi bi-sticky"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group has-icon-left">
                        <label for="">Harga</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Masukkan Harga" name="harga_layanan"
                                id="harga_layanan">
                            <div class="form-control-icon">
                                <i class="bi bi-cash"></i>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-square-fill"></i>
                        <span>Batal</span>
                    </button>
                    <button type="submit" class="btn btn-primary ms-1">
                        <i class="bi bi-floppy2-fill"></i>
                        <span>Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- <script src="../assets/extensions/jquery/jquery.min.js"></script> -->
<!-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> -->
<!-- <script src="../assets/extensions/sweetalert2/sweetalert2.min.js"></script> -->
<!-- <script src="../assets/static/js/pages/sweetalert2.js"></script> -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->

<!-- <script src="../controller/layanan-control.js"></script> -->
<script src="../assets/extensions/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="../assets/static/js/pages/datatables.js"></script>

<script>
    $(document).on('submit', '#tambahLayanan', function (e) {
        e.preventDefault();

        var formData = new FormData(this);
        formData.append("simpan_layanan", true);

        $.ajax({
            type: "POST",
            url: "model/layanan-query.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {

                var res = jQuery.parseJSON(response);
                // var res = response;

                if (res.status == 422) {
                    $('#errorMessage').removeClass('d-none');
                    $('#errorMessage').text(res.message);

                } else if (res.status == 200) {

                    $('#errorMessage').addClass('d-none');
                    $('#modalTambahLayanan').modal('hide');
                    $('#tambahLayanan')[0].reset();

                    alertify.set('notifier', 'position', 'top-center');
                    alertify.success(res.message);

                    // $('#table1').load(location.href + "./view/layanan.php #table1");
                    $('#table1').load(location.href + " #table1");

                } else if (res.status == 500) {
                    alert(res.message);
                }
            }
        });
    });
</script>