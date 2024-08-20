// // Configurar el intervalo para 15 minutos (900,000 milisegundos)
// const intervalo = setInterval(function() {
//     // Generar un número aleatorio entre 1 y 10
//     const numero = Math.floor(Math.random() * 10) + 1; // Número aleatorio entre 1 y 10

//     console.log("Número generado:", numero);

//     // Si el número es 5, detiene el intervalo
//     if (numero === 5) {
//         console.log("¡Número 5 detectado! Deteniendo el intervalo.");
//         clearInterval(intervalo);
//         return; // Sale de la función para no continuar
//     }

//     // Si el número no es 5, realiza la solicitud AJAX
//     fetch('procesar.php', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/x-www-form-urlencoded'
//         },
//         body: 'numero=' + encodeURIComponent(numero)
//     })
//     .then(response => response.text())
//     .then(data => {
//         console.log('Respuesta del servidor:', data);
//     })
//     .catch(error => console.error('Error:', error));
// }, 900000); // 900,000 ms equivale a 15 minutos