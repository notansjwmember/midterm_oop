<?php
include_once "./config/db.php";
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
    <button type="button" class="primary-button icon-label">
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
      <div class="text-container">
        <h2>Create a user</h2>
        <p style="opacity: 0.7;">Please fill in the inputs to proceed.</p>
      </div>
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
          <label for="username">Username</label>
          <input type="text" name="username" placeholder="Username">
        </div>
        <div class="form-input">
          <label for="password">Password</label>
          <input type="text" name="password" placeholder="Password">
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
      <div class="flex button-container">
        <button type="button" class="secondary-button">
          Cancel
        </button>
        <button type="submit" class="primary-button">
          Next step
        </button>
      </div>
    </div>
  </div>
</body>

</html>

<script>
  const isOpen = false;

  document.addEventListener("DOMContentLoaded", fetchUsers());

  async function fetchUsers() {
    const tableContent = document.querySelector(".table-content");

    const response = await fetch("/api/users.php");
    const data = await response.json();

    if (data.length === 0) {
      tableContent.innerHTML = `
      <div class="empty">
      <svg  xmlns="http://www.w3.org/2000/svg"  width="94"  height="94"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-mood-sad-dizzy"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M14.5 16.05a3.5 3.5 0 0 0 -5 0" /><path d="M8 9l2 2" /><path d="M10 9l-2 2" /><path d="M14 9l2 2" /><path d="M16 9l-2 2" /></svg>
      <h3>No users found</h3>
      </div>
    `;
    }
  }
</script>