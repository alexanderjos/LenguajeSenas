// js/script.js
function getRandomNumber() {
    return Math.floor(Math.random() * 8);
}

cargarPregunta(getRandomNumber());
// Asegúrate de que este archivo se cargue después de data.js
function cargarPregunta(index) {
    // Asegúrate de que `baseDePreguntas` esté disponible
    if (typeof baseDePreguntas === 'undefined') {
        console.error('La base de preguntas no está disponible.');
        return;
    }

    objetoPregunta = baseDePreguntas[index];
    
    // Actualiza la pregunta
    document.getElementById("pregunta").innerHTML = objetoPregunta.pregunta;

    // Actualiza la imagen de la seña
    const imagen = document.getElementById('miImagen');
    imagen.src = objetoPregunta.senia; // Usa la variable directamente

    //arreglo para las alternativas
    opciones = [...objetoPregunta.distractores]
    opciones.push(objetoPregunta.respuesta)
    for(let i=0; i<8;i++){
        opciones.sort(()=>Math.random()-0.5);
    }
    const imagen1 = document.getElementById('alternativa1');
    imagen1.src = opciones[0];
    const imagen2 = document.getElementById('alternativa2');
    imagen2.src = opciones[1];
    const imagen3 = document.getElementById('alternativa3');
    imagen3.src = opciones[2];
    const imagen4 = document.getElementById('alternativa4');
    imagen4.src = opciones[3];
    const imagen5 = document.getElementById('alternativa5');
    imagen5.src = opciones[4];
    const imagen6 = document.getElementById('alternativa6');
    imagen6.src = opciones[5];
    const imagen7 = document.getElementById('alternativa7');
    imagen7.src = opciones[6];
    const imagen8 = document.getElementById('alternativa8');
    imagen8.src = opciones[7];

}

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
