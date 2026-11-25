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

        <form class="form" id="loginForm" novalidate>
            <h2>Iniciar Sesión</h2>
            <p class="texto-info">Selecciona el tipo de usuario:</p>

            <div class="user-type-selector">
                <button type="button" class="type-btn active">
                    <i class="fa-solid fa-graduation-cap"></i> Aprendiz
                    <i class="fa-solid fa-circle-check check-icon"></i>
                </button>
                <button type="button" class="type-btn">
                    <i class="fa-solid fa-gear"></i> Administrativo
                </button>
            </div>

            <div class="input-group">
                <div class="input-wrapper">
                    <i class="fa-regular fa-envelope icon-left"></i>
                    <input
                        type="text"
                        id="loginUsuario"
                        name="loginUsuario"
                        placeholder="Correo electrónico"
                        autocomplete="username"
                        maxlength="50"
                        required
                    >
                </div>
                <small class="error-campo" id="errorUsuario"></small>
            </div>

            <div class="input-group">
                <div class="input-wrapper">
                    <i class="fa-solid fa-lock icon-left"></i>
                    <input
                        type="password"
                        id="loginPassword"
                        name="loginPassword"
                        placeholder="Contraseña"
                        autocomplete="current-password"
                        minlength="6"
                        maxlength="100"
                        required
                    >

                    <i class="fa-regular fa-eye-slash icon-right" id="togglePassword"></i>
                </div>
                <small class="error-campo" id="errorPassword"></small>
            </div>

            <div class="opciones">
                <label class="recordarme">
                    <input type="checkbox" id="recordarme" name="recordarme"> Recordarme
                </label>
                <!-- NOTA: Cambia el '#' por tu ruta de Laravel, ej: {{ route('olvido') }} -->
                <a href="#" id="irAOlvido">¿Olvidaste tu contraseña?</a>
            </div>

            <button type="submit" class="btn">
                Entrar <i class="fa-solid fa-arrow-right"></i>
            </button>

            <p class="mensaje" id="mensajeLogin"></p>

            <p class="cambio-form">
                <!-- NOTA: Cambia el '#' por tu ruta de Laravel, ej: {{ route('registro') }} -->
                ¿No tienes cuenta? <a href="#" id="irARegistro">Regístrate aquí</a>
            </p>
        </form>

    </div>
    
    <script src="inisio.js"></script>
</body>
</html>