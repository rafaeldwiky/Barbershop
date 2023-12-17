<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Kasir</h3>
                <p class="text-subtitle text-muted"> </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" id="kasirTrs">
                            <a href="#/kasir/catatan-transaksi=hariIni" onclick="showDetailtrs()">
                                <button class="btn btn-primary">Transaksi</button>
                            </a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<section id="basic-horizontal-layouts" class="tempek">
    <div class="row match-height">
        <div class="col-md-7 col-12">
            <div class="row" id="table-striped">
                <!-- <div class="col-8"> -->
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="buttons">
                                <a href="#" class="btn btn-primary rounded-pill"
                                    style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px;">Tambah</a>
                            </div>
                        </div>
                        <!-- table striped -->
                        <div class="table-responsive">
                            <table class="table table-striped mb-2">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Layanan</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Harga Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <select class="form-select" id="basicSelect">
                                                <option>Nama Layanan</option>
                                            </select>
                                        </td>
                                        <td>harga_layanan</td>
                                        <td>
                                            <input type="number" class="form-control" min="1" style="width: 35%">
                                        </td>
                                        <td>total_harga</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </div>

        <div class="col-md-5 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-1">
                                <div class="form-group">
                                    <h6>Time</h6>
                                    <input type="text" class="form-control" id="basicInput" disabled="">
                                </div>
                            </div>
                            <div class="col-md-6 mb-1">
                                <h6>Barber</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="basicSelect">
                                        <?php
                                        require '../../config/koneksi.php';

                                        $query = "SELECT * FROM barber";
                                        $query_run = mysqli_query($koneksi, $query);

                                        if (mysqli_num_rows($query_run) > 0) {
                                            foreach ($query_run as $row) {
                                                ?>
                                                <option>
                                                    <?php echo $row['nama_barber']; ?>
                                                </option>
                                                <?php
                                            }
                                        } ?>
                                    </select>
                                </fieldset>
                            </div>

                            <form class="form form-horizontal">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4 mt-5">
                                            <label for="totalHarga">Total Harga</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="totalHarga" class="form-control" name="totalHarga"
                                                style="font-size: 4rem; font-weight: ;" disabled="">
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label for="bayarPlg">Bayar</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="bayarPlg" class="form-control" name="bayarPlg">
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label for="KembalianPlg">Kembalian</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="KembalianPlg" class="form-control"
                                                name="KembalianPlg">
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                            <button type="reset"
                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    var intervalId;

    function setIndonesiaDateTime() {
        var now = moment().format('DD-MM-YYYY HH:mm:ss');
        document.getElementById('basicInput').value = now;
    }
    setIndonesiaDateTime();
    intervalId = setInterval(function () {
        setIndonesiaDateTime();
    }, 1000);
</script>

<!-- </section> -->