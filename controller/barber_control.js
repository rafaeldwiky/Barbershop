$(document).on('submit', '#saveBarber', function (e) {
  e.preventDefault();

  var formData = new FormData(this);
  formData.append("save_barber", true);

  $.ajax({
      type: "POST",
      url: "../model/barber_query.php",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
          
          var res = jQuery.parseJSON(response);
          if(res.status == 422) {
              $('#errorMessage').removeClass('d-none');
              $('#errorMessage').text(res.message);

          } else if(res.status == 200){

              $('#errorMessage').addClass('d-none');
              $('#insertbarbermodal').modal('hide');
              $('#saveBarber')[0].reset();

              alertify.set('notifier','position', 'top-right');
              alertify.success(res.message);

              $('#dataTable').load(location.href + " #dataTable");

          } else if(res.status == 500) {
              alert('Error: ' + res.message);
          }
      },
      error: function (xhr, status, error) {
          console.error("AJAX Error: " + status + "\nError Message: " + error);
      }
  });
});


$(document).on('click', '.editStudentBtn', function () {

  var id_barber = $(this).val();
  
  $.ajax({
      type: "GET",
      url: "../model/barber_query.php?id_barber=" + id_barber,
      success: function (response) {

          var res = jQuery.parseJSON(response);
          if(res.status == 404) {

              alert(res.message);
          } else if(res.status == 200){

              // Assuming your PHP response has data fields named id_barber, nama_barber, and nohp_barber
              $('#student_id').val(res.data.id_barber);
              $('#name').val(res.data.nama_barber);
              $('#phone').val(res.data.nohp_barber);

              $('#studentEditModal').modal('show');
          }
      }
  });
});

$(document).on('submit', '#updateStudent', function (e) {
  e.preventDefault();

  var formData = new FormData(this);
  formData.append("update_student", true);

  $.ajax({
      type: "POST",
      url: "../model/barber_query.php",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
          
          var res = jQuery.parseJSON(response);
          if(res.status == 422) {
              $('#errorMessageUpdate').removeClass('d-none');
              $('#errorMessageUpdate').text(res.message);

          } else if(res.status == 200){

              $('#errorMessageUpdate').addClass('d-none');

              alertify.set('notifier','position', 'top-right');
              alertify.success(res.message);
              
              $('#studentEditModal').modal('hide');
              $('#updateStudent')[0].reset();

              $('#myTable').load(location.href + " #myTable");

          } else if(res.status == 500) {
              alert(res.message);
          }
      }
  });
});

// The rest of your code remains unchanged
