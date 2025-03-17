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
