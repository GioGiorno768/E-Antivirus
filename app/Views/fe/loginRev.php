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

    <link rel="stylesheet" href="<?php echo base_url('css/style.css'); ?>" />
  </head>
  <style></style>
  <body>
    <main
      class="d-flex postion-relative justify-content-center align-items-center"
    > 
      <img class="position-absolute" src="<?php echo base_url('img/bg-pricing.jpg'); ?>" alt="" />
      <section>
        <div class="bg-light p-5 position-relative">
          <div
            class="title col-12 position-absolute d-flex justify-content-center align-items-center m-auto"
          >
            <div class="bg-danger p-2 border border-0 rounded col-5 text-center">
              <b class="fs-5">e-ANTIVIRUS</b>
              <p class="mt-2">Elektronik Pencatatan Aktivitas Ruang Server</p>
              <div id="respons"></div>
            </div>
          </div>
          <form action="POST" enctype="multipart/form-data">
            <div class="p-5 pt-5 personil mt-5 position-relative">
              <div class="input-group d-flex align-items-center">
                <input required="" type="text" name="text" autocomplete="off" class="input border rounded col-5 p-2">
                <label class="user-label">Cari Personil</label>
              </div>
              <div class="parent-list-personil pt-2 mt-3 pb-2">
                <ul
                  class="list-personil pb-2 p-4 list-unstyled d-flex gap-3 flex-wrap"
                ></ul>
              </div>
              <ul class="list-unstyled col-12 mt-4 d-flex gap-3 pe-3">
                <li class="col-6">
                  <div class="input-group d-flex align-items-center">
                    <input required="" type="text" name="text" autocomplete="off" class="input border rounded col-12 p-2">
                    <label class="user-label">Kode Akses</label>
                  </div>
                  <div class="input-group d-flex mt-4 align-items-center">
                    <textarea id="myTextarea" required="" type="text" name="text" autocomplete="off" rows="6" class="input col-12 border rounded p-2"></textarea>
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
                  <div class="captureButtonContainer col-12 gap-2 align-items-center justify-content-center">
                    <p id="capture">Capture</p>
                    <p id="captureBaru">Perbarui</p>
                  </div>

                </li>
              </ul>
            </div>
            <div class="karyawan-eksternal mt-3">
              <ul class="list-unstyled bin-teamplate ps-5 pe-5">
                <!-- <li class="teamplate p-4">
                  <div class="status-no">
                    <div class="no">Karyawan 1</div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="close bi bi-x p-1" viewBox="0 0 16 16">
                      <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                    </svg>
                  </div>
                  <div class="name">
                    <label for="name">Nama :</label>
                    <input type="text" id="name" placeholder="Masukkan Nama" />
                  </div>
                  <div class="btn-group dropdown col-12">
                    <button class="btn d-flex justify-content-between" type="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                      <span>magang</span>
                      <span class="dropdown-toggle"></span>
                    </button>
                    <div class="dropdown-menu p-4 dropdown-menu-center col-12">
                      <input id="search-input" class="col-5" placeholder="masukkan" type="text">
                      <ul class="list-unstyled mt-2">
                      </ul>
                    </div>
                  </div>
                </li> -->
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
      </section>
    </main>
  </body>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"
  ></script>
  <script>
      const video = document.getElementById('video');
      const containerImg = document.getElementById('containerImg')
      const captureButtonContainer = document.querySelector('.captureButtonContainer')
      const canvas = document.getElementById('canvas');
      const showCapture = document.getElementById('showCapture')
      const captureBaru = document.getElementById('captureBaru')
      const captureButton = document.getElementById('capture');

    // Akses media (webcam) dan mulai streamingnya ke elemen video
    showCapture.addEventListener('click', function(){
      navigator.mediaDevices.getUserMedia({ video: true })
      .then(stream => {
            showCapture.style.display = 'none';
            captureButtonContainer.style.display = 'flex';
            video.srcObject = stream;
          })
          .catch(err => {

              console.error('Error accessing media devices: ', err);
          });
    })

    // Event listener untuk menangkap gambar saat tombol ditekan
    captureButton.addEventListener('click', () => {
            video.style.display = 'none'
            containerImg.innerHTML = ''
            const context = canvas.getContext('2d');
            // Ubah ukuran canvas sesuai dengan video
            canvas.width = 450;
            canvas.height = 300;
            // Gambar frame video ke canvas
            context.drawImage(video, 0, 0, canvas.width, canvas.height);
            // Ambil data URL dari canvas (gambar)
            const imgUrl = canvas.toDataURL('image/png');
            console.log(encodeURIComponent(imgUrl))
            // Lakukan sesuatu dengan gambar, misalnya menampilkan di elemen img
            const imgElement = new Image();
            imgElement.src = imgUrl;
            containerImg.appendChild(imgElement);
        });
    captureBaru.addEventListener('click', function(){
       video.style.display = 'block'
       containerImg.innerHTML = ''
    })
</script>
  <script src="<?php echo base_url('js/app.js'); ?>"></script>
  <!-- <script>
    function teamplate(no) {
      return `
        <li class="teamplate line">
            <div class="status-no">
              <div class="no">Karyawan ${no}</div>
              <i class="fa-solid fa-trash"></i>
            </div>
            <div class="name">
              <label for="name">Nama :</label>
              <input type="text" id="name" placeholder="Masukkan Nama" />
            </div>
            <div class="status">
              <label for="status">Status :</label>
              <select name="dropdown" id="status">
                <option value="1">Magang</option>
                <option value="1">TDD</option>
                <option value="1">Magang</option>
                <option value="1">Magang</option>
                <option value="1">Magang</option>
                <option value="1">Magang</option>
                <option value="1">Magang</option>
                <option value="1">Magang</option>
              </select>
            </div>
          </li>
      `;
    }

    function addKaryawan() {
      return `<ul class="list-unstyled mt-5 pt-5 p-4">
                <li class="teamplate p-4">
                  <div class="status-no">
                    <div class="no">Karyawan 1</div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x p-1" viewBox="0 0 16 16">
                      <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                    </svg>
                  </div>
                  <div class="name">
                    <label for="name">Nama :</label>
                    <input type="text" id="name" placeholder="Masukkan Nama" />
                  </div>
                  <div class="status">
                    <label for="status">Status :</label>
                    <select name="dropdown" id="status">
                      <option value="1">Magang</option>
                      <option value="1">TDD</option>
                      <option value="1">Magang</option>
                      <option value="1">Magang</option>
                      <option value="1">Magang</option>
                      <option value="1">Magang</option>
                      <option value="1">Magang</option>
                      <option value="1">Magang</option>
                    </select>
                  </div>
                </li>
                <div class="add-Karyawan d-flex align-items-center gap-2">
                  <p
                    id="add-input"
                    class="fs-4 text-light bg-primary border rounded"
                  >
                    +
                  </p>
                  <p>Tambah Karyawan Eksternal</p>
                </div>
              </ul>`;
    }

    const buttonAddInput = document.getElementById("add-input");
    const teamplates = document.querySelector(".karyawan-eksternal ul");

    let no = 1;
    buttonAddInput.addEventListener("click", () => {
      teamplates.insertAdjacentHTML("beforeend", teamplate(no));
      no++;
      const trashIcons = document.querySelectorAll(".fa-trash");
      trashIcons.forEach((trashIcon) => {
        trashIcon.addEventListener("click", () => {
          trashIcon.parentElement.parentElement.remove();

          const allNoElements = document.querySelectorAll(".no");
          allNoElements.forEach((noElement, index) => {
            noElement.textContent = `Karyawan ${index + 1}`;
          });

          no = allNoElements.length + 1;
        });
        console.log(no);
      });
    });

    const json = "./json-nama-daerah-indonesia/regions.json";
    const listPersonil = document.querySelector(".list-personil");

    function name(name) {
      return `<li>${name}</li>`;
    }
    fetch(json)
      .then((result) => result.json())
      .then((response) => {
        // const names = response[11].kota
        const names = response.map((item) => item.kota).flat();

        names.forEach((name, index) => {
          const listName = document.createElement("li");
          listName.setAttribute("value", index);
          listName.textContent = name;
          listPersonil.appendChild(listName);
          cba(listName);
        });
      })
      .catch((err) => {});

    const list = [];

    function cba(e) {
      e.addEventListener("click", (c) => {
        const coba = c.target;
        if (list.includes(coba.value)) {
          const index = list.indexOf(coba.value);
          coba.classList.remove("list-focus");
          list.splice(index, 1);
        } else {
          coba.classList.add("list-focus");
          list.push(coba.value);
        }
        console.log(list);
      });
    }
  </script> -->
</html>
