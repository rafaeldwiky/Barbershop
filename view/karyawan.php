<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <div class="pb-3">
                    <a href='' class="btn btn-primary" data-toggle="modal" data-target="#insertbarbermodal">+ Tambah
                        Data</a>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="table-secondary">No.</th>
                            <th class="table-secondary">ID Barber</th>
                            <th class="table-secondary">Nama Barber</th>
                            <th class="table-secondary">Nomor HP</th>
                            <th class="table-secondary">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require '../config/koneksi.php';

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
                                        <button type="button" value="<?= $row['id_barber']; ?>"
                                            class="viewEditBtn btn btn-warning"><i
                                                class="fa-solid fa-pen-to-square"></i></button>
                                        <button type="button" value="<?= $row['id_barber']; ?>"
                                            class="deleteBtn btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
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
    <!-- tambah barber modal-->

    <div class="modal fade" id="insertbarbermodal" tabindex="-1" role="dialog" aria-labelledby="titleinsertbarber"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titleinsertbarber">Tambah Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form id="saveBarber">
                    <div class="modal-body">
                        <div id="errorMessage" class="alert alert-warning d-none"></div>
                        <div class="form-group">
                            <label for="">Nama Barber</label>
                            <input type="text" class="form-control" placeholder="masukkan nama barber"
                                name="nama_barber">
                        </div>
                        <div class="form-group">
                            <label for="">No Hp</label>
                            <input type="text" class="form-control" placeholder="masukkan nomor hp" name="nohp_barber">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" type="submit">Insert</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- edit barber modal -->
<div class="modal fade" id="editbarbermodal" tabindex="-1" role="dialog" aria-labelledby="titleeditbarber"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleeditbarber">Edit Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updateBarber">
                    <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>
                    <input type="hidden" name="id_barber" id="id_barber">
                    <div class="form-group">
                        <label for="">Nama Barber</label>
                        <input type="text" name="nama_barber" id="nama_barber" class="form-control"
                            placeholder="masukkan nama barber">
                    </div>
                    <div class="form-group">
                        <label for="">No Hp</label>
                        <input type="text" name="nohp_barber" id="nohp_barber" class="form-control"
                            placeholder="masukkan nomor hp">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script>
    $(document).on('submit', '#saveBarber', function (e) {
        e.preventDefault();

        var formData = new FormData(this);
        formData.append("save_barber", true);

        $.ajax({
            type: "POST",
            url: "./model/barber_query.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {

                var res = jQuery.parseJSON(response);
                if (res.status == 422) {
                    $('#errorMessage').removeClass('d-none');
                    $('#errorMessage').text(res.message);

                } else if (res.status == 200) {

                    $('#errorMessage').addClass('d-none');
                    $('#insertbarbermodal').modal('hide');
                    $('#saveBarber')[0].reset();

                    alertify.set('notifier', 'position', 'top-center');
                    alertify.success(res.message);


                    $('#dataTable').load('./view/karyawan.php #dataTable', function (response, status, xhr) {
                        if (status == 'error') {
                            console.error("Load Error: " + xhr.status + " " + xhr.statusText);
                        }
                    });

                } else if (res.status == 500) {
                    alert('Error: ' + res.message);
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error: " + status + "\nError Message: " + error);
            }
        });
    });
    $(document).on('click', '.viewEditBtn', function () {

        var id_barber = $(this).val();

        $.ajax({
            type: "GET",
            url: "./model/barber_query.php?id_barber=" + id_barber,
            success: function (response) {

                var res = jQuery.parseJSON(response);
                if (res.status == 404) {

                    alert(res.message);
                } else if (res.status == 200) {

                    $('#id_barber').val(res.data.id_barber);
                    $('#nama_barber').val(res.data.nama_barber);
                    $('#nohp_barber').val(res.data.nohp_barber);
                    $('#editbarbermodal').modal('show');
                }
            }
        });
    });

    $(document).on('submit', '#updateBarber', function (e) {
        e.preventDefault();

        var formData = new FormData(this);
        formData.append("update_barber", true);

        $.ajax({
            type: "POST",
            url: "./model/barber_query.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {

                var res = jQuery.parseJSON(response);
                if (res.status == 422) {
                    $('#errorMessageUpdate').removeClass('d-none');
                    $('#errorMessageUpdate').text(res.message);

                } else if (res.status == 200) {

                    $('#errorMessageUpdate').addClass('d-none');

                    alertify.set('notifier', 'position', 'top-center');
                    alertify.success(res.message);

                    $('#editbarbermodal').modal('hide');
                    $('#updateBarber')[0].reset();

                    $('#dataTable').load(location.href + "view/karyawan.php #dataTable");

                } else if (res.status == 500) {
                    alert(res.message);
                }
            }
        });
    });
    $(document).on('click', '.deleteBtn', function () {
        var id_barber = $(this).val();

        if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
            $.ajax({
                type: "POST",
                url: "./model/barber_query.php",
                data: { id_barber: id_barber, delete_barber: true },
                success: function (response) {
                    var res = jQuery.parseJSON(response);
                    if (res.status == 200) {
                        alertify.set('notifier', 'position', 'top-center');
                        alertify.success(res.message);

                        $('#dataTable').load(location.href + "view/karyawan.php #dataTable");
                    } else if (res.status == 500) {
                        alert(res.message);
                    }
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error: " + status + "\nError Message: " + error);
                }
            });
        }
    });

</script>
<!-- Custom scripts for all pages-->
<!-- <script src="../controller/barber_serv.js"></script> -->
<script src="./assets/js/sb-admin-2.min.js"></script>


<!-- Page level plugins -->
<script src="./vendor/datatables/jquery.dataTables.min.js"></script>
<script src="./vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="./assets/js/demo/datatables-demo.js"></script>
<!-- <script src="../assets/js/unload.js"></script> -->