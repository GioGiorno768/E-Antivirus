<div class="card">
    <div class="card-header p-3 pt-2">
        <?= $text ?>
    </div>

    <div class="card-footer p-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            + Tambah User
        </button>
        <table id="table-masteruser" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>Dibuat Pada</th>
                </tr>
            </thead>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- Form input data -->
                    <div class="modal-body">
                        <form action="<?= base_url('administrator/tambah-user')?>"method="POST">   
                            <div class="mb-3 row">
                                <label for="inputNama" class="col-sm-4 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control bg-light" id="inputNama" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputUsername" class="col-sm-4 col-form-label">Username</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control bg-light" id="inputUsername" name="username" placeholder="Masukkan Username" required>
                                </div>
                            </div>
                            <!-- <div class="mb-3 row">
                                <label for="inputPassword" class="col-sm-4 col-form-label">Password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control bg-light" id="inputPassword" name="password" placeholder="Masukkan Password" required>
                                </div>
                            </div>     -->
                            <input type="text" name="is_admin" value="0" hidden>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>    
                </div>
            </div>
        </div>
    </div>
</div>