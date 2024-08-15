document.getElementById('nickname').addEventListener('blur', function() {
    const nombre = this.value;
    const errorNickname = document.getElementById('errorNick');
    fetch('../controllers/validar.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `nickname=${encodeURIComponent(nombre)}`,
    })
    .then(response => response.text())  // Cambia a `text()` para ver el contenido
    .then(text => {
        try {
            const data = JSON.parse(text);  // Intenta parsear el texto a JSON
            if (data.existe) {
                
                errorNickname.textContent = 'Nickname no disponible pudes usar números';
            } else {
                errorNickname.textContent = '';
            }
        } catch (e) {
            console.error('Error al parsear JSON:', e);
        }
    })
    .catch(error => console.error('Error:', error));
});


function validarSeleccionAvatar() {
    // Busca el radio button que está marcado
    const avatarSeleccionado = document.querySelector('input[name="avatar"]:checked');
    
    if (!avatarSeleccionado) {
        return false; // Evita que el formulario se envíe o que se realice la acción
    }

    // Si hay un avatar seleccionado, permite continuar
    return true;
}

// validaciones.js
document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    const errorNick = document.getElementById('errorNick');
    const errorContrasena = document.getElementById('errorContrasena');
    const errorAvatar = document.getElementById('errorAvatar');
    

    form.addEventListener('submit', function (event) {
        let hasErrors = false;

        // Verificar si hay errores visibles
        if (errorNick.textContent !== '') {

            hasErrors = true;
        }
        if( errorContrasena.textContent !== ''){
            hasErrors = true;
        }
        if(!validarSeleccionAvatar()){
            hasErrors = true;
            errorAvatar.textContent= 'Porfavor seleccione un avatar';

        }else{
            errorAvatar.textContent= '';
        }
        // Evitar el envío del formulario si hay errores
        if (hasErrors) {
            event.preventDefault();
            document.getElementById('venError').style.display="block";
        }else{
            document.getElementById('venSuccess').style.display = "block";
        }
    });
});
