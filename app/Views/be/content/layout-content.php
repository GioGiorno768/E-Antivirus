<!-- Begin Content -->
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-lg-12 col-sm-12">
      <?php if (session()->getFlashdata('msg')) : ?>
          <div class="alert alert-success alert-dismissible text-white fade show  " role="alert">                          
              <?= session()->getFlashdata('msg') ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
      <?php elseif (session()->getFlashdata('error')): ?>
          <div class="alert alert-danger alert-dismissible text-white fade show  " role="alert">                          
              <?= session()->getFlashdata('error') ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
      <?php endif; ?>
      <?= $contentString ?>
    </div>
  </div>
  
  <?php echo view('be/content/footer-content'); ?>

</div>
<!-- End Content -->