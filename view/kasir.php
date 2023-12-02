<?php
include '../config/koneksi.php';
?>
<div class="container-fluid">
  <div class="col-lm-4">
    <div class="card card-primary mb-3">
      <div class="card-header bg-primary text-white">
        <div class="d-flex justify-content-between align-items-center">
          <h5><i class="fa fa-search"></i> Layanan</h5>
          <div class="dropdown ml-auto">
            <button class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
              aria-expanded="false" id="dropdownMenuLink">
              Nama Barber
            </button>

            <?php
            $query = "SELECT nama_barber FROM barber";
            $result = mysqli_query($koneksi, $query);

            if (mysqli_num_rows($result) > 0) {
              ?>
              <ul class="dropdown-menu">
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                  $nama_barber = $row["nama_barber"];
                  ?>
                  <li><a class="dropdown-item" href="#" onclick="dropdownChange(this)">
                      <?php echo $row['nama_barber']; ?>
                    </a></li>
                  <?php
                }
                ?>
                </select>
                <?php
            } else {
              echo "Tidak ada layanan yang ditemukan.";
            }
            ?>
            </ul>

          </div>
        </div>
      </div>

      <table class="table table-bordered w-100" border="2">
        <thead>
          <tr>
            <td>Nama Layanan</td>
            <td>Harga Layanan</td>
            <td>Pilih</td>
          </tr>
        </thead>
        <tbody>
          <?php
          include '../config/koneksi.php';
          $showLayanan = mysqli_query($koneksi, "SELECT * FROM layanan");
          while ($layanan = mysqli_fetch_array($showLayanan)) {

            ?>

            <tr>
              <td>
                <?php echo $layanan['nama_layanan']; ?>
              </td>
              <td>
                <?php echo $layanan['harga_layanan']; ?>
              </td>
              <td>
                <button class="btn btn-primary"
                  onclick="tambahKeKeranjang('<?php echo $layanan["id_layanan"]; ?>', '<?php echo $layanan["nama_layanan"]; ?>', '<?php echo $layanan["harga_layanan"]; ?>')">Pilih</button>
              </td>
            </tr>

            <?php
          }

          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!--Keranjang-->
<div class="col-sm-12">
  <div class="card card-primary">
    <div class="card-header bg-primary text-white">
      <div class="row">
        <div class="col">
          <h5><i class="fa fa-shopping-cart"></i>KASIR</h5>
        </div>
      </div>
    </div>
    <form action="kasir.php" method="post">
      <div class="card-body">
        <div id="keranjang" class="table-responsive">
          <table class="table table-bordered">
            <tr>
              <td><b>Tanggal</b></td>
              <td>
                <input type="hidden" readonly="readonly" class="form-control bg-secondary bg-opacity-25"
                  value="<?php echo date("Y-m-d"); ?>" name="tgl">
                <?php echo date("j F Y"); ?>
              </td>
            </tr>
          </table>
          <table class="table table-bordered w-100" border="2" id="example1">
            <thead>
              <tr>
                <td> Nama Barang</td>
                <td> Harga</td>
                <td style="width:10%;"> Jumlah</td>
                <td style="width:20%;"> SubTotal</td>
                <td style="width:13%;"> Aksi</td>
              </tr>
            </thead>
            <tbody>
              <!-- list item -->
            </tbody>
          </table>
        </div>
        <div class="justify-content-end">
          <table class="row table table-bordered">
            <tr>
              <td><b>Total</b></td>

              <td class="col-8" id="total-keseluruhan-text">
                <!-- Rp0 -->
                <input type="hidden" id="total-keseluruhan-input" name="totalKeseluruhan" value="">
                <span id="total-keseluruhan-text">Rp0</span>
              </td>
            </tr>
            <tr>
              <td><b>Bayar</b></td>
              <td><input id="inputPembayaran" type="number" min='1' value='' onchange="hitungKembalian()"></td>
            </tr>
            <tr>
              <td><b>Kembalian</b></td>
              <td class="col-8" id="uang-kembalian">
                <input type="hidden" id="inputKembalian" name="kembalian" value="">
                <span id="kembalianText">Rp0</span>
              </td>
            </tr>
          </table>
        </div>
        <button class="btn btn-primary mb-3 float-left" onclick="kirimData()"
          style="width: 8rem;"><b>Proses</b></button>
      </div>
    </form>
  </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<!-- <script src="vendor/chart.js/Chart.min.js"></script> -->

<!-- Page level custom scripts -->
<!-- <script src="js/demo/chart-area-demo.js"></script>
< src="js/demo/chart-pie-demo.js"></script> -->

<!-- script kasir -->
<script>
  // Variabel untuk menyimpan layanan di keranjang
  var keranjang = [];

  // Fungsi untuk menambahkan layanan ke keranjang
  function tambahKeKeranjang(id, nama, harga) {
    // Cek apakah layanan sudah ada di keranjang
    var item = keranjang.find(function (item) {
      return item.id === id;
    });

    // Jika sudah ada, tambahkan jumlah dan update subtotal
    if (item) {
      item.jumlah++;
      item.subtotal = item.harga * item.jumlah;
    } else {
      // Jika belum ada, tambahkan layanan ke keranjang
      keranjang.push({
        id: id,
        nama: nama,
        harga: harga,
        jumlah: 1, // Jumlah awal
        subtotal: harga // Subtotal awal
      });
    }

    // Panggil fungsi untuk update tampilan keranjang
    updateTampilanKeranjang();
  }

  // Fungsi untuk mengupdate tampilan keranjang
  function updateTampilanKeranjang() {
    var tableBody = document.getElementById("example1").getElementsByTagName('tbody')[0];
    tableBody.innerHTML = ""; // Mengosongkan isi tabel

    // Loop melalui layanan di keranjang
    keranjang.forEach(function (item) {
      var newRow = tableBody.insertRow(tableBody.rows.length);

      newRow.insertCell(0).innerHTML = item.nama;
      newRow.insertCell(1).innerHTML = item.harga;
      newRow.insertCell(2).innerHTML = '<input type="number" min="1" value="' + item.jumlah + '" class="form-control jumlah-layanan" onchange="hitungSubtotal(this); updateTotalKeseluruhan();">';
      newRow.insertCell(3).innerHTML = item.subtotal;
      newRow.insertCell(4).innerHTML = '<button class="btn btn-danger btn-sm" onclick="hapusBaris(this); updateTotalKeseluruhan();">Hapus</button>';
    });

    // Panggil fungsi untuk update total keseluruhan
    updateTotalKeseluruhan();
  }

  // Fungsi untuk menghitung subtotal
  function hitungSubtotal(input) {
    var row = input.parentNode.parentNode;
    var index = row.rowIndex - 1; // Index pada array keranjang

    keranjang[index].jumlah = parseInt(input.value);
    keranjang[index].subtotal = keranjang[index].harga * keranjang[index].jumlah;

    // Panggil fungsi untuk update tampilan keranjang
    updateTampilanKeranjang();
  }

  // Fungsi untuk menghapus baris dari keranjang
  function hapusBaris(button) {
    var row = button.parentNode.parentNode;
    var index = row.rowIndex - 1; // Index pada array keranjang

    keranjang.splice(index, 1); // Hapus layanan dari array

    // Panggil fungsi untuk update tampilan keranjang
    updateTampilanKeranjang();
  }

  function hitungTotalKeseluruhan() {
    var table = document.getElementById("example1").getElementsByTagName('tbody')[0];
    var total = 0;

    // Iterasi melalui setiap baris dan tambahkan subtotal ke total keseluruhan
    for (var i = 0; i < table.rows.length; i++) {
      var subtotal = parseFloat(table.rows[i].cells[3].innerHTML);
      total += subtotal;
    }

    return total;
  }

  function updateTotalKeseluruhan() {
    // Hitung total keseluruhan
    var totalKeseluruhan = hitungTotalKeseluruhan();

    // Tampilkan total keseluruhan pada span
    var totalText = document.getElementById("total-keseluruhan-text");
    totalText.textContent = "Rp" + totalKeseluruhan.toLocaleString();

    // Update value of hidden input
    var totalInput = document.getElementById("total-keseluruhan-input");
    totalInput.value = totalKeseluruhan;
  }

  // Mendengarkan perubahan pada input pembayaran
  document.getElementById('inputPembayaran').addEventListener('input', function () {
    hitungKembalian();
  });

  // Fungsi untuk menghitung kembalian
  function hitungKembalian() {
    var totalKeseluruhan = parseFloat(document.getElementById('total-keseluruhan-text').innerText.replace('Rp', '').replace(',', ''));
    var pembayaran = parseFloat(document.getElementById('inputPembayaran').value);
    var kembalian = pembayaran - totalKeseluruhan;

    // Tampilkan kembalian pada elemen dengan ID 'kembalianText'
    document.getElementById('kembalianText').innerText = "Rp" + kembalian.toLocaleString();

    // Set nilai input kembalian (yang tersembunyi)
    document.getElementById('inputKembalian').value = kembalian;

    // Update total keseluruhan setelah menghitung kembalian
    updateTotalKeseluruhan();
  }

  // Fungsi untuk mengirim data ke server
  function kirimData() {
    var ids = [];
    var jumlahLayanan = [];

    // Mengambil nilai dari semua input id dan jumlah-layanan di dalam form
    $("#myForm input[name='ids[id][]']").each(function () {
      ids.push($(this).val());
    });

    $("#myForm input[name='jumlah-layanan']").each(function () {
      jumlahLayanan.push($(this).val());
    });

    // Kirim data ke server menggunakan jQuery
    $.ajax({
      type: "POST",
      url: "kasir.php",
      data: {
        ids: ids,
        jumlahLayanan: jumlahLayanan
      },
      success: function (response) {
        // Tampilkan respons dari server jika diperlukan
        console.log(response);
      }
    });
  }
</script>