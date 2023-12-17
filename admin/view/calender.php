<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Kalender</h3>
                <p class="text-subtitle text-muted"> </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kalender</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<?php
include '../../config/koneksi.php';

$schedules = $koneksi->query("SELECT * FROM barber_status");
$sched_res = [];

foreach ($schedules->fetch_all(MYSQLI_ASSOC) as $row) {
    $row['tanggal_awal'] = date("F d, Y h:i A", strtotime($row['tanggal_awal']));
    $row['tanggal_akhir'] = date("F d, Y h:i A", strtotime($row['tanggal_akhir']));
    $sched_res[$row['id_barber']] = $row;
}

if (isset($koneksi))
    $koneksi->close();
?>
<section>
    <div class="row">
        <div class="col-12 col-lg-8">
            <div id="calendar"></div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card rounded-0 shadow">
                <div class="card-header bg-solid bg-primary text-light">
                    <h5 class="card-title">Atur Jadwal</h5>
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <form action="model/save_cuti.php" method="post" id="schedule-form" autocomplete="off">
                            <input type="hidden" name="id_barber" value="">

                            <div class="form-group mb-2">
                                <label for="keterangan" class="control-label">keterangan</label>
                                <input type="text" class="form-control form-control-sm rounded-0" name="keterangan"
                                    id="keterangan" required>
                            </div>

                            <div class="form-group mb-2">
                                <label for="deskripsi" class="control-label">Deskripsi</label>
                                <textarea rows="3" class="form-control form-control-sm rounded-0" name="deskripsi"
                                    id="deskripsi" required></textarea>
                            </div>

                            <div class="form-group mb-2">
                                <label for="tanggal_awal" class="control-label">tanggal awal</label>
                                <input type="datetime-local" class="form-control form-control-sm rounded-0"
                                    name="tanggal_awal" id="tanggal_awal" required>
                            </div>

                            <div class="form-group mb-2">
                                <label for="tanggal_akhir" class="control-label">tanggal akhir</label>
                                <input type="datetime-local" class="form-control form-control-sm rounded-0"
                                    name="tanggal_akhir" id="tanggal_akhir" required>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-center">
                        <button class="btn btn-primary btn-sm rounded-0" type="submit" form="schedule-form"><i
                                class="fa fa-save"></i> Simpan</button>
                        <button class="btn btn-default border btn-sm rounded-0" type="reset" form="schedule-form"><i
                                class="fa fa-reset"></i> Batal</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Event Details Modal -->
<div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0">
            <div class="modal-header rounded-0">
                <h5 class="modal-title">Jadwal Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body rounded-0">
                <div class="container-fluid">
                    <dl>
                        <dt class="text-muted">keterangan</dt>
                        <dd id="title" class="fw-bold fs-4"></dd>
                        <dt class="text-muted">deskripsi</dt>
                        <dd id="description" class=""></dd>
                        <dt class="text-muted">tanggal_awal</dt>
                        <dd id="start" class=""></dd>
                        <dt class="text-muted">tanggal_akhir</dt>
                        <dd id="end" class=""></dd>
                    </dl>
                </div>
            </div>
            <div class="modal-footer rounded-0">
                <div class="text-end">
                    <button type="button" class="btn btn-primary btn-sm rounded-0" id="edit" data-id="">Edit</button>
                    <button type="button" class="btn btn-danger btn-sm rounded-0" id="delete" data-id="">Hapus</button>
                    <button type="button" class="btn btn-secondary btn-sm rounded-0"
                        data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script> -->
<script src="./controller/calendar_script.js"></script>
<script>
    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
</script>