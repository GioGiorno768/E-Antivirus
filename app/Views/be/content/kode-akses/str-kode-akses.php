<div class="card">
    <div class="card-header p-3 pt-2">
        <?= $text ?>
    </div>

        <div class="container mt-3">
            <form action="<?= base_url('administrator/kode-akses/update') ?>" method="post">
            <? csrf_field() ?>
                <div class="mb-3">
                    <label for="inputKodeLama" class="form-label">Kode Akses Lama</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control bg-light" id="inputKodeLama" name="inputKodeLama" placeholder="Masukkan Kode Akses Lama">
                    </div>    
                </div>
                <div class="mb-3">
                    <label for="inputKodeBaru" class="form-label">Kode Akses Baru</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control bg-light" id="inputKodeBaru" name="inputKodeBaru" placeholder="Masukkan Kode Akses Baru">
                    </div>    
                </div>
                <div class="mb-3">
                    <label for="inputKonfirmasiKodeBaru" class="form-label">Konfirmasi Kode Akses Baru</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control bg-light" id="inputKonfirmasiKodeBaru" name="inputKonfirmasiKodeBaru" placeholder="Masukkan Kode Akses Baru">
                    </div>    
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>     
    </div>
</div>