$(document).on('submit', '#saveBarber', function (e) {
    e.preventDefault();

    var formData = new FormData(this);
    formData.append("addKaryawan", true);

    $.ajax({
        type: "POST",
        url: "../model/karyawan-query.php",
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