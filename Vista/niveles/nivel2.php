<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script defer src="../../js/basedePreguntas.js"></script>
    <script defer src="../../js/index.js"></script>
    <script defer src="../../js/ventanaSalir.js"></script>
    <title>Juego de Preguntas</title>
</head>

<body class="nivel2">
    <div class="container-fluid p-0">
        <!-- Encabezado -->
        <div class="row p-3 mb-3 align-items-center encabezadoN2">
            <div class="col-1 text-center">

                <a href="#" id="exitButton" class="text-white" data-user="<?php echo htmlspecialchars($_SESSION['nickname'], ENT_QUOTES, 'UTF-8'); ?>">
                    <i class="fa-sharp fa-solid fa-house casa"></i>
                </a>
            </div>
            <div class="col-10 text-center">
                <h1>Nivel 2</h1>
            </div>
            <div class="col-1 text-center">
                <a href="#" class="text-white">
                    <i class="fa-duotone fa-solid fa-gear config"></i>
                </a>
            </div>
        </div>

        <!-- Contenido del juego de preguntas -->
        <div class="container">
            <!-- Pregunta -->
            <div class="row justify-content-center">
                <div class="col-9 text-center mb-4 pregunta">
                    <h2 id="pregunta"></h2>
                    <img id="miImagen" src="" alt="Imagen">
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-6 col-md-3 mb-3 respuesta" onclick="seleccionarOpcion(0)">
                    <img id="alternativa1" src="" alt="alternativa 1" class="img-fluid">
                </div>
                <div class="col-6 col-md-3 mb-3 respuesta" onclick="seleccionarOpcion(1)">
                    <img id="alternativa2" src="" alt="alternativa 2" class="img-fluid">
                </div>
                <div class="col-6 col-md-3 mb-3 respuesta" onclick="seleccionarOpcion(2)">
                    <img id="alternativa3" src="" alt="alternativa 3" class="img-fluid">
                </div>
                <div class="col-6 col-md-3 mb-3 respuesta" onclick="seleccionarOpcion(3)">
                    <img id="alternativa4" src="" alt="alternativa 4" class="img-fluid">
                </div>
                <div class="col-6 col-md-3 mb-3 respuesta" onclick="seleccionarOpcion(4)">
                    <img id="alternativa5" src="" alt="alternativa 5" class="img-fluid">
                </div>
                <div class="col-6 col-md-3 mb-3 respuesta" onclick="seleccionarOpcion(5)">
                    <img id="alternativa6" src="" alt="alternativa 6" class="img-fluid">
                </div>
                <div class="col-6 col-md-3 mb-3 respuesta" onclick="seleccionarOpcion(6)">
                    <img id="alternativa7" src="" alt="alternativa 7" class="img-fluid">
                </div>
                <div class="col-6 col-md-3 mb-3 respuesta" onclick="seleccionarOpcion(7)">
                    <img id="alternativa8" src="" alt="alternativa 8" class="img-fluid">
                </div>
            </div>



            
            
        </div>


    </div>

    <div class="fixed-bar" id ="fixed-bar" >
        <div class="col-6 text-start">
            <a id="backButton" href="nivel2.html">                
                <img src="../../Imagenes/cambiarNivel/boton_izquierda.png" alt="Regresar" style="margin: 2em;"/>
            </a>
        </div>
        <div class="col-6 text-end">
            <button id="verifyButton" href="#" style= "display: none;">
                VERIFICAR
            </button>


            <button id="nextLevelButton"   href="nivel3.html" style= "display: none;">    
                SIGUIENTE               
                <!-- <img src="../../Imagenes/cambiarNivel/boton_derecha.png" alt="siguiente" style="margin: 2em; "/> -->
            </button>
            <a id="retryButton"  style="display: none;">
                <img src="../../Imagenes/cambiarNivel/rotate-right.png" alt="volverIntentar" />
            </a>
        </div>
    </div>
    

</body>

</html>
