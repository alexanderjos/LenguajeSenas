

document.addEventListener('DOMContentLoaded', () => {
    const menuToggle = document.querySelector('.menu-toggle');
    const menu = document.querySelector('.menu');

    if (menuToggle && menu) {
        menuToggle.addEventListener('click', () => {
            menu.style.left = (menu.style.left === '0px') ? '-300px' : '0px';
        });
    } else {
        console.error('Elementos de menú no encontrados.');
    }
});
