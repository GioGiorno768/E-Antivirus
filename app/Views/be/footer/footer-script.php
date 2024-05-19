<!-- Begin Footer Script -->
<!--   Core JS Files   -->
  <script src="<?= base_url('stessa/assets/plugins/DataTables/jQuery-3.7.0/jquery-3.7.0.min.js'); ?>"></script>
  <script src="<?= base_url('stessa/assets/js/core/popper.min.js'); ?>"></script>
  <script src="<?= base_url('stessa/assets/js/core/bootstrap.min.js'); ?>"></script>
  <script src="<?= base_url('stessa/assets/js/plugins/perfect-scrollbar.min.js'); ?>"></script>
  <script src="<?= base_url('stessa/assets/js/plugins/smooth-scrollbar.min.js'); ?>"></script>
  <script src="<?= base_url('stessa/assets/js/plugins/chartjs.min.js'); ?>"></script>
  <!--   DataTables JS Files   -->
  <script src="<?= base_url('stessa/assets/plugins/DataTables/DataTables-1.13.8/js/jquery.dataTables.min.js'); ?>"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url('stessa/assets/plugins/DataTables/Responsive-2.5.0/js/dataTables.responsive.min.js'); ?>"></script>
  <script src="<?= base_url('stessa/assets/plugins/DataTables/Select/dataTables.select.min.js'); ?>"></script>
  <script src="<?= base_url('stessa/assets/plugins/DataTables/Buttons/dataTables.buttons.min.js'); ?>"></script>


  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script> 
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <script src="<?= base_url('stessa/assets/js/material-dashboard.js?v=3.1.0'); ?>"></script>
  <!-- End Footer Script -->