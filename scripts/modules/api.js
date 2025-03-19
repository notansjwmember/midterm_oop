async function createUser(formData) {
  const response = await fetch("/api/users.php", {
    method: "POST",
    body: formData,
  });

  if (response.ok) {
    alert("User created successfully");

    prevForm.reset();
    nextForm.reset();
    closePopup(popup, popupContainer, formContainer);

    fetchUsers();
  }
}

async function fetchUser(user_id) {
  const response = await fetch(`/api/users.php?user_id=${user_id}`);
  const data = await response.json();

  console.log(data);
  user = data;
}

async function fetchUsers(page = 1) {
  const response = await fetch(
    `/api/users.php?page=${page}&limit=${usersPerPage}&action=all`,
  );
  const data = await response.json();

  tableContent.innerHTML = "";

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
        <button type="button" class="action-button" onclick="openActionPopup(event, ${user.user_id})">
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
  });

  if (currentPage == data.totalPages) {
    const endMessage = document.createElement("p");
    endMessage.classList.add("end-message");
    endMessage.textContent = "No more users found";
    tableContent.append(endMessage);
  }

  const pagination = document.createElement("div");
  pagination.classList.add("pagination");
  tableContent.append(pagination);

  updatePagination(data.totalPages);
}
