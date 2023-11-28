<div class="container-fluid">
    <div class="card" style="margin-bottom: 20px;">
        <div class="card-body shadow" style="">
            <div class="" style="display: flex; width:fit-content; gap: 10px; ">
                <div class="" style="max-width: fit-content;">
                    <div class="dropdown">
                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false" id="dropdownMenuLink">
                            Semua
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#" onclick="dropdownChange(this)">Semua</a></li>
                            <li><a class="dropdown-item" href="#" onclick="dropdownChange(this)">Hari ini</a></li>
                            <li><a class="dropdown-item" href="#" onclick="dropdownChange(this)">Bulan ini</a></li>
                            <li><a class="dropdown-item" href="#" onclick="dropdownChange(this)">Tahun ini</a></li>
                            <li><a class="dropdown-item" href="#" onclick="dropdownChange(this)">tanggal custom</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <script>
                    function dropdownChange(clickedElement) {
                        var newText = clickedElement.textContent;
                        document.getElementById('dropdownMenuLink').innerText = newText;
                    }
                </script>

                <div class="" style="max-width: 170px;">
                    <!-- <label for="tanggalAwal" class="form-label">Tanggal Awal</label> -->
                    <input type="date" class="form-control" id="tanggalAwal" name="tanggalAwal">
                </div>
                <div class="" style="max-width: 170px;">
                    <!-- <label for="tanggalAkhir" class="form-label">Tanggal Akhir</label> -->
                    <input type="date" class="form-control" id="tanggalAkhir" name="tanggalAkhir">
                </div>
                <div class="" style="max-width: fit-content;">
                    <!-- <label class="invisible">Button</label> -->
                    <button type="button" class="btn btn-primary">Cari</button>
                </div>
            </div>
        </div>
    </div>

    <!-- new row -->
    <div class="row">
        <!-- card Pendapatan -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 py-2">
                <a href="#pendapatan" onclick="showCashflow()">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    pendapatan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp 350.000</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- card pelanggan -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 py-2">
                <a href="#pelanggan" id="pelangganLink" onclick="showPelanggan()">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    pelanggan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">39 pelanggan</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>


        <!-- card request booking -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 py-2">
                <a href="#booking" onclick="showBooking()">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    permintaan booking</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">7 permintaan</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-calendar-days fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- card pengeluaran -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 py-2">
                <a href="#pengeluaran" onclick="showCashflow()">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Pengeluaran</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">null</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-wallet fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">pendapatan keseluruhan</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Direct
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Social
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-info"></i> Referral
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="assets/js/demo/chart-area-demo.js"></script>
<script src="assets/js/demo/chart-pie-demo.js"></script>