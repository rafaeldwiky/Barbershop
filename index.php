<?php
include 'config/koneksi.php';
session_start();

if (!isset($_SESSION['id_penggunaamdin'])) {
    header("Location: auth/login.php");
    exit();
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - Sadimo Barbershop</title>
    <link href="assets/img/logo_kecil.png" rel="icon">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/jquery-3.6.4.min.js">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <div class="sidebar-brand d-flex align-items-center justify-content-center">
                <img src="assets/img/logo_kecil.png" alt="logo_null">
                <div class="sidebar-brand-text mx-3">SADIMO ADMIN</div>
            </div>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Divider dengan warna putih dan ketebalan tertentu -->
            <hr class="custom-divider">




            <!-- sidebar -->
            <li class="nav-item active" id="dashboard">
                <a class="nav-link" href="#home" onclick="showMain()"><i class="fa-solid fa-gauge-high"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item" id="pelanggan">
                <a class="nav-link" href="#pelanggan" onclick="showPelanggan()"><i class="fa-solid fa-user-clock"></i>
                    <span>Pelanggan</span></a>
            </li>
            <li class="nav-item" id="karyawan">
                <a class="nav-link" href="#karyawan" onclick="showKaryawan()"><i class="fa-solid fa-user-tie"></i>
                    <span>Karyawan</span></a>
            </li>
            <li class="nav-item" id="cashflow">
                <a class="nav-link" href="#cashflow" onclick="showCashflow()"><i
                        class="fa-solid fa-money-bill-wave"></i>
                    <span>Cashflow</span></a>
            </li>
            <li class="nav-item" id="layanan">
                <a class="nav-link" href="#layanan" onclick="showLayanan()"><i class="fa-solid fa-clipboard-list"></i>
                    <span>layanan</span></a>
            </li>
            <li class="nav-item" id="booking">
                <a class="nav-link" href="#booking" onclick="showBooking()"><i class="fa-solid fa-calendar-plus"></i>
                    <span>Booking</span></a>
            </li>
            <li class="nav-item" id="kasir">
                <a class="nav-link" href="#kasir" onclick="showKasir()"><i class="fa-solid fa-cash-register"></i>
                    <span>Kasir</span></a>
            </li>
            <li class="nav-item" id="kalender">
                <a class="nav-link" href="#kalender" onclick="showKalender()"><i class="fa-solid fa-calendar-days"></i>
                    <span>Kalender</span></a>
            </li>
            <!-- sidebar -->


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- sidebar end -->

        <div id="content-wrapper" class="d-flex flex-column">
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar header -->
                <div class="d-flex align-items-center justify-content-between mb-9">
                    <h1 id="pageTitle" class="h3 mb-0 text-gray-800">Dashboard</h1>
                </div>
                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter">+</span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Notifikasi!
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-primary">
                                        <i class="fa-solid fa-calendar-plus text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">23 November 2023 23:29</div>
                                    <span class="font-weight-bold">Pelanggan dengan nama Andini melakukan Booking</span>
                                </div>
                            </a>
                        </div>
                    </li>


                    <!-- Nav Item - Alerts -->

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                <?php echo $_SESSION['namaadmin']; ?>
                            </span>
                            <img class="img-profile rounded-circle" src="assets/img/admin-profile.png">
                        </a>

                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a id="" class="dropdown-item" href="#admin" onclick="showAdmin()">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                account
                            </a>
                            <script>
                                function setActiveNavItem(navItemId) {
                                    var navItems = document.querySelectorAll('.nav-item');
                                    navItems.forEach(function (navItem) {
                                        navItem.classList.remove('active');
                                    });
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

                                function showAdmin() {
                                    loadContent("./view/admin.php", "", "Admin");
                                    // window.location.hash = "#home";
                                }
                            </script>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>

            <!-- Main Content -->
            <div id="content">
                <!-- tempat content -->
            </div>
            <!-- Main Content -->

        </div>

    </div>


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">yakin untuk Logout?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Klik "Logout" untuk keluar</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="auth/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages -->
    <script src="assets/js/sb-admin-2.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" src="assets/js/sidebar.js"></script>

    <!-- Page level plugins -->
    <!-- <script src="vendor/chart.js/Chart.min.js"></script> -->
    <!-- <script src="vendor/datatables/jquery.dataTables.min.js"></script> -->
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <!-- <script src="assets/js/demo/chart-area-demo.js"></script>
    <script src="assets/js/demo/chart-pie-demo.js"></script>
    <script src="assets/js/demo/datatables-demo.js"></script> -->


</body>

</html>