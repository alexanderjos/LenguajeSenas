const list = document.getElementById('draggable-list');
let draggedItem = null;

// Add event listeners for drag events
list.addEventListener('dragstart', handleDragStart);
list.addEventListener('dragover', handleDragOver);
list.addEventListener('drop', handleDrop);
list.addEventListener('dragend', handleDragEnd);
list.addEventListener('dragenter', handleDragEnter);
list.addEventListener('dragleave', handleDragLeave);

function handleDragStart(e) {
    draggedItem = e.target;
    e.target.classList.add('dragging');
    setTimeout(() => e.target.classList.add('hidden'), 0);
}

function handleDragOver(e) {
    e.preventDefault();
}

function handleDrop(e) {
    e.preventDefault();
    if (e.target.tagName === 'LI' && e.target !== draggedItem) {
        const allItems = Array.from(list.children);
        const currentIdx = allItems.indexOf(e.target);
        const draggedIdx = allItems.indexOf(draggedItem);

        if (currentIdx < draggedIdx) {
            e.target.before(draggedItem);
        } else {
            e.target.after(draggedItem);
        }
    }
    resetDragStyles();
}

function handleDragEnd(e) {
    e.target.classList.remove('hidden');
    e.target.classList.remove('dragging');
}

function handleDragEnter(e) {
    if (e.target.tagName === 'LI' && e.target !== draggedItem) {
        e.target.classList.add('over');
    }
}

function handleDragLeave(e) {
    if (e.target.tagName === 'LI') {
        e.target.classList.remove('over');
    }
}

function resetDragStyles() {
    const allItems = Array.from(list.children);
    allItems.forEach(item => item.classList.remove('over', 'hidden', 'dragging'));
}
