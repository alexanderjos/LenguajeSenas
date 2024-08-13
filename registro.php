<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/registro.css">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script defer src="../js/registro.js"></script>
</head>
<body class="bg-light">
    <div class="container">
        <div class="form-container">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center">Regístrate</h2>
                    <h5 class="text-center">Ingresa tus datos para crear una cuenta.</h5>
                    <h5 class="text-center">¿Ya tienes cuenta? <a href="../index.php">Inicia sesión</a></h5>
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="name" placeholder="Ingresa tu nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="email" placeholder="ejemplo@dominio.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" required>
                                <button class="view btn btn-outline-secondary" type="button" id="toggle-password">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">Repetir contraseña</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password-confirm" required>
                                <button class=" view btn btn-outline-secondary" type="button" id="toggle-password-confirm">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Género</label>
                            <div class="gender-button-group">
                                <input type="radio" class="btn-check" name="gender" id="male" value="masculino" required>
                                <label class="gender-button" for="male">
                                    <i class="fa-solid fa-mars"></i> Masculino
                                </label>

                                <input type="radio" class="btn-check" name="gender" id="female" value="femenino" required>
                                <label class="gender-button" for="female">
                                    <i class="fa-solid fa-venus"></i> Femenino
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="birthdate" class="form-label">Fecha de nacimiento</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="birthdate" required>
                                <button class="btn btn-outline-secondary calendar" type="button" id="calendar-button">
                                    <i class="fa-solid fa-calendar"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Avatar</label>
                            <div class="avatar-group">
                                <input type="radio" name="avatar" id="avatar1" value="avatar1" class="avatar-input">
                                <img src="../Imagenes/avatares/avatar1.jpg" alt="Avatar 1" class="avatar-img" onclick="selectAvatar(this)">

                                <input type="radio" name="avatar" id="avatar2" value="avatar2" class="avatar-input">
                                <img src="../Imagenes/avatares/avatar2.jpg" alt="Avatar 2" class="avatar-img" onclick="selectAvatar(this)">

                                <input type="radio" name="avatar" id="avatar3" value="avatar3" class="avatar-input">
                                <img src="../Imagenes/avatares/avatar3.jpg" alt="Avatar 3" class="avatar-img" onclick="selectAvatar(this)">

                                <input type="radio" name="avatar" id="avatar4" value="avatar4" class="avatar-input">
                                <img src="../Imagenes/avatares/avatar4.jpg" alt="Avatar 4" class="avatar-img" onclick="selectAvatar(this)">
                            </div>
                        </div>
                        <button type="submit" class="bto btn btn-info w-100">Registrarse</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
