// global variable for setting table content
const tableContent = document.querySelector(".table-content");

// global variables essential for form animation
let nextFormHeight;
let prevFormHeight;

// controls for pagination
let usersPerPage = 15;
let currentPage = 1;

// fill in table
document.addEventListener("DOMContentLoaded", fetchUsers());
