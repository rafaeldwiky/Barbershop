$(document).ready(function () {
  $('#main-content').load('view/dashboard.php');
  window.location.hash = "#/dashboard";

  // if (!window.location.hash) {
  // }
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

function loadContent(url, navItemId, dropItemid, dropItemid) {
  $.ajax({
      url: url,
      method: "post",
      data: { record: 1 },
      success: function (data) {
          setActiveNavItem(navItemId);
          dropdownitem(dropItemid);
          $('#main-content').html(data);
      }
  });
}
// dropdown
function dropdownitem(dropItemid) {
  var dropItems = document.querySelectorAll('.submenu-item');
  dropItems.forEach(function (dropitem) {
    dropitem.classList.remove('active');
  });

  var subSelect = document.getElementById(dropItemid);
  if (subSelect) {
      subSelect.classList.add('active');
  }
}

function loadContentsub(url, dropItemid, navItemId) {
  $.ajax({
      url: url,
      method: "post",
      data: { record: 1 },
      success: function (data) {
        dropdownitem(dropItemid);
        setActiveNavItem(navItemId);
          $('#main-content').html(data);
      }
  });
}

function showMain() {
  loadContent("view/dashboard.php", "dashboard");
  // window.location.hash = "#/dashboard";
}

function showPelanggan() {
  loadContent("view/pelanggan.php", "pelanggan");
}

function showKaryawan() {
  loadContent("view/karyawan.php", "karyawan");
}

function showPendapatan() {
  loadContentsub("view/pendapatan.php", "pendapatan", "cashflow");
}

function showPengeluaran() {
  loadContentsub("view/pengeluaran.php", "pengeluaran", "cashflow");
}

function showLayanan() {
  loadContent("view/layanan.php", "layanan");
}

function showBooking() {
  loadContent("view/booking.php", "booking");
}

function showKalender() {
  loadContent("view/calender.php", "kalender");
}

function showAdmin() {
  loadContent("view/admin-page.php", "");
}

function showSetting() {
  loadContent("view/setelan.php", "");
}