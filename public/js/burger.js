document.addEventListener('DOMContentLoaded', function() {
    const burgerMenu = document.getElementById('burger__menu');
    const menu = document.getElementById('menu');

    burgerMenu.addEventListener('click', function() {
        this.classList.toggle('active');
        menu.classList.toggle('active');
    });
});
