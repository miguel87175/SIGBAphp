// ============================================
// 1. IDENTIFICAR EL FORMULARIO
// ============================================

const formulario = document.getElementById("formularioBienestar");

// ============================================
// 2. IDENTIFICAR LOS CAMPOS
// ============================================

const nombre = document.getElementById("nombre");
const documento = document.getElementById("documento");
const correo = document.getElementById("correo");
const telefono = document.getElementById("telefono");

const programa = document.getElementById("programa");
const ficha = document.getElementById("ficha");
const jornada = document.getElementById("jornada");
const centro = document.getElementById("centro");

const apoyoActual = document.getElementById("apoyo_actual");
const montoSolicitado = document.getElementById("monto_solicitado");
const destinoApoyo = document.getElementById("destino_apoyo");

const situacion = document.getElementById("situacion");
const personas = document.getElementById("personas");
const ingresos = document.getElementById("ingresos");

const justificacion = document.getElementById("justificacion");
const declaracion = document.querySelector('input[name="declaracion"]');

// ============================================
// 3. MOSTRAR Y LIMPIAR ERRORES
// ============================================

function mostrarError(campo, mensaje) {
    campo.classList.add("campo-error");

    let mensajeError = campo.parentElement.querySelector(".mensaje-error");

    if (!mensajeError) {
        mensajeError = document.createElement("small");
        mensajeError.classList.add("mensaje-error");
        campo.parentElement.appendChild(mensajeError);
    }

    mensajeError.textContent = mensaje;
}

function limpiarError(campo) {
    campo.classList.remove("campo-error");

    const mensajeError = campo.parentElement.querySelector(".mensaje-error");
    if (mensajeError) mensajeError.remove();
}

// ============================================
// 4. VALIDAR CAMPOS OBLIGATORIOS
// ============================================

function validarVacio(campo, nombreCampo) {
    if (!campo || campo.value.trim() === "") {
        if (campo) mostrarError(campo, "El campo " + nombreCampo + " es obligatorio.");
        return false;
    }

    limpiarError(campo);
    return true;
}

// ============================================
// 5. VALIDAR INFORMACIÓN PERSONAL
// ============================================

function validarNombre() {
    if (!validarVacio(nombre, "de nombres")) return false;

    const expresion = /^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s]+$/;

    if (!expresion.test(nombre.value.trim()) || nombre.value.trim().length < 3) {
        mostrarError(nombre, "Ingrese un nombre válido, usando únicamente letras.");
        return false;
    }

    limpiarError(nombre);
    return true;
}

function validarDocumento() {
    if (!validarVacio(documento, "de documento")) return false;

    if (!/^[0-9]{5,20}$/.test(documento.value.trim())) {
        mostrarError(documento, "Ingrese un documento válido de 5 a 20 números.");
        return false;
    }

    limpiarError(documento);
    return true;
}

function validarCorreo() {
    if (!validarVacio(correo, "de correo")) return false;

    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(correo.value.trim())) {
        mostrarError(correo, "Ingrese un correo electrónico válido.");
        return false;
    }

    limpiarError(correo);
    return true;
}

function validarTelefono() {
    if (!validarVacio(telefono, "de teléfono")) return false;

    const digitos = telefono.value.replace(/\D/g, "");

    if (digitos.length < 7 || digitos.length > 15) {
        mostrarError(telefono, "Ingrese un número de contacto válido.");
        return false;
    }

    limpiarError(telefono);
    return true;
}

// ============================================
// 6. VALIDAR INFORMACIÓN ACADÉMICA
// ============================================

function validarAcademico() {
    let valido = true;

    if (!validarVacio(programa, "del programa")) valido = false;
    if (!validarVacio(ficha, "de ficha")) valido = false;
    if (!validarVacio(jornada, "de jornada")) valido = false;
    if (!validarVacio(centro, "del centro de formación")) valido = false;

    return valido;
}

// ============================================
// 7. VALIDAR INFORMACIÓN DEL APOYO MONETARIO
// ============================================

function validarApoyoMonetario() {
    let valido = true;

    if (!validarVacio(apoyoActual, "de apoyo económico actual")) {
        valido = false;
    }

    if (!validarVacio(montoSolicitado, "del monto solicitado")) {
        valido = false;
    } else {
        const monto = Number(montoSolicitado.value);

        if (!Number.isFinite(monto) || monto <= 0) {
            mostrarError(montoSolicitado, "Ingrese un monto mayor a cero.");
            valido = false;
        } else {
            limpiarError(montoSolicitado);
        }
    }

    if (!validarVacio(destinoApoyo, "del destino del apoyo")) {
        valido = false;
    }

    return valido;
}

// ============================================
// 8. VALIDAR INFORMACIÓN SOCIOECONÓMICA
// ============================================

function validarSocioeconomico() {
    let valido = true;

    if (!validarVacio(situacion, "de situación laboral")) valido = false;
    if (!validarVacio(personas, "de personas a cargo")) valido = false;
    if (!validarVacio(ingresos, "de ingresos")) valido = false;

    return valido;
}

// ============================================
// 9. VALIDAR JUSTIFICACIÓN
// ============================================

function validarJustificacion() {
    if (!validarVacio(justificacion, "de justificación")) return false;

    if (justificacion.value.trim().length < 20) {
        mostrarError(justificacion, "Explique su situación con al menos 20 caracteres.");
        return false;
    }

    limpiarError(justificacion);
    return true;
}

// ============================================
// 10. VALIDAR DECLARACIÓN
// ============================================

function validarDeclaracion() {
    let mensaje = document.getElementById("error-declaracion");

    if (!declaracion || !declaracion.checked) {
        if (!mensaje) {
            mensaje = document.createElement("small");
            mensaje.id = "error-declaracion";
            mensaje.classList.add("mensaje-error");
            declaracion.parentElement.after(mensaje);
        }

        mensaje.textContent = "Debe aceptar la declaración para continuar.";
        return false;
    }

    if (mensaje) mensaje.remove();
    return true;
}

// ============================================
// 11. VALIDACIÓN GENERAL DEL FORMULARIO
// ============================================

formulario.addEventListener("submit", function(event) {
    event.preventDefault();

    const resultados = [
        validarNombre(),
        validarDocumento(),
        validarCorreo(),
        validarTelefono(),
        validarAcademico(),
        validarApoyoMonetario(),
        validarSocioeconomico(),
        validarJustificacion(),
        validarDeclaracion()
    ];

    if (!resultados.every(Boolean)) {
        const primerError = formulario.querySelector(".campo-error, #error-declaracion");

        if (primerError) {
            primerError.scrollIntoView({
                behavior: "smooth",
                block: "center"
            });
        }

        alert("Por favor, revise los campos señalados.");
    } else {
        alert("La solicitud de apoyo monetario se ha completado correctamente.");
        window.location.href = "/Pagina-principal";
    }
});

// ============================================
// 12. LIMPIAR ERRORES AL REINICIAR
// ============================================

formulario.addEventListener("reset", function() {
    setTimeout(function() {
        document.querySelectorAll(".campo-error").forEach(campo => {
            limpiarError(campo);
        });

        document.querySelectorAll(".mensaje-error, #error-declaracion").forEach(mensaje => {
            mensaje.remove();
        });
    }, 0);
});
