// archivo: ../js/nivel_1.js

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

// Evento para verificar las posiciones al presionar el botón "VERIFICAR"
verifyButton.addEventListener('click', () => {
    correctPositions = 0;

    dropZones.forEach(zone => {
        const droppedText = zone.textContent.trim();
        const number = zone.previousElementSibling.alt;

        if (droppedText.includes(number)) {
            zone.style.backgroundColor = 'green';
            correctPositions++;
        } else {
            zone.style.backgroundColor = 'red';
        }
    });

    showScoreScreen(correctPositions, dropZones.length);
});

function showScoreScreen(correct, total) {
    Swal.fire({
        title: 'Resultado',
        text: `Tu puntaje es: ${correct} de ${total}`,
        icon: 'info',
        confirmButtonText: 'Aceptar',
    }).then(() => {
        // Redirigir o mostrar una nueva pantalla, según tus necesidades
        console.log('Puedes redirigir a otra pantalla aquí.');
    });
}
