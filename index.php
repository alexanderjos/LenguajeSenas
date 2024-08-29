<?php
// Inicia el buffer de salida
ob_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="stylesheet" type="text/css" href="css/login.css">
   <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
   <link rel="shortcut icon" href="Imagenes/logo.ico" type="image/x-icon">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
   <script defer src="js/main.js"></script>
   <title>Inicio de sesión</title>
</head>

<body>
   <div class="container">
      <div class="img">
         <img src="Imagenes/login/logo.png" alt="Logo">
      </div>
      <div class="login-content">
         <form method="post" autocomplete="off">
            <img src="Imagenes/login/avatar.svg" alt="Avatar">
            <h2 class="title">BIENVENIDO</h2>
            <?php
               if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                   include("controllers/login.php");
                   echo'<br>';
               }
            ?>
            <div class="input-div one">
               <div class="i">
                  <i class="fas fa-user"></i>
               </div>
               <div class="div">
                  <h5>Nickname</h5>
                  <input id="Nickname" type="text" class="input" name="Nickname" required>
               </div>
            </div>
            <div class="input-div pass">
               <div class="i">
                  <i class="fas fa-lock"></i>
               </div>
               <div class="div">
                  <h5>Contraseña</h5>
                  <input type="password" id="input" class="input" name="password" required>
               </div>
            </div>
            <div class="view">
               <div class="fas fa-eye verPassword" onclick="vista()" id="verPassword"></div>
            </div>
            <div class="text-center">
               <a class="font-italic rg" href="Vista/registro.php">¿No tienes cuenta? Regístrate</a>
            </div>   
            <input name="btningresar" class="btn" type="submit" value="INICIAR SESIÓN">
         </form>
      </div>
   </div>
</body>
</html>

<?php
// Finaliza el buffer de salida
ob_end_flush();
?>
