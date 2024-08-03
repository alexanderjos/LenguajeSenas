// Maneja el evento de clic en el botón de salir
document.getElementById('exitButton').addEventListener('click', function(event) {
    event.preventDefault();
    Swal.fire({
        title: '¿Estás seguro de que quieres salir del juego?',
        showCancelButton: true,
        confirmButtonText: `Sí, salir`,
        cancelButtonText: `No, cancelar`,
        icon: 'warning'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '../index.html'; // Redirigir a la página principal
        }
    });
});

