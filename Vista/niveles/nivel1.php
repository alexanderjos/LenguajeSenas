<?php
session_start();
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
    <script  type="module"  defer src="../../js/ventanaSalir.js"></script>
    <title>Juego de Preguntas - Nivel 1</title>
</head>

<body class="nivel1">
    <div class="container">
        <header class="mb-3">
            <div class="row p-3 align-items-center encabezadoN2">
                <div class="col-1 text-center">
                    <a href="#" id="exitButton" class="text-white" data-user="<?php echo htmlspecialchars($_SESSION['nickname'], ENT_QUOTES, 'UTF-8'); ?>">
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
                <div class="image-box">
                    <img src="../../Imagenes/numeros_manos/mano_1.png" alt="Uno">
                    <div class="drop-zone"></div>
                </div>
                <div class="image-box">
                    <img src="../../Imagenes/numeros_manos/mano_2.png" alt="Dos">
                    <div class="drop-zone"></div>
                </div>
                <div class="image-box">
                    <img src="../../Imagenes/numeros_manos/mano_3.png" alt="Tres">
                    <div class="drop-zone"></div>
                </div>
                <div class="image-box">
                    <img src="../../Imagenes/numeros_manos/mano_4.png" alt="Cuatro">
                    <div class="drop-zone"></div>
                </div>
                <div class="image-box">
                    <img src="../../Imagenes/numeros_manos/mano_5.png" alt="Cinco">
                    <div class="drop-zone"></div>
                </div>
                <div class="image-box">
                    <img src="../../Imagenes/numeros_manos/mano_6.png" alt="Seis">
                    <div class="drop-zone"></div>
                </div>
                <div class="image-box">
                    <img src="../../Imagenes/numeros_manos/mano_7.png" alt="Siete">
                    <div class="drop-zone"></div>
                </div>
                <div class="image-box">
                    <img src="../../Imagenes/numeros_manos/mano_8.png" alt="Ocho">
                    <div class="drop-zone"></div>
                </div>
            </section>

            <!-- Cajón de palabras -->
            <section class="word-box">
                <h3>CAJON DE PALABRAS</h3>
                <ul id="draggable-list">
                    <li draggable="true">1. Uno</li>
                    <li draggable="true">2. Dos</li>
                    <li draggable="true">3. Tres</li>
                    <li draggable="true">4. Cuatro</li>
                    <li draggable="true">5. Cinco</li>
                    <li draggable="true">6. Seis</li>
                    <li draggable="true">7. Siete</li>
                    <li draggable="true">8. Ocho</li>
                </ul>
            </section>
        </main>

        <div class="fixed-bar" id ="fixed-bar" >
            <div class="col-6 text-start">
                <a id="backButton" href="nivel2.html">                
                    <img src="../../Imagenes/cambiarNivel/boton_izquierda.png" alt="Regresar" style="margin: 2em;  display: none;"/>
                </a>
            </div>
            <div class="col-6 text-end">
                <button id="verifyButton" href="#">
                    VERIFICAR
                </button>


                <button id="nextLevelButton"   href="nivel2.html" style= "display: none;">    
                    SIGUIENTE               
                    <!-- <img src="../../Imagenes/cambiarNivel/boton_derecha.png" alt="siguiente" style="margin: 2em; "/> -->
                </button>
                <a id="retryButton"  style="display: none;">
                    <img src="../../Imagenes/cambiarNivel/rotate-right.png" alt="volverIntentar" />
                </a>
            </div>
        </div>
        
    </div>


</body>

</html>
