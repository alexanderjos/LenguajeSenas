document.addEventListener('DOMContentLoaded', function () {
    actualizarDatos(); // Llamada inmediata para actualizar las vidas rápidamente
    consultar();
});

const corazones = document.getElementById('corazones');
const monedas = document.getElementById('monedas');
const tiempo = document.getElementById('timer');

function consultar() {
    const consulta = setInterval(() => {
        if (corazones.textContent === '') {
            tiempo.textContent = '';
        } else if (parseInt(corazones.textContent) < 4) {
            clearInterval(consulta);
            vidas(); // Iniciar el cronómetro cuando hay menos de 4 corazones
        } else {
            actualizarDatos();
        }
    }, 1000);
}

function actualizarDatos() {
    const id = document.getElementById('nickname').innerText; // Obtener el valor del nickname

    if (id) {
        fetch('../models/juego.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `id=${encodeURIComponent(id)}`, // Cuerpo de la solicitud en formato URL-encoded
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                corazones.textContent = data.Corazones; // Actualiza el número de corazones
                monedas.textContent = data.Monedas;

                if (corazones.textContent === '4') {
                    tiempo.textContent = 'Lleno';
                }
            })
            .catch(error => console.error('Error:', error));
    } else {
        console.log('ID is empty.');
    }
}

function vidas() {
    const tiempoRestante = calcularTiempoRestante(); // Calcula el tiempo restante usando la hora actual y la hora guardada

    if (parseInt(corazones.textContent) === 4) {
        tiempo.textContent = 'Lleno';
        localStorage.removeItem('horaInicio'); // Eliminar la hora de inicio si ya está lleno
    } else {
        let time = tiempoRestante > 0 ? tiempoRestante : 15 * 60; // Usa el tiempo restante o 15 minutos si no hay uno guardado

        if (!localStorage.getItem('horaInicio')) {
            // Guarda la hora de inicio si no existe
            localStorage.setItem('horaInicio', Date.now());
        }

        const cronometro = setInterval(() => {
            const minutos = Math.floor(time / 60);
            const segundos = time % 60;
            tiempo.textContent = `${minutos.toString().padStart(2, '0')}:${segundos.toString().padStart(2, '0')}`;
            time--;

            if (time < 0) {
                clearInterval(cronometro); // Detener el cronómetro
                localStorage.removeItem('horaInicio'); // Limpiar la hora de inicio almacenada al terminar
                actualizarVida()
                    .then(() => {
                        vidas(); // Reiniciar el cronómetro para la siguiente vida
                    })
                    .catch(error => console.error('Error al actualizar la vida:', error));
            }
        }, 1000);
    }
}

function calcularTiempoRestante() {
    const horaInicio = localStorage.getItem('horaInicio');
    if (horaInicio) {
        const ahora = Date.now();
        const tiempoPasado = Math.floor((ahora - parseInt(horaInicio)) / 1000); // Tiempo pasado en segundos
        const tiempoTotal = 15 * 60; // 15 minutos en segundos
        return tiempoTotal - tiempoPasado; // Devuelve el tiempo restante
    }
    return 0; // Si no hay hora guardada, considera que no hay tiempo restante
}

function actualizarVida() {
    const nickname = document.getElementById('nickname').innerText;
    const vida = parseInt(corazones.textContent) + 1;

    return new Promise((resolve, reject) => {
        if (nickname && !isNaN(vida)) {
            fetch('../models/juego.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `nickname=${encodeURIComponent(nickname)}&vida=${encodeURIComponent(vida)}`,
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('La respuesta de la red no fue exitosa.');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.existe) {
                        corazones.textContent = vida; // Actualiza el contenido con el nuevo valor
                        resolve(); // Resuelve la promesa cuando se complete la actualización
                    } else {
                        reject(data.error || 'No se actualizó ningún registro.');
                    }
                })
                .catch(error => reject(error));
        } else {
            console.log('El nickname está vacío o la vida es inválida.');
                reject('El nickname está vacío o la vida es inválida.');
        }
    });
}
window.addEventListener('beforeunload', function (event) {
    // Muestra una alerta personalizada
    const nickname = req.session.nickname;    
    // Para mostrar una confirmación antes de salir
    this.alert(nickname);
});

