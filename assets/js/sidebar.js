$(document).ready(function () {
  $('#content').load('./view/home.php');

  if (!window.location.hash) {
      window.location.hash = "#home";
  }
});

function setActiveNavItem(navItemId) {
  var navItems = document.querySelectorAll('.nav-item');
  navItems.forEach(function (navItem) {
      navItem.classList.remove('active');
  });

  var selectedNavItem = document.getElementById(navItemId);
  if (selectedNavItem) {
      selectedNavItem.classList.add('active');
  }
}

function changePageTitle(title) {
  // console.log('Changing page title to:', title);
  document.getElementById('pageTitle').innerText = title;
}


function loadContent(url, navItemId, pageTitle) {
  $.ajax({
      url: url,
      method: "post",
      data: { record: 1 },
      success: function (data) {
          setActiveNavItem(navItemId);
          changePageTitle(pageTitle);

          $('#content').html(data);
      }
  });
}

function showMain() {
  loadContent("./view/home.php", "dashboard", "Dashboard");
  window.location.hash = "#home";
}

function showPelanggan() {
  loadContent("./view/pelanggan.php", "pelanggan", "Pelanggan");
  // window.location.hash = "#pelanggan";
}

function showKaryawan() {
  loadContent("./view/karyawan.php", "karyawan", "Karyawan");
}

function showCashflow() {
  loadContent("./view/cashflow.php", "cashflow", "Cashflow");
  // window.location.hash = "#cashflow";
}

function showLayanan() {
  loadContent("./view/layanan.php", "layanan", "Layanan");
}

function showBooking() {
  loadContent("./view/booking.php", "booking", "Booking");
}

function showKasir() {
  loadContent("./view/kasir.php", "kasir", "Kasir");
}

function showKalender() {
  // console.log('eror cuy kalenernya');
  loadContent("./view/calender.php", "kalender", "Kalender");
}