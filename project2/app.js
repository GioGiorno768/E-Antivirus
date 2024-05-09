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

function addKaryawan(no) {
  return `
  <div class="status-no">
    <div class="no">Karyawan ${no}</div>
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="close bi bi-x p-1" viewBox="0 0 16 16">
      <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
    </svg>
  </div>
  <div class="input-group d-flex align-items-center mt-5 mb-3">
    <input required="" type="text" name="text" autocomplete="off" class="input border rounded col-12 p-2">
    <label class="user-label">Nama</label>
  </div>
  <div class="btn-group dropdown col-12">
    <button class="btn bg-light d-flex justify-content-between" type="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
      <span>Opd</span>
      <span class="dropdown-toggle"></span>
    </button>
    <div class="dropdown-menu p-4 dropdown-menu-center bg-light col-12">
      <div class="input-group d-flex align-items-center">
          <input required="" type="text" name="text" autocomplete="off" class="input border rounded col-5 p-2">
          <label class="user-label">Cari Opd</label>
      </div>
      <ul class="list-unstyled mt-2">
      </ul>
    </div>
  </div>
`;
}

// text area
const textarea = document.getElementById("myTextarea");
textarea.addEventListener("input", function () {
  if (this.value.length >= 1) {
    this.classList.add("validInput");
  } else {
    this.classList.remove("validInput");
  }
});

const teamplates = document.querySelector(".karyawan-eksternal ul");
const buttonAddInput = document.querySelector(".add-karyawan");
const karyawan = document.querySelector(".add-karyawan");

let no = 1;
buttonAddInput.addEventListener("click", () => {
  const liTeamplate = document.createElement("li");
  liTeamplate.setAttribute("class", "teamplate p-4");
  liTeamplate.innerHTML = addKaryawan(no);

  karyawan.before(liTeamplate);
  teamplates.classList.add("bin-teamplate");

  const removeInput = document.querySelectorAll(".close");
  closeInput(removeInput);
  no++;
});

function closeInput(remove) {
  remove.forEach((close) => {
    close.addEventListener("click", () => {
      close.parentElement.parentElement.remove();
      const allNoElements = document.querySelectorAll(".no");
      allNoElements.forEach((noElement, index) => {
        noElement.textContent = `Karyawan ${index + 1}`;
        console.log(index);
      });

      no = allNoElements.length + 1;
      // if (no <= 1) {
      //   teamplates.classList.remove("bin-teamplate");
      // }
    });
  });
}

const json = "./json-nama-daerah-indonesia/regions.json";
const listPersonil = document.querySelector(".list-personil");

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
      focusName(listName);
    });
  })
  .catch((err) => {});

const list = [];

function focusName(e) {
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


const dropdown = document.querySelector(".dropdown-menu ul");
const searchInput = document.getElementById("search-input");
console.log(dropdown);

let names = [];
function renderList(filteredNames) {
  dropdown.innerHTML = "";

  filteredNames.forEach((name, index) => {
    const listName = document.createElement("li");
    listName.setAttribute("value", index);
    listName.textContent = name;
    dropdown.appendChild(listName);
  });
}

function filterNames(searchTerm) {
  const filteredNames = names.filter((name) =>
    name.toLowerCase().includes(searchTerm.toLowerCase())
  );
  console.log(filteredNames);
  renderList(filteredNames);
}
if (searchInput) {
  searchInput.addEventListener("input", (event) => {
    const searchTerm = event.target.value;
    filterNames(searchTerm);
  });
}

fetch(json)
  .then((result) => result.json())
  .then((response) => {
    names = response.map((item) => item.kota).flat();
    if (dropdown) {
      renderList(names);
    }
    console.log(names);
  })
  .catch((err) => {});
