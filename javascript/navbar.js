const hamburger = document.querySelector(".hamburger");
const nav_menu = document.querySelector(".navbar-menu");

// Tambahkan event listener pada elemen hamburger
hamburger.addEventListener("click", function () {
  // Toggle kelas CSS 'hidden' pada elemen menu
  hamburger.classList.toggle("active");
  nav_menu.classList.toggle("active");
});
