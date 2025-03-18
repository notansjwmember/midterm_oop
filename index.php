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
    <button type="button" class="primary-button icon-label" onclick="openPopup(popups[0])">
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
        <button type="button" class="secondary-button" onclick="closePopup(popups[0])">
          Cancel
        </button>
        <button id="next-step" type="submit" class="primary-button" onclick="handleStep(1)">
          Next step
        </button>
      </div>

    </div>
  </div>

  <div class="popup-action-container">
    <div class="flex popup-action-button edit-button">
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-edit">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
        <path d="M6 21v-2a4 4 0 0 1 4 -4h3.5" />
        <path d="M18.42 15.61a2.1 2.1 0 0 1 2.97 2.97l-3.39 3.42h-3v-3l3.42 -3.39z" />
      </svg>
      <p>Edit</p>
    </div>
    <div class="line" style="opacity: 0.5;"></div>
    <div class="flex popup-action-button delete-button">
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M4 7l16 0" />
        <path d="M10 11l0 6" />
        <path d="M14 11l0 6" />
        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
      </svg>
      <p>Delete</p>
    </div>
  </div>

  <div class="popup-edit-wrapper">
    <div class="popup-edit-container">

      <div class="icon-label" style="gap: 1rem;">
        <div class="icon-circle">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-edit">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
            <path d="M6 21v-2a4 4 0 0 1 4 -4h3.5" />
            <path d="M18.42 15.61a2.1 2.1 0 0 1 2.97 2.97l-3.39 3.42h-3v-3l3.42 -3.39z" />
          </svg>
        </div>
        <div class="text-container">
          <h2>Edit user</h2>
          <p style="opacity: 0.7;">Modify existing values from a user</p>
        </div>
      </div>

      <div class="line"></div>

      <div class="edit-form-container">
        <div class="form-options">
          <div class="edit-form-option" data-form="1">
            <h3>General information</h3>
            <p>Edit fields like name, gender, email, and etc</p>
          </div>
          <div class="edit-form-option" data-form="2">
            <h3>Personal information</h3>
            <p>Edit fields like username, password, profile picture or their bio</p>
          </div>
        </div>

        <form id="gen_info_form">
          <div class="icon-label">
            <button type="button" class="back-button" onclick="changeEditFormStep(1)">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M5 12l14 0" />
                <path d="M5 12l6 6" />
                <path d="M5 12l6 -6" />
              </svg>
            </button>
            <h3 class="sub-title">General information</h3>
          </div>
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
            <label for="country">Gender</label>
            <select name="gender">
              <option value="">Select a gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
              <option value="other">Other</option>
            </select>
          </div>
          <div class="form-input">
            <label for="country">Country</label>
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
            <button type="button" class="back-button" onclick="changeEditFormStep(1)">
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
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Username">
          </div>
          <div class="form-input">
            <label for="password">Password</label>
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
              <input id="edit-user-photo" style="display: none;" type="file" name="user_photo">
            </div>
          </div>
        </form>

      </div>

      <div class="flex button-container">
        <button type="button" class="secondary-button" onclick="closeEditPopup(popups[1])">
          Cancel
        </button>
        <button id="next-step-edit" type="submit" class="primary-button" onclick="handleEditFormStep(formOption)">
          Next step
        </button>
      </div>

    </div>
  </div>

  <div class="popup-delete-wrapper"></div>

  <script src="scripts/modules/popup.js"></script>
  <script src="scripts/modules/form.js"></script>
  <script src="scripts/modules/api.js"></script>
  <script src="scripts/modules/table.js"></script>
  <script src="scripts/main.js"></script>

</body>

</html>
