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
    <button type="button" class="primary-button icon-label" onclick="openCreatePopup()">
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
      <h4>Password</h4>
      <h4>Created at</h4>
      <h4>Updated at</h4>
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
      <form id="gen_info_form">
        <h3 class="sub-title">General information</h3>
        <div class="form-input">
          <label for="name">Name</label>
          <div class="flex">
            <input type="text" name="first_name" placeholder="First name">
            <input type="text" name="last_name" placeholder="Last name">
          </div>
        </div>
        <div class="form-input">
          <label for="email">Email</label>
          <input type="email" name="email" placeholder="Email address">
        </div>
        <div class="form-input">
          <label for="phone">Phone</label>
          <input type="tel" name="phone" placeholder="Phone number">
        </div>
        <div class="form-input">
          <label for="birthdate">Birthdate</label>
          <input type="date" name="birthdate">
        </div>
        <div class="form-input">
          <label for="city">City</label>
          <input type="text" name="city" placeholder="City">
        </div>
        <div class="form-input">
          <label for="address">Address</label>
          <input type="text" name="address" placeholder="Address">
        </div>
        <div class="form-input">
          <label for="postal_code">Postal Code</label>
          <input type="text" name="postal_code" placeholder="Postal code">
        </div>
      </form>
      <form id="per_info_form">
        <div class="icon-label">
          <h3 class="sub-title">Personal information</h3>
        </div>
        <div class="form-input">
          <label for="username">Username</label>
          <input type="text" name="username" placeholder="Username">
        </div>
        <div class="form-input">
          <label for="password">Password</label>
          <input type="text" name="password" placeholder="Password">
        </div>
        <div class="form-input">
          <label for="bio">Biography</label>
          <textarea name="bio" placeholder="Say something about yourself"></textarea>
        </div>
        <div class="form-input">
          <label for="user_photo">Profile picture</label>
          <div class="user-photo-wrapper">
            <div class="user-photo-container"></div>
            <div class="icon-button upload-button">
              <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-upload">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                <path d="M7 9l5 -5l5 5" />
                <path d="M12 4l0 12" />
              </svg>
            </div>
            <p>Click to upload or drag and drop<br />
              SVG, PNG, or JPG (max. 2MB)</p>
            <input style="display: none;" type="file" name="user_photo">
          </div>
        </div>
      </form>
      <div class="flex button-container">
        <button id="prev-step" type="button" class="secondary-button" onclick="closePopup()">
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

  document.addEventListener("DOMContentLoaded", fetchUsers());

  popup.addEventListener("click", (e) => {
    if (e.target === popup) {
      closePopup();
    }
  })

  userPhotoWrapper.addEventListener("click", () => {
    userPhotoInput.click();
  })

  function openCreatePopup() {
    popup.style.display = "flex";
    popup.style.visibility = "visible";

    setTimeout(() => {
      popup.style.opacity = 1;
      popupContainer.style.transform = "scale(1)";
    }, 0);
  }

  function closePopup() {
    setTimeout(() => {
      popup.style.opacity = 0;
      popupContainer.style.transform = "scale(0.95)";
      popup.style.visibility = "hidden";
    }, 0);

    setTimeout(() => {
      popup.style.display = "none";
    }, 300);
  }

  let step = 0;
  const nextStep = document.querySelector("#next-step");
  const nextForm = document.querySelector("#per_info_form");
  const prevForm = document.querySelector("#gen_info_form");

  function handleStep(num) {
    step += num;

    const existingBackButton = document.querySelector(".back-button");
    if (existingBackButton) {
      existingBackButton.remove();
    }

    if (step === 1) {
      nextForm.style.display = "flex";
      prevForm.style.display = "none";

      const backButton = document.createElement("button");
      backButton.innerHTML = `
      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M5 12l14 0" />
        <path d="M5 12l6 6" />
        <path d="M5 12l6 -6" />
      </svg>
    `;
      backButton.type = "button";
      backButton.classList.add("back-button");
      backButton.onclick = () => handleStep(-1);

      nextForm.querySelector(".icon-label").prepend(backButton);
    } else if (step === 0) {
      nextForm.style.display = "none";
      prevForm.style.display = "flex";
    }
  }


  async function fetchUsers() {
    const tableContent = document.querySelector(".table-content");

    const response = await fetch("/api/users.php");
    const data = await response.json();

    if (data.length === 0) {
      tableContent.innerHTML = `
      <div class="empty">
      <svg  xmlns="http://www.w3.org/2000/svg"  width="94"  height="94"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.3"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-mood-sad-dizzy"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M14.5 16.05a3.5 3.5 0 0 0 -5 0" /><path d="M8 9l2 2" /><path d="M10 9l-2 2" /><path d="M14 9l2 2" /><path d="M16 9l-2 2" /></svg>
      <h3>No users found</h3>
      </div>
    `;
    }
  }
</script>