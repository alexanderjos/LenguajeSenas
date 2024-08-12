<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="stylesheet" type="text/css" href="css/login.css">
   <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
   <script defer src="js/main.js"></script>
   <title>Inicio de sesión</title>
</head>

<body>
   <div class="container">
      <div class="img">
         <img src="Imagenes/login/logo.png">
      </div>
      <div class="login-content">
         <form  method="post" autocomplete="off">
            <img src="Imagenes/login/avatar.svg">
            <h2 class="title">BIENVENIDO</h2>
            <?php
               include ("models/validar.php");
               echo "<br>";
            ?>

            <div class="input-div one">
               <div class="i">
                  <i class="fas fa-user"></i>
               </div>
               <div class="div">
                  <h5>Usuario</h5>
                  <input id="usuario" type="text" class="input" name="usuario">
               </div>
            </div>
            <div class="input-div pass">
               <div class="i">
                  <i class="fas fa-lock"></i>
               </div>
               <div class="div">
                  <h5>Contraseña</h5>
                  <input type="password" id="input" class="input" name="password">
               </div>
            </div>
            <div class="view">
               <div class="fas fa-eye verPassword" onclick="vista()" id="verPassword"></div>
            </div>
            <div class="text-center">
               <a class="font-italic rg" href="vista/registro.php">¿No tienes Cuenta? Registrate</a>
            </div>   
            <input name="btningresar" class="btn" type="submit" value="INICIAR SESION">
            
         </form>
      </div>
   </div>



</body>

</html>