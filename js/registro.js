// Define la función selectAvatar globalmente
function selectAvatar(imgElement) {
    // Quitar la clase 'selected' de todas las imágenes
    document.querySelectorAll('.avatar-img').forEach(img => img.classList.remove('selected'));

    // Añadir la clase 'selected' a la imagen seleccionada
    imgElement.classList.add('selected');

    // Seleccionar el input radio correspondiente usando el atributo data-avatar-id
    const avatarId = imgElement.getAttribute('data-avatar-id');
    const radioInput = document.getElementById(avatarId);

    if (radioInput) {
        radioInput.checked = true;
    } else {
        console.error(`No se encontró el input radio con ID: ${avatarId}`);
    }
}

document.addEventListener('DOMContentLoaded', function() {
    // Selección de género
    document.querySelectorAll('.btn-check').forEach(radio => {
        radio.addEventListener('change', function() {
            document.querySelectorAll('.gender-button').forEach(button => button.classList.remove('selected'));
            if (this.checked) {
                document.querySelector(`label[for=${this.id}]`).classList.add('selected');
            }
        });
    });

    // Selección de avatar
    // Añadir evento a todas las imágenes de avatares para seleccionarlos cuando se hace clic
    document.querySelectorAll('.avatar-img').forEach(img => {
        img.addEventListener('click', function() {
            selectAvatar(this); // Llama a la función global
        });
    });

    // Alternar la visibilidad de la contraseña
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

    // Alternar la visibilidad de la confirmación de contraseña
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

    // Validación de contraseñas
    const contrasenaInput = document.getElementById('password');
    const confirmarContrasenaInput = document.getElementById('password-confirm');
    const errorContrasena = document.getElementById('errorContrasena');

    function validarContrasenas() {
        if (contrasenaInput.value === confirmarContrasenaInput.value || confirmarContrasenaInput.value === '') {
            // Si las contraseñas coinciden o el campo de confirmación está vacío, borra el mensaje de error
            errorContrasena.textContent = '';
        } else {
            // Si las contraseñas no coinciden, muestra un mensaje de error
            errorContrasena.textContent = 'Las contraseñas no coinciden.';
        }
    }

    // Añade un escuchador de eventos para cuando el usuario escribe en el campo de la contraseña
    contrasenaInput.addEventListener('input', validarContrasenas);
    // Añade un escuchador de eventos para cuando el usuario escribe en el campo de confirmación de contraseña
    confirmarContrasenaInput.addEventListener('input', validarContrasenas);
     // Inicializar Pikaday
     var picker = new Pikaday({
        field: document.getElementById('birthdate'),
        format: 'YYYY-MM-DD',
        minDate: new Date(1900, 0, 1),
        maxDate: new Date(),
        yearRange: [1900, 2024],
        theme: 'dark-theme'
    });

    // Abrir Pikaday al hacer clic en el ícono del calendario
    document.getElementById('calendar-icon').addEventListener('click', function() {
        picker.show();
    });
});
