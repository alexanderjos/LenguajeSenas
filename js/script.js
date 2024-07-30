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

function selectLevel(level) {
    alert('Has seleccionado el Nivel ' + level);
    console.log(level)
    // Aquí puedes añadir el código para cargar el nivel seleccionado
    // Por ejemplo, redirigir a otra página o cambiar el contenido dinámicamente

}

