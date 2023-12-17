<?php
include '../../config/koneksi.php';
session_start();
?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Profil Akun</h3>
                <p class="text-subtitle text-muted"> </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<section class="section">
    <div class="row">
        <div class="col-12 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-center align-items-center flex-column">
                        <?php
                        $id_pengguna = $_SESSION['id_penggunaamdin'];

                        $query = "SELECT * FROM admin_barber WHERE id_pengguna = '$id_pengguna'";
                        $result = mysqli_query($koneksi, $query);

                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            ?>
                            <div class="avatar avatar-2xl">
                                <img src="../upload/foto_admin/<?php echo $row['foto_admin']; ?>" alt="Avatar">
                            </div>
                            <?php
                        }
                        ?>
                        <h3 class="mt-3">
                            <?php echo $_SESSION['namaadmin']; ?>
                        </h3>
                        <button class="btn btn-primary" type="file">Ganti Profile</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form action="#" method="get">
                        <?php
                        $id_pengguna = $_SESSION['id_penggunaamdin'];

                        $query = "SELECT * FROM view_admindetail WHERE id_pengguna = '$id_pengguna'";
                        $result = mysqli_query($koneksi, $query);

                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            ?>
                            <div class="form-group has-icon-left">
                                <label for="name" class="form-label">Id Admin</label>
                                <div class="position-relative">
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="<?php echo $row['id_admin']; ?>">
                                    <div class="form-control-icon">
                                        <i class="bi bi-person-fill-exclamation"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group has-icon-left">
                                <label for="name" class="form-label">Id Pengguna</label>
                                <div class="position-relative">
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="<?php echo $row['id_pengguna']; ?>">
                                    <div class="form-control-icon">
                                        <i class="bi bi-person-fill"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group has-icon-left">
                                <label for="name" class="form-label">Nama</label>
                                <div class="position-relative">
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="<?php echo $row['nama']; ?>">
                                    <div class="form-control-icon">
                                        <i class="bi bi-person-badge-fill"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group has-icon-left">
                                <label for="name" class="form-label">Username</label>
                                <div class="position-relative">
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="<?php echo $row['username']; ?>">
                                    <div class="form-control-icon">
                                        <i class="bi bi-person-vcard-fill"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group has-icon-left">
                                <label for="name" class="form-label">Email</label>
                                <div class="position-relative">
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="<?php echo $row['email']; ?>">
                                    <div class="form-control-icon">
                                        <i class="bi bi-envelope-at"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group has-icon-left">
                                <label for="name" class="form-label">No. Hp</label>
                                <div class="position-relative">
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="<?php echo $row['nohp']; ?>">
                                    <div class="form-control-icon">
                                        <i class="bi bi-phone"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group has-icon-left">
                                <label for="name" class="form-label">Password</label>
                                <div class="position-relative">
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="<?php echo $row['password']; ?>">
                                    <div class="form-control-icon">
                                        <i class="bi bi-lock-fill"></i>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="card">
        <div class="card-body">
            <h3>Data Admin Lain</h3>
            <div class="table-responsive">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Id Admin</th>
                            <th>Id Pengguna</th>
                            <th>Username</th>
                            <th>nama</th>
                            <th>email</th>
                            <th>nohp</th>
                            <th>Password</th>
                            <th>foto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // $currentUserId = $_SESSION['id_penggunaamdin'];
                        require '../../config/koneksi.php';
                        $query = "SELECT * FROM view_admindetail";
                        $query_run = mysqli_query($koneksi, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            $nomor = 1;
                            foreach ($query_run as $row) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $nomor; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['id_admin']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['id_pengguna']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['username']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['nama']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['email']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['nohp']; ?>
                                    </td>
                                    <td>
                                        <?php
                                        // if ($row['id_pengguna'] == $currentUserId) {
                                        //     echo $row['password'];
                                        // } else {
                                        //     echo str_repeat('*', strlen($row['password']));
                                        // }
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $row['foto_admin']; ?>
                                    </td>
                                </tr>
                                <?php
                                $nomor++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</section>
<!-- Basic Tables end -->
<script src="../assets/extensions/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="../assets/static/js/pages/datatables.js"></script>