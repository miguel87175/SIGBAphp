<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienestar al Aprendiz - SENA</title>
    
    <link href="    " rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="inisio.css">
</head> 
<body>
    <div class="esquina-verde-izquierda-grande"></div>
    <div class="esquina-verde-izquierda-pequeña"></div>

    <div class="esquina-verde-derecha-grande"></div>
    <div class="esquina-verde-derecha-pequeña"></div>


    <div class="login-container">
        <div class="login-header">
            <div class="logo-sena">
                <img src="../IMG/logo-sena.png" alt="Logo-SENA" class="img-logo">
            </div>
            <div class="separator"></div>
            <div class="header-text">
                <h1>Bienestar<br>al Aprendiz</h1>
            </div>
        </div>
        <p class="subtitle">Plataforma de servicios y acompañamiento al aprendiz</p>
        <div class="header-line"></div>

        <form class="form" id="registroForm" novalidate>
            <h2>Crear Cuenta</h2>
            
            <div class="input-group">
                <div class="input-wrapper">
                    <i class="fa-regular fa-user icon-left"></i>
                    <input type="text" id="regUsuario" name="regUsuario" placeholder="Digite su nombre" autocomplete="name" maxlength="50" required>
                </div>
                <small class="error-campo" id="errorRegUsuario"></small>
            </div>
            
            <div class="input-group">
                <div class="input-wrapper">
                    <i class="fa-regular fa-envelope icon-left"></i>
                    <input type="email" id="regEmail" name="regEmail" placeholder="tucorreo@ejemplo.com" autocomplete="email" maxlength="100" required>
                </div>
                <small class="error-campo" id="errorRegEmail"></small>
            </div>
            
            <div class="input-group">
                <div class="input-wrapper">
                    <i class="fa-solid fa-lock icon-left"></i>
                    <input type="password" id="regPassword" name="regPassword" placeholder="Crea una contraseña" autocomplete="new-password" minlength="6" maxlength="100" required>
                </div>
                <small class="error-campo" id="errorRegPassword"></small>
            </div>
            
            <div class="input-group">
                <div class="input-wrapper">
                    <i class="fa-solid fa-lock icon-left"></i>
                    <input type="password" id="regPassword2" name="regPassword2" placeholder="Repite la contraseña" autocomplete="new-password" minlength="6" maxlength="100" required>
                </div>
                <small class="error-campo" id="errorRegPassword2"></small>
            </div>
            
            <button type="submit" class="btn">Registrarse <i class="fa-solid fa-user-plus"></i></button>
            
            <p class="mensaje" id="mensajeRegistro"></p>
            
            <p class="cambio-form">
                <!-- NOTA: Cambia el '#' por tu ruta de Laravel, ej: {{ route('login') }} -->
                ¿Ya tienes cuenta? <a href="#" id="volverALogin1">Inicia sesión</a>
            </p>
        </form>

    </div>
    
    <script src="inisio.js"></script>
</body>
</html>