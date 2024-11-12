// Maneja el evento de clic en el botón de salir
document.getElementById('exitButton')?.addEventListener('click', function(event) {
    event.preventDefault();
    const user = this.getAttribute('data-user');

    Swal.fire({
        title: '¿Estás seguro de que quieres salir del juego?',
        showCancelButton: true,
        confirmButtonText: 'Sí, salir',
        cancelButtonText: 'No, cancelar',
        icon: 'warning'
    }).then((result) => {
        if (result.isConfirmed) {
            if (user) {
                fetch('../../models/perderVidas.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `nickname=${encodeURIComponent(user)}`
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('La respuesta de la red no fue exitosa.');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.existe) {
                            window.location.href = '../juego.php';
                        } else {

                            throw new Error(data.error || 'No se actualizó ningún registro.');
                            
                        }
                    })
                    .catch(error => console.error('Error al actualizar la vida:', error));
            } else {
                // Lanzar un error si el nickname es inválido
                console.error('El nickname está vacío o no es válido.');
            }
        }
    });
});
