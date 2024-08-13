document.querySelectorAll('.btn-check').forEach(radio => {
    radio.addEventListener('change', function() {
        document.querySelectorAll('.gender-button').forEach(button => button.classList.remove('selected'));
        if (this.checked) {
            document.querySelector(`label[for=${this.id}]`).classList.add('selected');
        }
    });
});

function selectAvatar(imgElement) {
    // Quitar la clase 'selected' de todas las imágenes
    document.querySelectorAll('.avatar-img').forEach(img => img.classList.remove('selected'));

    // Añadir la clase 'selected' a la imagen seleccionada
    imgElement.classList.add('selected');

    // Seleccionar el input radio correspondiente
    const avatarId = imgElement.alt.replace('Avatar ', 'avatar');
    document.getElementById(avatarId).checked = true;
}

document.addEventListener('DOMContentLoaded', function() {
    const calendar = flatpickr("#birthdate", {
        dateFormat: "Y-m-d",
        maxDate: "today",
        minDate: "1900-01-01",
        clickOpens: false // Evitar que el calendario se abra al hacer clic en el campo de texto
    });

    const calendarButton = document.querySelector('#calendar-button');
    calendarButton.addEventListener('click', function() {
        calendar.open(); // Abrir el calendario al hacer clic en el botón
    });

    const togglePassword = document.querySelector('#toggle-password');
    const passwordField = document.querySelector('#password');

    togglePassword.addEventListener('click', function() {
        // Alternar el tipo de campo
        const type = passwordField.type === 'password' ? 'text' : 'password';
        passwordField.type = type;

        // Alternar el ícono
        const icon = this.querySelector('i');
        icon.classList.toggle('fa-eye');
        icon.classList.toggle('fa-eye-slash');
    });

    const togglePasswordConfirm = document.querySelector('#toggle-password-confirm');
    const passwordConfirmField = document.querySelector('#password-confirm');

    togglePasswordConfirm.addEventListener('click', function() {
        // Alternar el tipo de campo
        const type = passwordConfirmField.type === 'password' ? 'text' : 'password';
        passwordConfirmField.type = type;

        // Alternar el ícono
        const icon = this.querySelector('i');
        icon.classList.toggle('fa-eye');
        icon.classList.toggle('fa-eye-slash');
    });
});


document.addEventListener('DOMContentLoaded', () => {
    // Selecciona los elementos del DOM
    const contrasenaInput = document.getElementById('password');
    const confirmarContrasenaInput = document.getElementById('password-confirm');
    const errorContrasena = document.getElementById('errorContrasena');

    // Función para validar que las contraseñas coincidan
    function validarContrasenas() {
        if (contrasenaInput.value === confirmarContrasenaInput.value) {
            // Si las contraseñas coinciden, borra el mensaje de error
            errorContrasena.textContent = '';
        } else {
            // Si las contraseñas no coinciden, muestra un mensaje de error
            errorContrasena.textContent = 'Las contraseñas no coinciden.';
        }
    }
    // Añade un escuchador de eventos para cuando el usuario escribe en el campo de confirmar contraseña
    confirmarContrasenaInput.addEventListener('input', validarContrasenas);
});
