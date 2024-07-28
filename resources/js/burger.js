document.addEventListener("DOMContentLoaded", function () {
    const burgerMenu = document.getElementById("burger__menu");
    const overlay = document.getElementById("menu");
  
    if (burgerMenu && overlay) {
      burgerMenu.addEventListener("click", function () {
        this.classList.toggle("close");
        overlay.classList.toggle("overlay");
      });
    }
  });
  const getElementById = function (id) { // Renommer la fonction $ en getElementById
    return document.getElementById(id);
};

const show = function (id) {
    getElementById(id).style.display = "block";
};

const hide = function (id) {
    getElementById(id).style.display = "none";
};