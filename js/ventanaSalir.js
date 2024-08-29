// Maneja el evento de clic en el botón de salida
const { vida3 } = require('/js/juego.js');
document.getElementById('exitButton')?.addEventListener('click', function(event) {
    event.preventDefault();
    
    // Obtén el valor del atributo data-user
    const user = this.getAttribute('data-user');

    Swal.fire({
        title: '¿Estás seguro de que quieres salir del juego?',
        showCancelButton: true,
        confirmButtonText: 'Sí, salir',
        cancelButtonText: 'No, cancelar',
        icon: 'warning'
    }).then((result) => {
        if (result.isConfirmed) {
            console.log(user);
            // Access the global variable
            console.log(`Vida inicial: ${vida3}`); // Debería mostrar 0
            //window.location.href = '../juego.php'; 
        }
    });
});
