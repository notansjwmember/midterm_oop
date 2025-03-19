// global variable for setting table content
const tableContent = document.querySelector(".table-content");

// global variables essential for form animation
let nextFormHeight;
let prevFormHeight;
let formOptionHeight;

// controls for pagination
let usersPerPage = 10;
let currentPage = 1;

let user;

// fill in table
document.addEventListener("DOMContentLoaded", fetchUsers());
