<div class="card">
    <div class="card-header p-3 pt-2">
        <?= $text ?>
    </div>

    <div class="card-footer p-3">
        ID yang sedang diedit: <?= $id ?>
    </div>

        <div class="container mt-3">
            <form action="<?= base_url('administrator/master-admin/update/' .$id) ?>" method="post">
            <? csrf_field() ?>
                <div class="mb-3">
                    <label for="inputNama" class="form-label">Nama Lengkap</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control bg-light" id="inputNama" name="inputNama" value="<?= $nama_lengkap ?>" placeholder="Masukkan Nama Lengkap" required>
                    </div>    
                </div>
                <div class="mb-3">
                    <label for="inputUsername" class="form-label">Username</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control bg-light" id="inputUsername" name="inputUsername" value="<?= $username ?>" placeholder="Masukkan Username" required>
                    </div>    
                </div>
                <div class="mb-3">
                    <label for="inputPassword" class="form-label">Password</label>
                    <div class="col-sm-4">
                        <input type="password" class="Password form-control bg-light" id="inputPassword" name="inputPassword" placeholder="Masukkan Password">
                        <input type="checkbox" onclick="myFunction()"> Show Password 
                    </div>    
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>     
    </div>
</div>

<script>
    function myFunction() {
        const pass = document.querySelector(".Password");
        if (pass.type === "password") {
            pass.type = "text";
        } else {
            pass.type = "password";
        }
    } 
</script>