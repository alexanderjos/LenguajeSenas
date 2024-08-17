document.addEventListener('DOMContentLoaded', () => {
    const vidas = parseInt(document.getElementById('countdown').innerText); // Convertir a número Se pasa a número para hacer la validación como esta en el if
    const textVida = document.getElementById('timer');

    if (vidas === 3) {
        textVida.innerText = 'Lleno';
    }
});
