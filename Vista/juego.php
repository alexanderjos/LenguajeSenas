<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/phaser/3.60.0/phaser.min.js"></script>
    <title>INDEX</title>
    <script defer src="../js/script.js"></script>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body class="inicio">
    <header class="encabezado">
        <!-- barra superior --> 
        <div class="game-bar">
            <div class="timer-container">
                <div class="heart-container">
                    <i class="fa-solid fa-heart fa-2x heart" style="color: #ff000d;"></i>                   
                    <span id="countdown" class="countdown">3</span>
                </div>
                <div class="timer" id="timer">00:00:00</div>
            </div>
            <img src="../Imagenes/avatares/<?php echo $_SESSION["avatar"]?>.jpg" alt="Avatar" class="avatar-image">
            <div class="coins-container">
                <img src="Imagenes/oro.gif" alt="Moneda" class="coin-icon">
                <span class="coin-count"> 4500</span>
            </div>
            <div class="icons-container">
                <img src="Imagenes/configuracion.png" alt="Configuración" class="icon settings-icon">
            </div>
        </div>
    </header>
    
    <div class="Juego">
        <div class="button-container-1" style="top: 80px; left: 75px;">
            <a href="niveles/nivel1.html" class="btn-circular-1"></a>
            <div class="stars">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
        </div>

        <div class="button-container-2" style="bottom: 80px; left: 40px;">
            <a href="niveles/nivel2.html" class="btn-circular-2"></a>
            <div class="stars">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
        </div>
        
        <div class="button-container-3" style="top: 150px; left: 320px;">
            <a href="" class="btn-circular-3"></a>
            <div class="stars">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
        </div>
        <div class="button-container-4" style="top: 50px; right: 150px;">
            <a href="/Vista/nivel4.html" class="btn-circular-4"></a>
            <div class="stars">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
        </div>
        <div class="button-container-5" style="bottom: 80px; right: 120px;">
            <a href="" class="btn-circular-5"></a>
            <div class="stars">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
        </div>

        <!-- Flecha desplegable -->
        <div class="menu-toggle">
            <i class="fas fa-chevron-left"></i>
        </div>
        <nav class="menu">
            <ul>
                <li><a href="/Temario/Temario1.html">Tema 1: Vocabulario Básico</a></li>
                <li><a href="#">Tema 2: Tecnología y Redes Sociales</a></li>
                <li><a href="#">Tema 3: Colores y números</a></li>
                <li><a href="#">Tema 4: Naturaleza y animales</a></li>
                <li><a href="#">Tema 5: Tiempo (meses, día, tiempo)</a></li>
            </ul>
        </nav>
    </div>

   
</body>
</html>