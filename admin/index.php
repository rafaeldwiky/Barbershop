<?php
include '../config/koneksi.php';
session_start();

if (!isset($_SESSION['id_penggunaamdin'])) {
    header("Location: ../auth/auth-login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sadimo Barbershop</title>

    <link rel="shortcut icon" href="../assets/static/images/logo/logo_kecil.png" type="image/x-icon">
    <link rel="shortcut icon" href="" type="image/png">

    <link rel="stylesheet" href="../assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="../assets/compiled/css/table-datatable-jquery.css">
    <link rel="stylesheet" href="../assets/extensions/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="../assets/compiled/css/extra-component-sweetalert.css">
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css"> -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> -->

    <link rel="stylesheet" href="../assets/compiled/css/app.css">
    <link rel="stylesheet" href="../assets/compiled/css/app-dark.css">
</head>

<body>
    <script src="../assets/static/js/initTheme.js"></script>
    <div id="app">
        <div id="sidebar">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <img src="../assets/static/images/logo/logo_kecil.png" alt="Logo" srcset="">
                        </div>
                        <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20"
                                height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                                <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                        opacity=".3"></path>
                                    <g transform="translate(-210 -1)">
                                        <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                        <circle cx="220.5" cy="11.5" r="4"></circle>
                                        <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                            <div class="form-check form-switch fs-6">
                                <input class="form-check-input  me-0" type="checkbox" id="toggle-dark"
                                    style="cursor: pointer">
                                <label class="form-check-label"></label>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20"
                                preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                                </path>
                            </svg>
                        </div>
                        <div class="sidebar-toggler  x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>

                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item active" id="dashboard">
                            <a href="#/dashboard" class='sidebar-link' onclick="showMain()">
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item" id="pelanggan">
                            <a href="#/pelanggan" class='sidebar-link' onclick="showPelanggan()">
                                <i class="bi bi-person-lock"></i>
                                <span>Pelanggan</span>
                            </a>
                        </li>

                        <li class="sidebar-item" id="karyawan">
                            <a href="#/karyawan" class='sidebar-link' onclick="showKaryawan()">
                                <i class="bi bi-scissors"></i>
                                <span>Karyawan</span>
                            </a>
                        </li>

                        <li class="sidebar-item has-sub" id="cashflow">
                            <a href="#/cashflow" class='sidebar-link'>
                                <i class="bi bi-wallet2"></i>
                                <span>Cashflow</span>
                            </a>

                            <ul class="submenu">
                                <li class="submenu-item" id="pendapatan">
                                    <a href="#/cashflow/pendapatan" class="submenu-link"
                                        onclick="showPendapatan()">Pendapatan</a>
                                </li>

                                <li class="submenu-item" id="pengeluaran">
                                    <a href="#/cashflow/pengeluaran" class="submenu-link"
                                        onclick="showPengeluaran()">Pengeluaran</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item" id="layanan">
                            <a href="#/layanan" class='sidebar-link' onclick="showLayanan()">
                                <i class="bi bi-receipt-cutoff"></i>
                                <span>Layanan</span>
                            </a>
                        </li>

                        <li class="sidebar-item" id="booking">
                            <a href="#/booking" class='sidebar-link' onclick="showBooking()">
                                <i class="bi bi-calendar2-check-fill"></i>
                                <span>Booking</span>
                            </a>
                        </li>

                        <li class="sidebar-item" id="kalender">
                            <a href="#/kalender" class='sidebar-link' onclick="showKalender()">
                                <i class="bi bi-calendar3"></i>
                                <span>Kalender</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- top bar -->

        <div id="main" class='layout-navbar navbar-fixed'>
            <header>
                <nav class="navbar navbar-expand navbar-light navbar-top">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-lg-0">
                                <li class="nav-item me-3">
                                    <a class="nav-link active text-gray-600" href="../index.php" target="_blank">
                                        <i class="bi bi-globe bi-sub fs-4"></i>
                                        <span class="text-lg">Lihat Website</span>
                                    </a>
                                </li>
                                <li class="nav-item dropdown me-3">
                                    <a class="nav-link active dropdown-toggle text-gray-600" href="#"
                                        data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                        <i class='bi bi-bell bi-sub fs-4'></i>
                                        <span class="badge badge-notification bg-danger">.</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end notification-dropdown"
                                        aria-labelledby="dropdownMenuButton">
                                        <li class="dropdown-header">
                                            <h6>Notifikasi</h6>
                                        </li>
                                        <li class="dropdown-item notification-item">
                                            <a class="d-flex align-items-center" href="#">
                                                <div class="notification-icon bg-success">
                                                    <i class="bi bi-file-earmark-check"></i>
                                                </div>
                                                <div class="notification-text ms-4">
                                                    <p class="notification-title font-bold">Homework submitted</p>
                                                    <p class="notification-subtitle font-thin text-sm">Algebra math
                                                        homework</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <p class="text-center py-2 mb-0"><a href="#">Lihat Semua Notifikasi!</a>
                                            </p>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3 mt-2">
                                            <h6 class="mb-0 text-gray-600">
                                                <?php echo $_SESSION['namaadmin']; ?>
                                            </h6>
                                        </div>
                                        <?php
                                        $id_pengguna = $_SESSION['id_penggunaamdin'];

                                        $query = "SELECT * FROM admin_barber WHERE id_pengguna = '$id_pengguna'";
                                        $result = mysqli_query($koneksi, $query);

                                        if ($result) {
                                            $row = mysqli_fetch_assoc($result);
                                            ?>
                                            <div class="user-img d-flex align-items-center">
                                                <div class="avatar avatar-md">
                                                    <img src="../upload/foto_admin/<?php echo $row['foto_admin']; ?>">
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                                    style="min-width: 11rem;">
                                    <li>
                                        <a class="dropdown-item" href="#/profile/admin-profile" id=""
                                            onclick="showAdmin()">
                                            <i class="icon-mid bi bi-person me-2"></i>Profile
                                        </a>
                                    </li>
                                    <li>
                                    <li>
                                        <a class="dropdown-item" href="#/setting" id="" onclick="showSetting()">
                                            <i class="icon-mid bi bi-gear me-2"></i>
                                            Settings
                                        </a>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                            data-bs-target="#logoutmodal"><i
                                                class="icon-mid bi bi-box-arrow-left me-2"></i>
                                            Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>

            <!-- ------------------------------- -->
            <div id="main-content">
            </div>
            <!-- ------------------------------- -->

        </div>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Tekan Logout untuk Keluar.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <a href="model/logout.php" class="btn btn-primary">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- script -->
    <script src="../assets/static/js/components/dark.js"></script>
    <script src="../assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/compiled/js/app.js"></script>
    <script src="../assets/extensions/jquery/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> -->
    <script src="../controller/sidebar.js"></script>
</body>

</html>