function addKaryawan(no) {
  return `
  <div class="status-no">
    <div class="no">Karyawan ${no}</div>
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="close bi bi-x p-1" viewBox="0 0 16 16">
      <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
    </svg>
  </div>
  <div class="input-group d-flex align-items-center mt-5 mb-3">
    <input id="inputNamePegawai${no}" required="" type="text" name="text" autocomplete="off" class="input border rounded col-12 p-2">
    <label class="user-label">Nama</label>
  </div>
  <div class="btn-group dropdown col-12">
    <button class="btn bg-light d-flex justify-content-between" type="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
      <input id="show-opd" class="display-opd${no}" placeholder="Opd" disabled>
      <span class="dropdown-toggle"></span>
    </button>
    <div class="dropdown-list${no} dropdown-menu p-4 dropdown-menu-center bg-light col-12">
      <div class="input-group d-flex align-items-center">
          <input id="search-input" type="text" name="text" autocomplete="on" class="input input-opd${no} border rounded col-12 p-2">
          <label class="user-label">Cari Opd</label>
      </div>
      <p id="inputWrongOpd${no}" class="inputWrongOpd mt-5 text-center text-secondary fs-6">Opd Tidak Dapat Ditemukan</p>
      <ul class="list-unstyled mt-2">
      </ul>
    </div>
  </div>
`;
}

// ============ fungsi add personil ==============
const listPersonil = document.querySelector(".list-personil");
const inputPersonil = document.getElementById("input-personil");

let selectedItems = [];
let names = [];
let listIndexPersonil = [];

function displayNames(searchTerm) {
  listPersonil.innerHTML = "";

  // list name
  searchTerm.forEach(function (item) {
    const li = document.createElement("li");
    li.setAttribute("value", item.id);
    li.textContent = item.name;

    if (selectedItems.includes(item.id)) {
      li.classList.add("list-focus");
    }

    li.addEventListener("click", function () {
      this.classList.toggle("list-focus");

      // list value personil
      listIndexPersonil.push(this.value);

      if (selectedItems.includes(item.id)) {
        selectedItems = selectedItems.filter((selectedItem) => selectedItem !== item.id);
        console.log(selectedItems);
      } else {
        selectedItems.push(item.id);
      }
    });

    listPersonil.appendChild(li);
  });
}

const displayWrong = document.getElementById("inputWrong");
function filterNamesPersonil(search) {
  const filteredNames = names.filter(function(item) {
    return item.name.toLowerCase().includes(search.toLowerCase());
  });
  if (filteredNames == "") {
    displayWrong.style.display = "block";
  } else {
    displayWrong.style.display = "none";
  }
  displayNames(filteredNames);
}

inputPersonil.addEventListener("input", function () {
  const searchTerm = this.value;
  filterNamesPersonil(searchTerm);
});

// rubah sesuai kebutuhan
const jsonName = "http://localhost:8080/loginRev/fetch-personil-internal";

fetch(jsonName)
  .then((result) => result.json())
  .then((response) => {
    names = response.map((item) => ({ id: item.id, name: item.nama })).flat();

    displayNames(names);
  })
  .catch((err) => {
    console.error("Error fetching data:", err);
  });

// ============ end fungsi add personil ==============

// ============ fungsi add pegawai eksternal ==============

const teamplates = document.querySelector(".karyawan-eksternal ul");
const buttonAddInput = document.querySelector(".add-karyawan");

let no = 1;
let listOpd = [];
buttonAddInput.addEventListener("click", () => {
  const liTeamplate = document.createElement("li");
  liTeamplate.setAttribute("class", "teamplate p-4");
  liTeamplate.innerHTML = addKaryawan(no);

  buttonAddInput.before(liTeamplate);

  // DATA NAME PEGAWAI EKSTERNAL
  if (no > 1) {
    const inputNamePegawai = document.getElementById(
      `inputNamePegawai${no - 1}`
    );
    console.log(inputNamePegawai.value);
  }

  teamplates.classList.add("bin-teamplate");

  const dropdown = document.querySelector(`.dropdown-list${no} ul`);
  const searchInput = document.querySelector(`.input-opd${no}`);
  const spanOpd = document.querySelector(`.display-opd${no}`);
  const displayWrongOpd = document.getElementById(`inputWrongOpd${no}`);

  searchInput.addEventListener("input", (event) => {
    const searchTerm = event.target.value;
    filterOpd(dropdown, searchTerm, spanOpd, displayWrongOpd);
  });

  fetchOpd(dropdown, spanOpd);
  const removeInput = document.querySelectorAll(".close");
  closeInput(removeInput);
  no++;
});
// ============ end fungsi add pegawai eksternal ==============

// rubah sesuai kebutuhan
const jsonOpd = "./json-nama-daerah-indonesia/regions.json";

// ============ fungsi search Opd ==============
function fetchOpd(dropdown, spanOpd) {
  fetch(jsonOpd)
    .then((result) => result.json())
    .then((response) => {
      listOpd = response.map((item) => item.kota).flat();
      renderList(dropdown, listOpd, spanOpd);
    })
    .catch((err) => {});
}

function filterOpd(dropdown, searchTerm, spanOpd, inputWrong) {
  const filteredNames = listOpd.filter((name) =>
    name.toLowerCase().includes(searchTerm.toLowerCase())
  );

  if (filteredNames == "") {
    inputWrong.style.display = "block";
  } else {
    inputWrong.style.display = "none";
  }

  renderList(dropdown, filteredNames, spanOpd);
}

function closeInput(remove) {
  remove.forEach((close) => {
    close.addEventListener("click", () => {
      close.parentElement.parentElement.remove();
      const allNoElements = document.querySelectorAll(".no");
      allNoElements.forEach((noElement, index) => {
        noElement.textContent = `Karyawan ${index + 1}`;
      });

      no = allNoElements.length + 1;
    });
  });
}

function updateEmployeNumber() {}

function renderList(dropdown, filteredNames, spanOpd) {
  dropdown.innerHTML = "";

  filteredNames.forEach((name, index) => {
    const listName = document.createElement("li");
    listName.setAttribute("value", index);
    listName.textContent = name;
    dropdown.appendChild(listName);

    listName.addEventListener("click", () => {
      // DATA LIKE OPD
      spanOpd.value = listName.textContent;
      console.log(spanOpd.value);
    });
  });
}
// ============ end fungsi search Opd ==============

// ============ fungsi take camera ==============
const video = document.getElementById("video");
const containerImg = document.getElementById("containerImg");
const captureButtonContainer = document.querySelector(
  ".captureButtonContainer"
);
const canvas = document.getElementById("canvas");
const showCapture = document.getElementById("showCapture");
const captureBaru = document.getElementById("captureBaru");
const captureButton = document.getElementById("capture");

showCapture.addEventListener("click", function () {
  navigator.mediaDevices
    .getUserMedia({ video: true })
    .then((stream) => {
      showCapture.style.display = "none";
      captureButtonContainer.style.display = "flex";
      video.srcObject = stream;
    })
    .catch((err) => {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Izin Kamera di tolak",
      });
      // console.error("Error accessing media devices: ", err);
    });
});

captureButton.addEventListener("click", () => {
  video.style.display = "none";
  containerImg.innerHTML = "";
  const context = canvas.getContext("2d");
  canvas.width = 380;
  canvas.height = 300;
  context.drawImage(video, 0, 0, canvas.width, canvas.height);

  // DATA DARI GAMBAR
  const imgUrl = canvas.toDataURL("image/png");
  console.log(imgUrl);

  // -------

  const imgElement = new Image();
  imgElement.src = imgUrl;
  containerImg.appendChild(imgElement);
});
captureBaru.addEventListener("click", function () {
  video.style.display = "block";
  containerImg.innerHTML = "";
});
// ============ end fungsi take camera ==============

// DATA KODE AKSES AND KEPERLUAN
const textarea = document.getElementById("myTextarea");
const kodeAkses = document.getElementById("kodeAkses");

// kodeAkses.value = cara mengakses value kode akses

// Text Area
textarea.addEventListener("input", function () {
  if (this.value.length >= 1) {
    this.classList.add("validInput");
  } else {
    this.classList.remove("validInput");
  }
});
