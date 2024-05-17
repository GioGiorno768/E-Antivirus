<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
      integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />


    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="<?php echo base_url('css/style.css'); ?>" />
  </head>
  <style></style>
  <body>
    <main
      class="d-flex postion-relative justify-content-center"
    > 
      <img class="position-absolute" src="<?php echo base_url('img/backgorund.jpg'); ?>" alt="" />
      <section>
        <div class="container-fluid bg-light px-sm-5 py-5 position-relative ">
          <div
            class="title col-12 position-absolute d-flex justify-content-center align-items-center m-auto"
          >
            <div class="titles p-2 border border-0 rounded col-5 text-center">
              <b class="fs-5">e-ANTIVIRUS</b>
              <p class="mt-2">Elektronik Pencatatan Aktivitas Ruang Server</p>
            </div>
          </div>
          <form action="<?= base_url('loginRev'); ?>" method="post" enctype="multipart/form-data">
          <?php if (session()->getFlashdata('msg')) : ?>
            <div class="alert mt-5 alert-success alert-dismissible bg-danger text-white fade show  " role="alert">                          
              <?= session()->getFlashdata('msg') ?>
              <button type="button" class="btn-close text-light btn-close-white   " data-bs-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true"></span>
              </button>
            </div>
          <?php endif; ?> 
            <div class="personil p-sm-5 py-5 personil mt-5 position-relative">
              <div class="inputNoRequire d-flex justify-content-arround align-items-center gap-3 ">
                <input id="input-personil" type="text" name="text" autocomplete="off" class="border rounded col-12 p-2 ps-3" placeholder="Cari Personil">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                </svg>
              </div>
              <div class="parent-list-personil pt-2 mt-2 pb-2">
                <ul
                  class="list-personil pb-2 p-4 list-unstyled d-flex gap-3 flex-wrap"
                >
              </ul>
              <p id="inputWrong" class="text-center text-secondary fs-6">Personil Tidak Dapat Ditemukan</p>
              </div>
              <ul class="list-unstyled col-12 mt-4 d-flex gap-3 pe-3">
                <li class="col-6">
                  <div class="input-group d-flex align-items-center">
                    <input id="kodeAkses" required="" type="text" name="kodeAkses" autocomplete="off" class="input border rounded col-12 p-2">
                    <label class="user-label">Kode Akses</label>
                  </div>
                  <div class="input-group d-flex mt-4 align-items-center">
                    <textarea id="myTextarea" required="" type="text" name="keperluan" autocomplete="off" rows="6" class="input col-12 border rounded p-2"></textarea>
                    <label class="user-label label-textarea">Keperluan</label>
                  </div>
                </li>
                <li class="containerLiImg overflow-hidden">
                  <div class="capture position-relative d-flex overflow-hidden justify-content-center align-items-center">
                    <div id="showCapture" class=" position-absolute flex-column justify-content-center align-items-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera" viewBox="0 0 16 16">
                        <path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4z"/>
                        <path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5m0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7M3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0"/>
                      </svg>
                      <p class="fw-semibold mt-1">Buka Kamera</p>
                    </div>
                   
                    <video id="video" width="630" height="500" autoplay class="col-12"></video>
                    <span id="containerImg"></span>
                    <canvas id="canvas" class="" style="display:none;"></canvas>
                  </div>
                  <div class="captureButtonContainer col-12 gap-sm-2 align-items-center justify-content-center">
                    <p id="capture" class="pink rounded-2 py-1 px-1 py-sm-2 px-sm-3 text-light m-sm-2 m-1">Capture</p>
                    <p id="captureBaru" class="pink rounded-2 py-1 px-1  py-sm-2 px-sm-3 text-light m-sm-2 m-1">Perbarui</p>
                  </div>
                  <input type="file" id="valueCapture" name="fotoKeperluan" size="20" />
                </li>
              </ul>
            </div>
            <div class="karyawan-eksternal mt-3">
              <ul class="list-unstyled bin-teamplate py-5 px-3  p-sm-5">
                <div class="ms-1 add-karyawan d-flex align-items-center gap-2">
                  <p
                    id="add-input"
                    class="fs-4 text-light border rounded"
                  >
                    +
                  </p>
                  <p>Tambah Pegawai Eksternal</p>
                </div>
              </ul>
              <div
                class="col-12 d-flex flex-column justify-content-center align-items-center"
              >
                <button type="submit" class="submit">mulai</button>
              </div>
            </div>
          </form>
        </div>
        <footer class="my-5  w-100 ">
          <div class="container"> 
                <div class="row align-items-center justify-content-lg-center justify-content-sm-center ">
                    <div class="col-12 col-md-6 my-auto">
                        <div class="copyright text-center text-sm text-white">
                            © <script>
                                document.write(new Date().getFullYear())
                            </script>
                            —
                            <span class="font-weight-bold text-center text-white">Dinas Komunikasi dan Informatika Kabupaten Kediri</span>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
      </section>
    </main>
  </body>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"
  ></script>
  <script src="<?php echo base_url('js/app.js'); ?>"></script>
</html>
