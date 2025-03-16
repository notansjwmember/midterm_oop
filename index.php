<?php
include_once './config/db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User management | Narnia</title>
  <link rel="stylesheet" href="/styles/global.css">
</head>

<body>
  <div class="header">
    <h1>User management</h1>
    <button type="button" class="primary-button icon-label" onclick="openPopup()">
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M12 5l0 14" />
        <path d="M5 12l14 0" />
      </svg>
      Create a user
    </button>
  </div>

  <div class="table-container">
    <div class="table-header">
      <h4>#</h4>
      <h4>Name</h4>
      <h4>Gender</h4>
      <h4>Email</h4>
      <h4>Country</h4>
      <h4>Joined on</h4>
    </div>
    <div class="table-content">
      <div class="loader">
        <p>Loading users...</p>
      </div>
    </div>
  </div>

  <div class="popup-wrapper">
    <div class="popup-container">

      <div class="icon-label" style="gap: 1rem;">
        <div class="icon-circle">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-plus">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
            <path d="M16 19h6" />
            <path d="M19 16v6" />
            <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
          </svg>
        </div>
        <div class="text-container">
          <h2>Create a user</h2>
          <p style="opacity: 0.7;">Please fill in the inputs to proceed.</p>
        </div>
      </div>

      <div class="line"></div>

      <div class="form-container">

        <form id="gen_info_form">
          <h3 class="sub-title">General information</h3>
          <div class="form-input">
            <label for="name">Name *</label>
            <div class="flex">
              <input type="text" name="first_name" placeholder="First name">
              <input type="text" name="last_name" placeholder="Last name">
            </div>
          </div>
          <div class="form-input">
            <label for="email">Email *</label>
            <input type="email" name="email" placeholder="Email address">
          </div>
          <div class="form-input">
            <label for="phone">Phone</label>
            <input type="tel" name="phone" placeholder="Phone number">
          </div>
          <div class="form-input">
            <label for="birthdate">Birthdate *</label>
            <input type="date" name="birthdate">
          </div>
          <div class="form-input">
            <label for="country">Gender *</label>
            <select name="gender">
              <option value="">Select a gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
              <option value="other">Other</option>
            </select>
          </div>
          <div class="form-input">
            <label for="country">Country *</label>
            <input type="text" name="country" placeholder="Country">
          </div>
          <div class="form-input">
            <label for="city">City</label>
            <input type="text" name="city" placeholder="City">
          </div>
          <div class="form-input">
            <label for="address">Address</label>
            <textarea name="address" placeholder="Address"></textarea>
          </div>
          <div class="form-input">
            <label for="postal_code">Postal Code</label>
            <input type="text" name="postal_code" placeholder="Postal code">
          </div>
        </form>

        <form id="per_info_form">
          <div class="icon-label">
            <button type="button" class="back-button" onclick="handleStep(-1)">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M5 12l14 0" />
                <path d="M5 12l6 6" />
                <path d="M5 12l6 -6" />
              </svg>
            </button>
            <h3 class="sub-title">Personal information</h3>
          </div>
          <div class="form-input">
            <label for="username">Username *</label>
            <input type="text" name="username" placeholder="Username">
          </div>
          <div class="form-input">
            <label for="password">Password *</label>
            <div class="password-input">
              <input type="password" name="password" placeholder="Password">
              <button type="button" class="password-input-eye">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                  <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                </svg>
              </button>
            </div>
          </div>
          <div class="form-input">
            <label for="bio">Biography</label>
            <textarea name="bio" placeholder="Say something about yourself"></textarea>
          </div>
          <div class="form-input">
            <label for="user_photo">Profile picture</label>
            <div class="user-photo-wrapper">
              <img class="user-photo-container"></img>
              <div class="icon-button upload-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-upload">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                  <path d="M7 9l5 -5l5 5" />
                  <path d="M12 4l0 12" />
                </svg>
              </div>
              <p id="user-photo-text">Click to upload or drag and drop<br />
                SVG, PNG, or JPG (min. 2MB)</p>
              <input style="display: none;" type="file" name="user_photo">
            </div>
          </div>
        </form>
      </div>

      <div class="flex button-container">
        <button type="button" class="secondary-button" onclick="closePopup()">
          Cancel
        </button>
        <button id="next-step" type="submit" class="primary-button" onclick="handleStep(1)">
          Next step
        </button>
      </div>

    </div>
  </div>
</body>

</html>

<script>
  const popup = document.querySelector(".popup-wrapper");
  const popupContainer = document.querySelector(".popup-container");
  const userPhotoWrapper = document.querySelector(".user-photo-wrapper");
  const userPhotoInput = document.querySelector("input[name='user_photo']");
  const userPhotoText = document.querySelector("#user-photo-text")
  const userPhotoContainer = document.querySelector(".user-photo-container");
  const uploadButton = document.querySelector(".upload-button");

  popup.addEventListener("click", (e) => {
    if (e.target === popup) {
      closePopup();
    }
  })

  userPhotoWrapper.addEventListener("click", () => {
    userPhotoInput.click();
  })

  userPhotoInput.addEventListener("change", (event) => {
    const file = event.target.files[0];

    uploadButton.style.display = "none";
    userPhotoText.textContent = userPhotoInput.files[0].name;

    if (file) {
      const blobUrl = URL.createObjectURL(file);
      userPhotoContainer.src = blobUrl;
      userPhotoContainer.style.display = "block";
    }
  })

  let isPasswordVisible = false;

  document.querySelector(".password-input-eye").addEventListener("click", () => {
    isPasswordVisible = !isPasswordVisible;

    if (!isPasswordVisible) {
      document.querySelector(".password-input-eye").innerHTML = `
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
        <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
      </svg>
    `;
      document.querySelector(".password-input input").type = "password";
      return;
    }

    document.querySelector(".password-input-eye").innerHTML = `
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye-off">
      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
      <path d="M10.585 10.587a2 2 0 0 0 2.829 2.828" />
      <path d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.6 0 -6.6 -2 -9 -6c1.272 -2.12 2.712 -3.678 4.32 -4.674m2.86 -1.146a9.055 9.055 0 0 1 1.82 -.18c3.6 0 6.6 2 9 6c-.666 1.11 -1.379 2.067 -2.138 2.87" />
      <path d="M3 3l18 18" />
    </svg>
  `;
    document.querySelector(".password-input input").type = "text";
  });

  const formContainer = document.querySelector(".form-container");
  let nextFormHeight;
  let prevFormHeight;
  let formInitialized = false;

  function openPopup() {
    popup.style.display = "flex";
    popup.style.visibility = "visible";

    if (!formInitialized) {
      formContainer.style.minHeight = prevForm.getBoundingClientRect().height + 20 + 'px';
      formInitialized = true;
    }

    setTimeout(() => {
      popup.style.opacity = 1;
      popupContainer.style.transform = "scale(1)";

      nextFormHeight = nextForm.getBoundingClientRect().height;
      prevFormHeight = prevForm.getBoundingClientRect().height;
    }, 0);
  }


  function closePopup() {
    formContainer.querySelectorAll("input").forEach((e) => e.classList.remove("invalid-input"));
    formContainer.querySelector("select").classList.remove("invalid-input");
    nextForm.querySelector(".password-input").classList.remove("invalid-input");

    setTimeout(() => {
      popup.style.opacity = 0;
      popupContainer.style.transform = "scale(0.95)";
      popup.style.visibility = "hidden";

    }, 0);

    setTimeout(() => {
      popup.style.display = "none";
    }, 200);
  }

  let step = 0;
  const nextForm = document.querySelector("#per_info_form");
  const prevForm = document.querySelector("#gen_info_form");

  let formData = new FormData();
  let prevFormData;

  const req_fields = ["first_name", "last_name", "username", "password", "country", "gender", "birthdate", "email"];

  function handleStep(num) {
    const nextStep = document.querySelector("#next-step");
    prevFormData = new FormData(prevForm);

    let isValid = true;

    if (step + num > 1) return;

    prevFormData.forEach((value, key) => {
      if (req_fields.includes(key) && !value) {
        isValid = false;
        const input = prevForm.querySelector(`[name="${key}"]`);
        if (input) input.classList.add("invalid-input");
      }
    })

    if (!isValid) return;

    step += num;

    if (step === 1) {
      formContainer.querySelectorAll("input").forEach((e) => e.classList.remove("invalid-input"));
      formContainer.querySelector("select").classList.remove("invalid-input");
      formNextAnimation();
      nextForm.style.display = "flex";
      nextStep.textContent = "Create user";
      nextStep.style.backgroundColor = "#274f7d";
      nextStep.onclick = () => handleFormData();
    } else if (step === 0) {
      formPrevAnimation();
      nextStep.style.backgroundColor = "#9843dd";
      nextStep.textContent = "Next step";
      nextStep.onclick = () => handleStep(1);
      prevForm.style.display = "flex";
    }
  }


  function handleFormData() {
    const nextFormData = new FormData(nextForm);
    let isValid = true;

    nextFormData.forEach((value, key) => {
      if (req_fields.includes(key) && !value) {
        isValid = false;
        const input = nextForm.querySelector(`[name="${key}"]`);
        const password = nextForm.querySelector(".password-input");
        if (input) input.classList.add("invalid-input");
        if (password) password.classList.add("invalid-input");

      }
    })

    if (!isValid) return;

    prevFormData.forEach((value, key) => {
      formData.append(key, value);
    });

    nextFormData.forEach((value, key) => {
      formData.append(key, value);
    });

    createUser(formData);
  }

  async function createUser(formData) {
    const response = await fetch("/api/users.php", {
      method: "POST",
      body: formData,
    });

    const data = await response.json();

    if (response.ok) {
      alert("User created successfully");
    }
  }

  const prevFormInputs = prevForm.querySelectorAll(".form-input");
  const nextFormInputs = nextForm.querySelectorAll(".form-input");

  function formNextAnimation() {
    setTimeout(() => {
      formContainer.style.minHeight = nextFormHeight + 25 + "px";
      prevForm.style.left = "-100%";
      prevForm.style.position = "absolute";
      prevForm.style.opacity = 0;
    }, 0)

    nextForm.style.opacity = 1;
    nextForm.style.left = "0";
  }

  function formPrevAnimation() {
    setTimeout(() => {
      formContainer.style.minHeight = prevFormHeight + 25 + "px";
      nextForm.style.left = "100%";
      nextForm.style.position = "absolute";
      nextForm.style.opacity = 0;
    }, 0)

    prevForm.style.opacity = 1;
    prevForm.style.left = "0";
  }

  const usersPerPage = 15;
  let currentPage = 1;
  const tableContent = document.querySelector(".table-content");

  async function fetchUsers(page = 1) {
    const paginationContainer = document.querySelector(".pagination");

    const response = await fetch(`/api/users.php?page=${page}&limit=${usersPerPage}`);
    const data = await response.json();

    tableContent.innerHTML = '';

    if (data.length === 0) {
      tableContent.innerHTML = `
      <div class="empty">
      <svg  xmlns="http://www.w3.org/2000/svg"  width="94"  height="94"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.3"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-mood-sad-dizzy"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M14.5 16.05a3.5 3.5 0 0 0 -5 0" /><path d="M8 9l2 2" /><path d="M10 9l-2 2" /><path d="M14 9l2 2" /><path d="M16 9l-2 2" /></svg>
      <h3>No users found</h3>
      </div>
    `;
      return;
    }

    data.users.forEach((user, index) => {
      const createdAt = new Date(user.created_at);
      const formattedDate = createdAt.toLocaleDateString("en-US", {
        year: "numeric",
        month: "long",
        day: "numeric",
      });
      const tableData = document.createElement("div");

      tableData.classList.add("table-data");
      tableData.innerHTML = `
        <p>${user.user_id}</p>
        <div class="user-column-container">
          <div class="user-photo-container">
            <img class="user-photo-container" src="${user.user_photo}" />
          </div>
          <div class="user-info">
            <h3>${user.first_name} ${user.last_name}</h3>
            <p style="opacity: 0.7">@${user.username}</p>
          </div>
        </div>
        <p>${user.gender}</p>
        <p>${user.email}</p>
        <p>${user.country.toUpperCase()}</p>
        <p>${formattedDate}</p>
        <button type="button" class="action-button">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-dots-vertical">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
            <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
            <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
          </svg>
        </button>
      `;

      if (index === usersPerPage - 1 || index === data.users.length - 1) {
        tableData.style.borderBottom = "none";
      }

      tableContent.append(tableData);
    })

    if (currentPage == 2) {
      const endMessage = document.createElement("p");
      endMessage.classList.add("end-message");
      endMessage.textContent = "No more users found";
      tableContent.append(endMessage);
    }

    const pagination = document.createElement("div");
    pagination.classList.add("pagination");
    tableContent.append(pagination);

    updatePagination(data.totalPages)
  }

  function updatePagination(totalPages) {
    const paginationContainer = tableContent.querySelector(".pagination");

    if (paginationContainer) {
      paginationContainer.innerHTML = `
        <button ${currentPage === 1 ? "disabled" : ""} onclick="changePage(-1)" class="icon-label">
        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>
        </button>
        <p>${currentPage} of ${totalPages}</p>
        <button ${currentPage === totalPages ? "disabled" : ""} onclick="changePage(1)" class="icon-label">
        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
            </button>
      `;
    }
  }

  function changePage(direction) {
    currentPage += direction;
    fetchUsers(currentPage);
  }

  document.addEventListener("DOMContentLoaded", fetchUsers());
</script>
