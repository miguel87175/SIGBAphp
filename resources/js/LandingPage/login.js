// ==================== BASE DE DATOS SIMULADA ====================
const USUARIO_DEFAULT = {
    usuario: "admin",
    email: "admin@test.com",
    password: "1234567",
};

function cargarUsuarios() {
    try {
        return JSON.parse(localStorage.getItem("usuarios")) || [];
    } catch {
        return [];
    }
}

let usuarios = cargarUsuarios();

if (usuarios.length === 0) {
    usuarios.push(USUARIO_DEFAULT);
    localStorage.setItem("usuarios", JSON.stringify(usuarios));
}

// ==================== REFERENCIAS AL DOM ====================
const loginForm    = document.getElementById("loginForm");
const mensajeLogin = document.getElementById("mensajeLogin");
const inputUsuario = document.getElementById("loginUsuario");
const inputPassword = document.getElementById("loginPassword");
const errorUsuario = document.getElementById("errorUsuario");
const errorPassword = document.getElementById("errorPassword");

// ==================== REGEX ====================
const regexEmail  = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
const regexNombre = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9._\s]{3,50}$/;

// ==================== AUXILIARES ====================
function mostrarMensaje(elemento, texto, tipo) {
    if (!elemento) return;
    elemento.textContent = texto;
    elemento.className = "mensaje " + tipo;
}

function pintarError(input, spanError, mensaje) {
    if (!input || !spanError) return;
    spanError.textContent = mensaje;
    input.classList.toggle("error", mensaje !== "");
    input.classList.toggle("ok", mensaje === "" && input.value.trim() !== "");
}

// ==================== VALIDADORES ====================
function validarUsuario(valor) {
    valor = valor.trim();
    if (valor === "") return "El nombre o correo es obligatorio";
    if (valor.includes("@")) {
        return regexEmail.test(valor) ? "" : "El correo no es válido";
    }
    return regexNombre.test(valor) ? "" : "El nombre debe tener al menos 3 caracteres";
}

function validarPassword(valor) {
    if (valor === "")     return "La contraseña es obligatoria";
    if (valor.length < 6) return "La contraseña debe tener al menos 6 caracteres";
    return "";
}

// ==================== VALIDACIÓN EN VIVO ====================
inputUsuario.addEventListener("input", () => {
    pintarError(inputUsuario, errorUsuario, validarUsuario(inputUsuario.value));
    if (mensajeLogin.textContent) mostrarMensaje(mensajeLogin, "", "");
});

inputPassword.addEventListener("input", () => {
    pintarError(inputPassword, errorPassword, validarPassword(inputPassword.value));
    if (mensajeLogin.textContent) mostrarMensaje(mensajeLogin, "", "");
});

// ==================== LOGIN (SUBMIT) ====================
loginForm.addEventListener("submit", (e) => {
    e.preventDefault();

    const usuario  = inputUsuario.value.trim();
    const password = inputPassword.value;
    const recordar = document.getElementById("recordarme").checked;

    // Obtener el rol seleccionado desde los botones visuales
    const botonActivo = document.querySelector('.type-btn.active');
    const rol = botonActivo ? botonActivo.getAttribute('data-rol') : "Aprendiz";

    const msgUsuario  = validarUsuario(usuario);
    const msgPassword = validarPassword(password);

    pintarError(inputUsuario, errorUsuario, msgUsuario);
    pintarError(inputPassword, errorPassword, msgPassword);

    if (msgUsuario || msgPassword) {
        mostrarMensaje(mensajeLogin, "Revisa los campos marcados en rojo", "error");
        (msgUsuario ? inputUsuario : inputPassword).focus();
        return;
    }

    mostrarMensaje(mensajeLogin, "Verificando...", "");

    setTimeout(() => {
        const encontrado = usuarios.find(u =>
            (u.usuario.toLowerCase() === usuario.toLowerCase() ||
             u.email.toLowerCase()   === usuario.toLowerCase()) &&
            u.password === password
        );

        if (encontrado) {
            mostrarMensaje(mensajeLogin, "¡Bienvenido, " + encontrado.usuario + "!", "exito");

            const sesion = {
                usuario: encontrado.usuario,
                email: encontrado.email,
                rol: rol,
                hora: Date.now()
            };

            if (recordar) {
                localStorage.setItem("sesionActiva", JSON.stringify(sesion));
                sessionStorage.removeItem("sesionActiva");
            } else {
                sessionStorage.setItem("sesionActiva", JSON.stringify(sesion));
                localStorage.removeItem("sesionActiva");
            }

            setTimeout(() => {
                // Redirección (ajusta esto a tus rutas reales)
                if (encontrado.usuario === "admin" || encontrado.email === "admin@test.com") {
                    window.location.href = "/panel-administrador";
                } else {
                    window.location.href = "/Pagina-principal";
                }
            }, 900);

        } else {
            mostrarMensaje(mensajeLogin, "Usuario o contraseña incorrectos", "error");
            inputPassword.value = "";
            inputPassword.classList.remove("ok");
            inputPassword.focus();
        }
    }, 700);
});

// ==================== LÓGICA DE BOTONES Y OJITO ====================
document.addEventListener("DOMContentLoaded", function() {
    // 1. Botones Aprendiz / Administrativo
    const botonesTipo = document.querySelectorAll('.type-btn');
    
    botonesTipo.forEach(boton => {
        boton.addEventListener('click', () => {
            botonesTipo.forEach(b => {
                b.classList.remove('active');
                const check = b.querySelector('.check-icon');
                if (check) check.remove();
            });

            boton.classList.add('active');

            const iconoCheck = document.createElement('i');
            iconoCheck.className = 'fa-solid fa-circle-check check-icon';
            boton.appendChild(iconoCheck);
        });
    });

    // 2. Ojo de la contraseña
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('loginPassword');

    if (togglePassword && passwordInput) {
        togglePassword.addEventListener('click', () => {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            togglePassword.classList.toggle('fa-eye');
            togglePassword.classList.toggle('fa-eye-slash');
        });
    }
});