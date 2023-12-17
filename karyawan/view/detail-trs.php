<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" id="Detailtr">
                        <a href="#/kasir" onclick="showKasirPrep()">
                            <button class="btn btn-primary">Kasir</button>
                        </a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Basic Tables start -->
<section class="section">
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <!-- <div class="card-header">
                    <h4 class="card-title">Pendapatan Hari Ini</h4>
                </div> -->
                <div class="card-content">
                    <div class="card-body">
                    <h4 class="card-title">Pendapatan Hari Ini</h4>

                    </div>
                    <!-- table bordered -->
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>id_kasir</th>
                                    <th>nama_barber</th>
                                    <th>totalharga</th>
                                    <th>Bayar</th>
                                    <th>Kembalian</th>
                                    <th>Tanggal</th>
                                    <th>nama_layanan</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>sub_total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require '../../config/koneksi.php';
                                $query = "SELECT A.*, (SELECT COUNT(id_kasir) FROM view_kasir WHERE id_kasir=A.id_kasir) AS jumlah 
                                FROM view_kasir A 
                                WHERE DATE(A.tanggal) = CURDATE() -- Filter berdasarkan tanggal hari ini
                                ORDER BY A.id_kasir";
                                $result = mysqli_query($koneksi, $query);
                                $id_kasir_before = null; // Untuk menyimpan id_kasir sebelumnya
                                
                                if (mysqli_num_rows($result) > 0) {
                                    foreach ($result as $row) {
                                        ?>
                                        <tr>
                                            <?php
                                            // Hanya tambahkan td dengan rowspan jika id_kasir berbeda dari sebelumnya
                                            if ($id_kasir_before != $row['id_kasir']) {
                                                echo '<td rowspan="' . $row['jumlah'] . '">';
                                                echo $row['id_kasir'];
                                                echo '</td>';

                                                // Tambahan rowspan untuk kolom nama_barber
                                                echo '<td rowspan="' . $row['jumlah'] . '">';
                                                echo $row['nama_barber'];
                                                echo '</td>';

                                                // Tambahan rowspan untuk kolom totalharga
                                                echo '<td rowspan="' . $row['jumlah'] . '">';
                                                echo $row['totalharga'];
                                                echo '</td>';

                                                // Tambahan rowspan untuk kolom bayar
                                                echo '<td rowspan="' . $row['jumlah'] . '">';
                                                echo $row['bayar'];
                                                echo '</td>';

                                                // Tambahan rowspan untuk kolom kembalian
                                                echo '<td rowspan="' . $row['jumlah'] . '">';
                                                echo $row['kembalian'];
                                                echo '</td>';

                                                // Tambahan rowspan untuk kolom tanggal
                                                echo '<td rowspan="' . $row['jumlah'] . '">';
                                                echo $row['tanggal'];
                                                echo '</td>';
                                            }
                                            ?>
                                            <td>
                                                <?php echo $row['nama_layanan']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['jumlah']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['harga']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['sub_total']; ?>
                                            </td>
                                        </tr>
                                        <?php
                                        $id_kasir_before = $row['id_kasir']; // Update id_kasir_before
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Basic Tables end -->

<!-- script -->
<!-- <script src="../assets/extensions/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="../assets/static/js/pages/datatables.js"></script> -->