// document.addEventListener('DOMContentLoaded', function() {
//     const menuToggle = document.getElementById('burger__menu');
//     const menu = document.getElementById('menu');

//     menuToggle.addEventListener('click', function() {
//         menu.classList.toggle('overlay');
//         menuToggle.classList.toggle('active');
//     });
// });
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
  $ = function (id) {
    return document.getElementById(id);
  };

  const show = function (id) {
    $(id).style.display = "block";
  };
  const hide = function (id) {
    $(id).style.display = "none";
  };
