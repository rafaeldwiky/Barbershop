<?php
include '../config/koneksi.php';
session_start();
?>

<div class="container-fluid">
    <!-- view admin profile used -->
    <div class="container py-2">
        <div class="row">
            <div class="col-lg-4">
                <div class="card shadow text-center p-5">
                    <div class="card-body">
                        <a href="#">
                            <img src="assets/img/admin-profile.png" alt="Profil Picture"
                                class="img img-thumbnail rounded-circle w-50"></a>
                        <h2>
                            <?php echo $_SESSION['nama']; ?>
                        </h2>
                        <button class="btn btn-success btn-sm">
                            <a id="gantiakun" href="#" style="color: white; text-decoration: none;">
                                <i class="fa-solid fa-camera-retro fa-sm fa-fw mr-2 text-white"></i>
                                ganti poto
                            </a>
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="shadow border rounded p-5 mb-5">
                    <h2>Informasi akun</h2>
                    <form>
                        <div class="row">
                            <div class="col-lg-6">
                                <?php
                                $id_pengguna = $_SESSION['id_pengguna'];

                                $query = "SELECT * FROM view_admindetail WHERE id_pengguna = '$id_pengguna'";
                                $result = mysqli_query($koneksi, $query);

                                if ($result) {
                                    $row = mysqli_fetch_assoc($result);
                                    ?>
                                    <div class="mb-3">
                                        <label for="inputIdAdmin" class="form-label">ID Admin</label>
                                        <input type="text" class="form-control" id="inputIdAdmin"
                                            value="<?php echo $row['id_admin']; ?>" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="inputIdPengguna" class="form-label">ID Pengguna</label>
                                        <input type="text" class="form-control" id="inputIdPengguna"
                                            value="<?php echo $row['id_pengguna']; ?>" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="inputNama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="inputNama"
                                            value="<?php echo $row['nama']; ?>" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="inputUsername" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="inputUsername"
                                            value="<?php echo $row['username']; ?>" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="inputEmail" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="inputEmail"
                                            value="<?php echo $row['email']; ?>" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="inputNomorHP" class="form-label">Nomor HP</label>
                                        <input type="text" class="form-control" id="inputNomorHP"
                                            value="<?php echo $row['nohp']; ?>" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="inputPassword" class="form-label">Password</label>
                                        <input type="text" class="form-control" id="inputPassword"
                                            value="<?php echo $row['password']; ?>" readonly>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </form>

                    <!-- <div class="d-flex justify-content-end pb-3">
                        <a href='#' class="btn btn-primary" data-toggle="modal" data-target="#tambahAdmin">+
                            Tambah admin
                        </a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="table-secondary">No.</th>
                            <th class="table-secondary">Id Admin</th>
                            <th class="table-secondary">Id Pengguna</th>
                            <th class="table-secondary">Username</th>
                            <th class="table-secondary">nama</th>
                            <th class="table-secondary">email</th>
                            <th class="table-secondary">nohp</th>
                            <th class="table-secondary">Password</th>
                            <th class="table-secondary">foto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $currentUserId = $_SESSION['id_pengguna'];

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
                                        // Menyembunyikan password jika bukan akun yang sedang login
                                        if ($row['id_pengguna'] == $currentUserId) {
                                            echo $row['password'];
                                        } else {
                                            echo str_repeat('*', strlen($row['password']));
                                        }
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
</div>
<!-- Custom scripts for all pages-->
<script src="./assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="./vendor/datatables/jquery.dataTables.min.js"></script>
<script src="./vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="./assets/js/demo/datatables-demo.js"></script>