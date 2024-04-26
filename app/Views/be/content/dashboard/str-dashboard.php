<div class="card mt-4">
    <div class="card-header p-3 pt-2">
        <?= $text ?>
    </div>

    <div class="card-footer p-3 bg-grey">
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card shadow-dark border border-success border-2">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end">
                <p class="fs-6 mb-1 text-capitalize font-weight-bold">Akun Admin</p>
                <h4 class="mb-0"><?= count($adminUsers_Admin); ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-4">
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card shadow-dark border border-danger border-2">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-danger shadow-danger text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end">
                <p class="fs-6 mb-1 text-capitalize font-weight-bold">Akun User</p>
                <h4 class="mb-0"><?= count($adminUsers); ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-4">
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card shadow-dark border border-warning border-2">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-warning shadow-warning text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">book</i>
              </div>
              <div class="text-end">
                <p class="fs-6 mb-1 text-capitalize font-weight-bold">Rekap Hari Ini</p>
                <h4 class="mb-0"><?= count($keperluan); ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-4">
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
      <div class="col-xl-3 col-sm-6">
        <div class="card shadow-dark border border-primary border-2">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-primary shadow-warning text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">book</i>
            </div>
            <div class="text-end">
              <p class="fs-6 mb-1 text-capitalize font-weight-bold">Rekap Bulan Ini</p>
              <h4 class="mb-0"><?= count($keperluanPerBulan); ?></h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-4">
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6">
        <div class="card shadow-dark border border-info border-2">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">book</i>
            </div>
            <div class="text-end">
              <p class="fs-6 mb-1 text-capitalize font-weight-bold">Rekap Tahun Ini</p>
              <h4 class="mb-0"><?= count($keperluanPerTahun); ?></h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-4">
          </div>
        </div>
      </div>
    </div>
</div>
