// archivo1.js
let miVariable = 'Hola desde archivo1';

export { miVariable };

// Cambiar el valor de miVariable
miVariable = 'Hola desde cambios';
const corazones = document.getElementById('corazones').textContent;
const monedas = document.getElementById('monedas').textContent;
const tiempo = document.getElementById('timer').textContent;
export { corazones, monedas, tiempo };
console.log('Corazones:', corazones);
console.log('Monedas:', monedas);   
console.log('Tiempo:', tiempo); 