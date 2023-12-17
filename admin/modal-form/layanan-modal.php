<!-- modal tambah Layanan -->
<div class="modal fade text-left" id="modalTambahLayanan" tabindex="-1" role="dialog"
    aria-labelledby="modalTambahLayanan" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalTambahLayanan">Tambah Layanan</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-circle"></i>
                </button>
            </div>
            <form id="tambahLayanan" method="post">
                <div class="modal-body">
                    <div class="alert alert-danger alert-dismissible show fade d-none" id="errorMessage">
                        Harap isi Semua Form
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <!-- <input type="hidden" name="id_layanan" id="id_layanan"> -->
                    <div class="form-group has-icon-left">
                        <label for="nama_layanan">Nama Layanan</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="masukkan nama Layanan"
                                id="nama_layanan" name="nama_layanan">
                            <div class="form-control-icon">
                                <i class="bi bi-menu-up"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group has-icon-left">
                        <label for="deskripsi_layanan">Deskripsi</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Tulis deskripsi bila perlu"
                                id="deskripsi_layanan" name="deskripsi_layanan">
                            <div class="form-control-icon">
                                <i class="bi bi-sticky"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group has-icon-left">
                        <label for="harga_layanan">Harga</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Masukkan Harga" id="harga_layanan"
                                name="harga_layanan">
                            <div class="form-control-icon">
                                <i class="bi bi-cash"></i>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-square-fill"></i>
                        <span>Batal</span>
                    </button>
                    <button type="submit" class="btn btn-primary ms-1">
                        <i class="bi bi-floppy2-fill"></i>
                        <span>Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal edit Layanan -->
<div class="modal fade text-left" id="modalEditLayanan" tabindex="-1" role="dialog" aria-labelledby="modalEditLayanan"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalEditLayanan">Tambah Layanan</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-circle"></i>
                </button>
            </div>
            <form action="#">
                <div class="modal-body">
                    <input type="hidden" name="id_layanan" id="id_layanan">
                    <div class="form-group has-icon-left">
                        <label for="nama_layanan">Nama Layanan</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="masukkan nama Layanan"
                                id="nama_layanan" name="nama_layanan">
                            <div class="form-control-icon">
                                <i class="bi bi-menu-up"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group has-icon-left">
                        <label for="deskripsi_layanan">Deskripsi</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Tulis deskripsi bila perlu"
                                id="deskripsi_layanan" name="deskripsi_layanan">
                            <div class="form-control-icon">
                                <i class="bi bi-sticky"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group has-icon-left">
                        <label for="harga_layanan">Harga</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Masukkan Harga" id="harga_layanan"
                                name="harga_layanan">
                            <div class="form-control-icon">
                                <i class="bi bi-cash"></i>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-square-fill"></i>
                        <span>Batal</span>
                    </button>
                    <button type="submit" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                        <i class="bi bi-floppy2-fill"></i>
                        <span>Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal view Layanan -->
<div class="modal fade text-left" id="modalViewLayanan" tabindex="-1" role="dialog" aria-labelledby="modalViewLayanan"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalViewLayanan">Tambah Layanan</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-circle"></i>
                </button>
            </div>
            <form action="#">
                <div class="modal-body">
                    <div class="form-group has-icon-left">
                        <label for="id_layanan">ID Layanan</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="masukkan nama Layanan" id="id_layanan"
                                name="id_layanan">
                            <div class="form-control-icon">
                                <i class="bi bi-card-text"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group has-icon-left">
                        <label for="nama_layanan">Nama Layanan</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="masukkan nama Layanan"
                                id="nama_layanan" name="nama_layanan">
                            <div class="form-control-icon">
                                <i class="bi bi-menu-up"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group has-icon-left">
                        <label for="deskripsi_layanan">Deskripsi</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Tulis deskripsi bila perlu"
                                id="deskripsi_layanan" name="deskripsi_layanan">
                            <div class="form-control-icon">
                                <i class="bi bi-sticky"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group has-icon-left">
                        <label for="harga_layanan">Harga</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Masukkan Harga" id="harga_layanan"
                                name="harga_layanan">
                            <div class="form-control-icon">
                                <i class="bi bi-cash"></i>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-square-fill"></i>
                        <span>Batal</span>
                    </button>
                    <button type="submit" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                        <i class="bi bi-floppy2-fill"></i>
                        <span>Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>