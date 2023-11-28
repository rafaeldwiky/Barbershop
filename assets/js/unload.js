// ajax_functions.js

$(document).ready(function () {
    function loadBarberData() {
        $.ajax({
            type: 'GET',
            url: '../view/karyawan.php',
            data: { action: 'read' },
            dataType: 'html',
            success: function (response) {
                $('#daftarBarber').html(response);
            }
        });
    }

    $('#btnTambahBarber').on('click', function () {
        var namaBarber = $('#nama_barber').val();
        var nohpBarber = $('#nohp_barber').val();

        $.ajax({
            type: 'POST',
            url: '../model/insert_barber.php',
            data: {
                action: 'tambah',
                nama_barber: namaBarber,
                nohp_barber: nohpBarber
            },
            success: function (response) {
                // Proses respons atau perbarui UI
                alert(response);
                // Panggil kembali fungsi loadBarberData untuk menampilkan data terbaru setelah penambahan
                loadBarberData();
            }
        });
    });

    $('#btnUpdateBarber').on('click', function () {
        var editIdBarber = $('#edit_id_barber').val();
        var editNamaBarber = $('#edit_nama_barber').val();
        var editNohpBarber = $('#edit_nohp_barber').val();

        $.ajax({
            type: 'POST',
            url: 'ajax_barber.php',
            data: {
                action: 'update',
                id_barber: editIdBarber,
                nama_barber: editNamaBarber,
                nohp_barber: editNohpBarber
            },
            success: function (response) {
                // Proses respons atau perbarui UI
                alert(response);
                // Panggil kembali fungsi loadBarberData untuk menampilkan data terbaru setelah update
                loadBarberData();
            }
        });
    });

    $('.btnDeleteBarber').on('click', function () {
        var deleteIdBarber = $(this).data('id-barber');

        $.ajax({
            type: 'POST',
            url: 'ajax_barber.php',
            data: {
                action: 'delete',
                id_barber: deleteIdBarber
            },
            success: function (response) {
                // Proses respons atau perbarui UI
                alert(response);
                // Panggil kembali fungsi loadBarberData untuk menampilkan data terbaru setelah penghapusan
                loadBarberData();
            }
        });
    });

    // Panggil fungsi loadBarberData saat halaman dimuat
    loadBarberData();
});
