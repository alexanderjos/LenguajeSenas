// Función para obtener un número aleatorio entre 0 y 6
function getRandomNumber() {
    return Math.floor(Math.random() * 7);
}

// Cargar una pregunta aleatoria al iniciar
cargarPregunta(getRandomNumber());

// Función para cargar una pregunta basada en un índice
function cargarPregunta(index) {
    // Verifica que `baseDePreguntas` esté disponible
    if (typeof baseDePreguntas === 'undefined') {
        console.error('La base de preguntas no está disponible.');
        return;
    }

    // Obtiene la pregunta correspondiente al índice
    objetoPregunta = baseDePreguntas[index];
    
    // Actualiza el texto de la pregunta en el DOM
    document.getElementById("pregunta").innerHTML = objetoPregunta.pregunta;

    // Actualiza la imagen de la seña
    const imagen = document.getElementById('miImagen');
    imagen.src = objetoPregunta.senia;

    // Arreglo para las alternativas de respuesta
    opciones = [...objetoPregunta.distractores];
    opciones.push(objetoPregunta.respuesta);

    // Mezcla las opciones de manera aleatoria
    for (let i = 0; i < 8; i++) {
        opciones.sort(() => Math.random() - 0.5);
    }

    // Asigna las opciones a las imágenes en el DOM
    document.getElementById('alternativa1').src = opciones[0];
    document.getElementById('alternativa2').src = opciones[1];
    document.getElementById('alternativa3').src = opciones[2];
    document.getElementById('alternativa4').src = opciones[3];
    document.getElementById('alternativa5').src = opciones[4];
    document.getElementById('alternativa6').src = opciones[5];
    document.getElementById('alternativa7').src = opciones[6];
    document.getElementById('alternativa8').src = opciones[7];
}

// Función para manejar la selección de una opción
function seleccionarOpcion(index) {
    let validez = opciones[index] === objetoPregunta.respuesta;
    if (validez) {
        Swal.fire({
            title: "Respuesta correcta",
            text: "La respuesta ha sido correcta",
            icon: "success",
        });
    } else {
        Swal.fire({
            title: "Respuesta incorrecta",
            text: "La respuesta es incorrecta",
            icon: "error",
        });
    }
}


