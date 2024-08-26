function aumentoPuntaje(id,aumento) {
    // Crear un objeto con los datos
    const datos = { id: id, aumento: aumento };

    // Enviar los datos a través de una solicitud AJAX
    fetch('../../controllers/aumentoPuntaje.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(datos),
    })
    
    .then(response => response.json())
    .then(data => {
      console.log('Respuesta del servidor:', data);
    })
    .catch(error => {
      console.error('Error:', error);
    });
}