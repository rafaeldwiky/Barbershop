<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Settings</h3>
                <p class="text-subtitle text-muted"> </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Settings</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Pengaturan Akses Booking</h4>
                </div>
                <div class="card-body">
                    <div class="form-check form-switch">
                        <label class="form-check-label" for="flexSwitchCheckChecked">Buka</label>
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="">
                        <div id="tglBukaDiv" style="display:none;">
                            <label for="tglBuka">Tanggal Buka Kembali:</label>
                            <input type="date" id="tglBuka" name="tglBuka" min="<?php echo date('Y-m-d'); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function () {
        var switchStatus = $("#flexSwitchCheckChecked").prop('checked');
        if (switchStatus) {
            $("#tglBukaDiv").hide();
        } else {
            $("#tglBukaDiv").show();
        }

        $("#flexSwitchCheckChecked").on('change', function () {
            if ($(this).is(':checked')) {
                // Switch ON
                $("#tglBukaDiv").hide();
                updateBookingStatus(1, null);
            } else {
                // Switch OFF
                $("#tglBukaDiv").show();
                updateBookingStatus(0, $("#tglBuka").val());
            }
        });

        function updateBookingStatus(buka_booking, tgl_closebooking) {
            // Kirim AJAX ke server untuk memperbarui status di database
            $.ajax({
                type: "POST",
                url: "./model/update_status.php", // Ganti dengan nama file PHP yang sesuai
                data: {
                    buka_booking: buka_booking,
                    tgl_closebooking: tgl_closebooking
                },
                success: function (response) {
                    console.log(response);
                    // Handle response jika diperlukan
                },
                error: function (error) {
                    console.log(error);
                    // Handle error jika diperlukan
                }
            });
        }
    });
</script>