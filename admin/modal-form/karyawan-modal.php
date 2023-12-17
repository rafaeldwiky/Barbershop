<!-- modal tambah barber -->
<div class="modal fade text-left" id="modalTambahBarber" tabindex="-1" role="dialog" aria-labelledby="modaladdbarber"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modaladdbarber">Tambah Karyawan</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-circle"></i>
                </button>
            </div>
            <form action="#" id="tambahKaryawan">
                <div class="modal-body">

                    <div>
                        <input type="hidden" name="id_barber" id="id_barber">
                    </div>

                    <div class="form-group has-icon-left">
                        <label for="nama_barber">Nama barber</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="masukkan nama" id="nama_barber"
                                name="nama_barber" required>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group has-icon-left">
                        <label for="nohp_barber">Nomor Hp</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="masukkan nomor hp" id="nohp_barber"
                                name="nohp_barber" required>
                            <div class="form-control-icon">
                                <i class="bi bi-phone"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group position-relative">
                        <fieldset>
                            <label for="fotobarber">Upload foto</label>
                            <input type="file" class="form-control" id="foto_barber" name="foto_barber" accept="image/*"
                                aria-label="Upload" required>
                        </fieldset>
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

<!-- modal edit barber -->
<div class="modal fade text-left" id="modalEditBarber" tabindex="-1" role="dialog" aria-labelledby="modaladdbarber"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modaladdbarber">Edit Karyawan</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-circle"></i>
                </button>
            </div>
            <form action="#" id="editKaryawan">
                <div class="modal-body">
                    <div class="form-group has-icon-left">
                        <label for="namaBarber">Nama barber</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="masukkan nama" id="namaBarber">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group has-icon-left">
                        <label for="nohpBarber">Nomor Hp</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="masukkan nomor hp" id="nohpBarber">
                            <div class="form-control-icon">
                                <i class="bi bi-phone"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group position-relative">
                        <fieldset>
                            <label for="fotobarber">Upload foto</label>
                            <input type="file" class="form-control" id="fotobarber" aria-label="Upload">
                        </fieldset>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-square-fill"></i>
                        <span>Batal</span>
                    </button>
                    <button type="button" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                        <i class="bi bi-floppy2-fill"></i>
                        <span>Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal view barber -->
<div class="modal fade text-left" id="modalTambahBarber" tabindex="-1" role="dialog" aria-labelledby="modaladdbarber"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modaladdbarber">Tambah Karyawan</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-circle"></i>
                </button>
            </div>
            <form action="#" id="viewKaryawan">
                <div class="modal-body">
                    <div class="form-group has-icon-left">
                        <label for="namaBarber">Nama barber</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="masukkan nama" id="namaBarber">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group has-icon-left">
                        <label for="nohpBarber">Nomor Hp</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="masukkan nomor hp" id="nohpBarber">
                            <div class="form-control-icon">
                                <i class="bi bi-phone"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group position-relative">
                        <fieldset>
                            <label for="fotobarber">Upload foto</label>
                            <input type="file" class="form-control" id="fotobarber" aria-label="Upload">
                        </fieldset>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-square-fill"></i>
                        <span>Tutup</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>