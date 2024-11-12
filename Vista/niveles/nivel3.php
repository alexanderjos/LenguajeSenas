<?php
session_start();

// Configuración de aprendizaje (modificar 'modo' para intercambiar entre 'numeros' o 'letras')
$modo = 'letras'; // Opciones: 'numeros' o 'letras'

// Definimos el contenido para cada modo
$contenido = [
    'numeros' => [
        1 => 'Uno', 2 => 'Dos', 3 => 'Tres', 4 => 'Cuatro',
        5 => 'Cinco', 6 => 'Seis', 7 => 'Siete', 8 => 'Ocho'
    ],
    'letras' => [
        'A' => 'Letra_A', 'B' => 'Letra_B', 'C' => 'Letra_C', 'D' => 'Letra_D',
        'E' => 'Letra_E', 'F' => 'Letra_F', 'G' => 'Letra_G', 'H' => 'Letra_H'
    ]
];

$elementos = $contenido[$modo];

// Selección aleatoria de seis elementos sin perder sus claves originales
$claves_aleatorias = array_rand($elementos, 6);
$elementos_aleatorios = [];
foreach ($claves_aleatorias as $clave) {
    $elementos_aleatorios[$clave] = $elementos[$clave];
}

// Barajar el array desordenando las claves
$claves_desordenadas = array_keys($elementos_aleatorios);
shuffle($claves_desordenadas);

// Construcción del array final desordenado
$elementos_desordenados = [];
foreach ($claves_desordenadas as $clave) {
    $elementos_desordenados[$clave] = $elementos_aleatorios[$clave];
}

// Definimos la carpeta de imágenes según el modo
$carpeta_imagenes = $modo === 'numeros' ? 'numeros_manos/' : 'letras/';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../css/nivel_1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script defer src="../../js/nivel_1.js"></script>
    <script type="module" defer src="../../js/ventanaSalir.js"></script>
    <title>Juego de Preguntas - Nivel 1</title>
</head>
<body class="nivel1">
<div class="container">
    <header class="mb-3">
        <div class="row p-3 align-items-center encabezadoN2">
            <div class="col-1 text-center">
                <a href="#" id="exitButton" class="text-white" data-user="<?= htmlspecialchars($_SESSION['nickname'], ENT_QUOTES, 'UTF-8') ?>">
                    <i class="fa-solid fa-house casa"></i>
                </a>
            </div>
            <div class="col-10 text-center">
                <h1>Nivel 1</h1>
            </div>
            <div class="col-1 text-center">
                <a href="#" class="text-white">
                    <i class="fa-solid fa-gear config"></i>
                </a>
            </div>
        </div>
    </header>

    <main class="content">
        <!-- Tarjetas con imágenes y zona de drop -->
        <section class="images">
            <?php foreach ($elementos_desordenados as $key => $label): ?>
                <div class="image-box">
                    <img src="../../Imagenes/<?= $carpeta_imagenes . ($modo === 'numeros' ? 'mano_' . $key : strtolower($key)) ?>.png" alt="<?= $label ?>">
                    <div class="drop-zone"></div>
                </div>
            <?php endforeach; ?>
        </section>

        <!-- Cajón de palabras -->
        <section class="word-box">
            <h3>CAJON DE PALABRAS</h3>
            <ul id="draggable-list">
                <?php foreach ($elementos_desordenados as $key => $label): ?>
                    <li draggable="true"><?= $label ?></li>
                <?php endforeach; ?>
            </ul>
        </section>
    </main>

    <div class="fixed-bar" id="fixed-bar">
        <div class="col-6 text-start">
            <a id="backButton" href="nivel2.html">
                <img src="../../Imagenes/cambiarNivel/boton_izquierda.png" alt="Regresar" style="margin: 2em; display: none;"/>
            </a>
        </div>
        <div class="col-6 text-end">
            <button id="verifyButton">VERIFICAR</button>
            <button id="nextLevelButton" href="nivel2.html" style="display: none;">SIGUIENTE</button>
            <a id="retryButton" style="display: none;">
                <img src="../../Imagenes/cambiarNivel/rotate-right.png" alt="volverIntentar"/>
            </a>
        </div>
    </div>
</div>
</body>
</html>
