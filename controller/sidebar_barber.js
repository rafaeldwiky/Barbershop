$(document).ready(function () {
    $('#main-content').load('view/kasir.php');
    window.location.hash = "#/kasir";
  });
  
  function setActiveNavItem(navItemId) {
    var navItems = document.querySelectorAll('.sidebar-item');
    navItems.forEach(function (navItem) {
        navItem.classList.remove('active');
    });
  
    var selectedNavItem = document.getElementById(navItemId);
    if (selectedNavItem) {
        selectedNavItem.classList.add('active');
    }
  }
  
  function loadContent(url, navItemId) {
    $.ajax({
        url: url,
        method: "post",
        data: { record: 1 },
        success: function (data) {
            setActiveNavItem(navItemId);
            $('#main-content').html(data);
        }
    });
  }
  
  function showKasir() {
    loadContent("view/kasir.php", "kasir");
  }

  function showKasirPrep() {
    $.ajax({
        url: 'view/kasir.php',
        method: "post",
        success: function (response) {
            $('#main-content').html(response);
        },
        error: function (xhr, status, error) {
            console.error('Error loading detail page:', status, error);
        }
    });
}
function showDetailtrs() {
  clearInterval(intervalId);

  $.ajax({
      url: 'view/detail-trs.php',
      method: "post",
      success: function (response) {
          $('#main-content').html(response);
      },
      error: function (xhr, status, error) {
          console.error('Error loading detail page:', status, error);
      }
  });
}
  
  function showBooking() {
    loadContent("view/booking.php", "booking");
    clearInterval(intervalId);

  }
  function cleanUpInterval() {
    clearInterval(intervalId);
}
window.addEventListener('beforeunload', cleanUpInterval);