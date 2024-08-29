// Selección de elementos de la lista y las zonas de caída
const listItems = document.querySelectorAll('#draggable-list li');
const dropZones = document.querySelectorAll('.drop-zone');
const verifyButton = document.getElementById('verifyButton');

// Contador para las posiciones correctas
let correctPositions = 0;

// Añadir los eventos de arrastrar a los elementos de la lista
listItems.forEach(item => {
    item.addEventListener('dragstart', dragStart);
    item.addEventListener('dragend', dragEnd);
});

function dragStart(e) {
    // Guardar el elemento arrastrado
    e.dataTransfer.setData('text/plain', e.target.textContent);
    e.dataTransfer.effectAllowed = 'move';
    setTimeout(() => {
        e.target.classList.add('invisible');
    }, 0);
}

function dragEnd(e) {
    e.target.classList.remove('invisible');
}

// Añadir eventos a las zonas de caída
dropZones.forEach(zone => {
    zone.addEventListener('dragover', dragOver);
    zone.addEventListener('drop', dropItem);
    zone.addEventListener('dragleave', dragLeave);
    // Añadir un evento para hacer clic en la zona de caída y devolver el elemento
    zone.addEventListener('click', returnToOriginalList);
});

function dragOver(e) {
    e.preventDefault(); // Permitir el "drop"
    e.target.classList.add('hovered');
    e.dataTransfer.dropEffect = 'move';
}

function dragLeave(e) {
    e.target.classList.remove('hovered');
}

function dropItem(e) {
    e.preventDefault();
    e.target.classList.remove('hovered');

    const draggedItem = e.dataTransfer.getData('text/plain');

    // Verificar si la zona de caída ya tiene contenido
    if (e.target.textContent.trim() === '') {
        e.target.textContent = draggedItem;

        // Ocultar el elemento de la lista arrastrado
        const listItem = Array.from(listItems).find(item => item.textContent.trim() === draggedItem);
        if (listItem) {
            listItem.style.display = 'none';
        }
    } else {
        alert('Esta zona ya tiene un elemento. Elimine el contenido primero si desea reemplazarlo.');
    }
}

function showSuccessMessage() {
    Swal.fire({
        icon: 'success',
        title: '¡Bien hecho!',
        text: 'Todos los ítems están en la posición correcta.',
        confirmButtonText: 'OK'
    });
}

function returnToOriginalList(e) {
    const droppedText = e.target.textContent.trim();

    // Verificar si la zona de caída tiene un elemento para devolver
    if (droppedText !== '') {
        // Encontrar el ítem original en la lista
        const listItem = Array.from(listItems).find(item => item.textContent.trim() === droppedText);

        if (listItem) {
            // Hacer que el ítem sea visible nuevamente en la lista
            listItem.style.display = 'list-item';

            // Limpiar la zona de caída
            e.target.textContent = '';

            // Disminuir el contador de posiciones correctas si el elemento estaba en la posición correcta
            const number = e.target.previousElementSibling.alt; // El número de la imagen
            if (droppedText.includes(number)) {
                correctPositions--;
            }
        }
    }
}



function showScoreScreen(correct, total) {
    Swal.fire({
        title: 'Resultado',
        text: `Tu puntaje es: ${correct} de ${total}`,
        icon: 'info',
        confirmButtonText: 'siguiente',
        denyButtonText: 'Volver a Intentar',

        showCloseButton: true,
        showDenyButton: true,


    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            location.href = "nivel2.html"
        } else if (result.isDenied) {
            location.reload(); // Recarga la página actual
        }
      });
}

//  Evento para verificar las posiciones al presionar el botón "VERIFICAR"
verifyButton.addEventListener('click', () => {
    correctPositions = 0;

    dropZones.forEach(zone => {
        const droppedText = zone.textContent.trim();
        const number = zone.previousElementSibling.alt;
        const imageBox = zone.parentElement; // Selecciona el contenedor 'image-box'

        if (droppedText.includes(number)) {
            imageBox.style.backgroundColor = 'green';
            correctPositions++;
        } else {
            imageBox.style.backgroundColor = 'red';
        }
    });

    showScoreScreen(correctPositions, dropZones.length);

    const aumentoPuntaje = require('../js/aumentoPuntaje');

    aumentoPuntaje(4,correctPositions);
});


document.addEventListener('DOMContentLoaded', function() {
    const verifyButton = document.getElementById('verifyButton');
    const nextLevelButton = document.getElementById('nextLevelButton');
    const retryButton = document.getElementById('retryButton');
    const barraInferior = document.getElementById('fixed-bar');


    verifyButton.addEventListener('click', function() {
        // Aquí puedes añadir cualquier lógica adicional para verificar las respuestas

        // Ocultar el botón "Enviar"
        verifyButton.style.display = 'none';

        // barraInferior.style.backgroundColor = '#3074C7'; // Cambia el color a rojo o el color deseado

        // Mostrar los botones "Siguiente Nivel" y "Volver a Intentar"
        nextLevelButton.style.display = 'inline-block';
        retryButton.style.display = 'inline-block';



    });

    // Opcional: puedes añadir eventos a los botones "Siguiente Nivel" y "Volver a Intentar"
    nextLevelButton.addEventListener('click', function() {
        // Lógica para ir al siguiente nivel
        window.location.href = "nivel2.html";
        // Aquí podrías redirigir a otra página o realizar alguna acción
    });

    retryButton.addEventListener('click', function() {
        // Lógica para reintentar el nivel
        location.reload(); // Recarga la página actual
    });
});



