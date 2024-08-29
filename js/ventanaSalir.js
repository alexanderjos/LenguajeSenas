// Maneja el evento de clic en el botón de salir
document.getElementById('exitButton')?.addEventListener('click', function(event) {
    event.preventDefault();
    const user = this.getAttribute('data-user');

    Swal.fire({
        title: '¿Estás seguro de que quieres salir del juego?',
        showCancelButton: true,
        confirmButtonText: `Sí, salir`,
        cancelButtonText: `No, cancelar`,
        icon: 'warning'
    }).then((result) => {
        if (result.isConfirmed) {
            console.log(user);
            // window.location.href = '../juego.php'; // Redirigir a la página principal
        }
    });
});