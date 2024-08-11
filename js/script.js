// Maneja el evento de clic en el botón de salir
document.getElementById('exitButton')?.addEventListener('click', function(event) {
    event.preventDefault();
    Swal.fire({
        title: '¿Estás seguro de que quieres salir del juego?',
        showCancelButton: true,
        confirmButtonText: `Sí, salir`,
        cancelButtonText: `No, cancelar`,
        icon: 'warning'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '../juego.html'; // Redirigir a la página principal
        }
    });
});

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
