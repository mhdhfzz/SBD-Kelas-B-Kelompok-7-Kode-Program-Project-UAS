// Toggle class active
const navbarNav = document.querySelector(".navbar-nav");
// ketika hamburger menu di klik
document.querySelector("#hamburger-menu").onclick = () => {
  navbarNav.classList.toggle("active");
};

// Klik di luar side bar untuk menghilangkan nav
const hamburger = document.querySelector("#hamburger-menu");

document.addEventListener("clik", function (e) {
  if (!hamburger.contains(e.target) && !navbarNav.contains(e.target)) {
    navbarNav.classList.remove;
  }
});

// Uploud Gambar
document.getElementById("fileImg").onchange = function () {
  document.getElementById("image").src = URL.createObjectURL(fileImg.files[0]); // Preview new image

  document.getElementById("cancel").style.display = "block";
  document.getElementById("confirm").style.display = "block";

  document.getElementById("upload").style.display = "none";
};

var userImage = document.getElementById("image").src;
document.getElementById("cancel").onclick = function () {
  document.getElementById("image").src = userImage; // Back to previous image

  document.getElementById("cancel").style.display = "none";
  document.getElementById("confirm").style.display = "none";

  document.getElementById("upload").style.display = "block";
};
