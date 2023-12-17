$(document).on('submit', '#tambahLayanan', function (e) {
    e.preventDefault();

    var formData = new FormData(this);
    formData.append("simpan_layanan", true);

    $.ajax({
        type: "POST",
        url: "../model/layanan-query.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            var res = jQuery.parseJSON(response);

            if (res.status == 422) {
                Swal2.fire({
                    icon: "error",
                    title: "Error",
                    text: res.message
                });
            } else if (res.status == 200) {
                Swal2.fire({
                    icon: "success",
                    title: "Success",
                });

                setTimeout(function () {
                    $('#modalTambahLayanan').modal('hide');
                }, 1000);

                $('#tambahLayanan')[0].reset();
                loadData(); 
            } else if (res.status == 500) {
                Swal2.fire({
                    icon: "error",
                    title: "Error",
                    text: res.message
                });
            }
        },
        error: function () {
            Swal2.fire({
                icon: "error",
                title: "Error",
                text: "An unexpected error occurred."
            });
        }
    });
});

// $(document).on('click', '.viewEditBtn', function () {

//     var id_layanan = $(this).val();

//     $.ajax({
//         type: "GET",
//         url: "../model/layanan-query.php?id_layanan=" + id_layanan,
//         success: function (response) {

//             var res = jQuery.parseJSON(response);
//             if (res.status == 404) {

//                 alert(res.message);
//             } else if (res.status == 200) {

//                 $('#id_layanan').val(res.data.id_layanan);
//                 $('#nama_layanan').val(res.data.nama_layanan);
//                 $('#deskripsi_layanan').val(res.data.deskripsi_layanan);
//                 $('#harga_layanan').val(res.data.harga_layanan);
//                 $('#editbarbermodal').modal('show');
//             }
//         }
//     });
// });

// $(document).on('submit', '#updateBarber', function (e) {
//     e.preventDefault();

//     var formData = new FormData(this);
//     formData.append("update_layanan", true);

//     $.ajax({
//         type: "POST",
//         url: "../model/layanan-query.php",
//         data: formData,
//         processData: false,
//         contentType: false,
//         success: function (response) {

//             var res = jQuery.parseJSON(response);
//             if (res.status == 422) {
//                 $('#errorMessageUpdate').removeClass('d-none');
//                 $('#errorMessageUpdate').text(res.message);

//             } else if (res.status == 200) {

//                 $('#errorMessageUpdate').addClass('d-none');

//                 alertify.set('notifier', 'position', 'top-center');
//                 alertify.success(res.message);

//                 $('#editbarbermodal').modal('hide');
//                 $('#updateBarber')[0].reset();

//                 $('#dataTable').load(location.href + "view/layanan.php #dataTable");

//             } else if (res.status == 500) {
//                 alert(res.message);
//             }
//         }
//     });
// });
// $(document).on('click', '.deleteBtn', function () {
//     var id_barber = $(this).val();

//     if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
//         $.ajax({
//             type: "POST",
//             url: "../model/layanan-query.php",
//             data: { id_layanan: id_layanan, delete_layanan: true },
//             success: function (response) {
//                 var res = jQuery.parseJSON(response);
//                 if (res.status == 200) {
//                     alertify.set('notifier', 'position', 'top-center');
//                     alertify.success(res.message);

//                     $('#dataTable').load(location.href + "view/layanan.php #dataTable");
//                 } else if (res.status == 500) {
//                     alert(res.message);
//                 }
//             },
//             error: function (xhr, status, error) {
//                 console.error("AJAX Error: " + status + "\nError Message: " + error);
//             }
//         });
//     }
// });