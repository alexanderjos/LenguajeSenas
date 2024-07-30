document.addEventListener('DOMContentLoaded', () => {
    const menuToggle = document.querySelector('.menu-toggle');
    const menu = document.querySelector('.menu');

    menuToggle.addEventListener('click', () => {
        if (menu.style.left === '0px') {
            menu.style.left = '-300px';
        } else {
            menu.style.left = '0px';
        }
    });
});


