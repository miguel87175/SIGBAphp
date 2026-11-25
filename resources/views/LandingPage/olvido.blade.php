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

        <form class="form" id="olvidoForm" novalidate>
            <h2>Recuperar Contraseña</h2>
            
            <p class="texto-info">
                Ingresa tu correo electrónico y te enviaremos un código para restablecer tu contraseña.
            </p>
            
            <div class="input-group">
                <div class="input-wrapper">
                    <i class="fa-regular fa-envelope icon-left"></i>
                    <input type="email" id="olvidoEmail" name="olvidoEmail" placeholder="tucorreo@ejemplo.com" autocomplete="email" maxlength="100" required>
                </div>
                <small class="error-campo" id="errorOlvidoEmail"></small>
            </div>
            
            <button type="submit" class="btn">Enviar código <i class="fa-solid fa-paper-plane"></i></button>
            
            <p class="mensaje" id="mensajeOlvido"></p>
            
            <p class="cambio-form">
                <!-- NOTA: Cambia el '#' por tu ruta de Laravel, ej: {{ route('login') }} -->
                <a href="#" id="volverALogin2">← Volver al inicio de sesión</a>
            </p>
        </form>

    </div>
    
    <script src="inisio.js"></script>
</body>
</html>