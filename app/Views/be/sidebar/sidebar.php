<!-- Begin Sidebar -->
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="<?= base_url('stessa/assets/img/logo-ct.png'); ?>" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white"><?= TITLE_APP ?></span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <?php
        $currentUrl = current_url();
        $segmentYgAktif = explode('/', str_replace('://', '|', $currentUrl)); // jadinya array
        ?>
        <li class="nav-item">
          <a class="nav-link text-white <?= $segmentYgAktif[2]==="dashboard" ? 'active bg-gradient-primary' : '' ?>" href="<?=base_url('administrator/dashboard'); ?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= $segmentYgAktif[2]==="master-admin" ? 'active bg-gradient-primary' : '' ?>" href="<?=base_url('administrator/master-admin'); ?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Master Admin </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= $segmentYgAktif[2]==="master-user" ? 'active bg-gradient-primary' : '' ?>" href="<?=base_url('administrator/master-user'); ?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Master User</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= $segmentYgAktif[2]==="kegiatan-pegawai-eksternal" ? 'active bg-gradient-primary' : '' ?>" href="<?=base_url('administrator/kegiatan-pegawai-eksternal'); ?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">group</i>
            </div>
            <span class="nav-link-text ms-1">Kegiatan OPD Eksternal</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= $segmentYgAktif[2]==="rekap-keperluan-user" ? 'active bg-gradient-primary' : '' ?>" href="<?=base_url('administrator/rekap-keperluan-user'); ?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">view_in_ar</i>
            </div>
            <span class="nav-link-text ms-1">Rekap Keperluan User</span>
          </a>
        </li>
        <hr class="horizontal light mt-0 mb-2">
        <li class="nav-item">
          <a class="nav-link text-white <?= $segmentYgAktif[2]==="kode-akses" ? 'active bg-gradient-primary' : '' ?>" href="<?=base_url('administrator/kode-akses'); ?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">key</i>
            </div>
            <span class="nav-link-text ms-1">Kode Akses</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="<?= base_url('/admin/logout'); ?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">logout</i>
            </div>
            <span class="nav-link-text ms-1">Keluar</span>
          </a>
        </li>

      </ul>
    </div>
  </aside>
  <!-- End Sidebar -->