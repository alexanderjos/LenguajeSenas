// Selección de elementos de la lista y las zonas de caída
const listItems = document.querySelectorAll('#draggable-list li');
const dropZones = document.querySelectorAll('.drop-zone');

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

        // Buscar y eliminar el elemento de la lista arrastrado
        const listItem = Array.from(listItems).find(item => item.textContent.trim() === draggedItem);
        if (listItem) {
            listItem.remove();
        }
    } else {
        alert('Esta zona ya tiene un elemento. Elimine el contenido primero si desea reemplazarlo.');
    }
}

// Permitir restaurar el elemento a la lista
dropZones.forEach(zone => {
    zone.addEventListener('dblclick', function(e) {
        if (e.target.textContent.trim() !== '') {
            const itemText = e.target.textContent.trim();
            e.target.textContent = '';

            // Restaurar el elemento a la lista
            const listItem = document.createElement('li');
            listItem.textContent = itemText;
            listItem.draggable = true;
            listItem.addEventListener('dragstart', dragStart);
            listItem.addEventListener('dragend', dragEnd);

            document.getElementById('draggable-list').appendChild(listItem);
        }
    });
});
