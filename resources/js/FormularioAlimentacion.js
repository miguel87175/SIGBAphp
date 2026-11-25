
// ============================================
// 1. IDENTIFICAR EL FORMULARIO
// ============================================

const formulario = document.querySelector("form");


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
const frecuenciaAlimentacion = document.getElementById("frecuencia_alimentacion");
const momentoAlimentacion = document.getElementById("momento_alimentacion");

const situacion = document.getElementById("situacion");
const personas = document.getElementById("personas");
const ingresos = document.getElementById("ingresos");

const justificacion = document.getElementById("justificacion");
const declaracion = document.querySelector(
    'input[name="declaracion"]'
);


// ============================================
// 3. FUNCIÓN PARA MOSTRAR ERRORES
// ============================================

function mostrarError(campo, mensaje) {

    campo.classList.add("campo-error");

    let mensajeError = campo.parentElement.querySelector(
        ".mensaje-error"
    );

    if (!mensajeError) {

        mensajeError = document.createElement("small");

        mensajeError.classList.add("mensaje-error");

        campo.parentElement.appendChild(mensajeError);
    }

    mensajeError.textContent = mensaje;
}


// ============================================
// 4. FUNCIÓN PARA LIMPIAR ERRORES
// ============================================

function limpiarError(campo) {

    campo.classList.remove("campo-error");

    const mensajeError = campo.parentElement.querySelector(
        ".mensaje-error"
    );

    if (mensajeError) {
        mensajeError.remove();
    }
}


// ============================================
// 5. VALIDAR CAMPOS VACÍOS
// ============================================

function validarVacio(campo, nombreCampo) {

    if (campo.value.trim() === "") {

        mostrarError(
            campo,
            "El campo " + nombreCampo + " es obligatorio."
        );

        return false;
    }

    limpiarError(campo);

    return true;
}


// ============================================
// 6. VALIDAR NOMBRES
// ============================================

function validarNombre() {

    const expresion = /^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s]+$/;

    if (!validarVacio(nombre, "de nombres")) {
        return false;
    }

    if (!expresion.test(nombre.value.trim())) {

        mostrarError(
            nombre,
            "Ingrese únicamente letras y espacios."
        );

        return false;
    }

    if (nombre.value.trim().length < 3) {

        mostrarError(
            nombre,
            "El nombre debe tener al menos 3 caracteres."
        );

        return false;
    }

    limpiarError(nombre);

    return true;
}


// ============================================
// 7. VALIDAR DOCUMENTO
// ============================================

function validarDocumento() {

    const expresion = /^[0-9]{5,20}$/;

    if (!validarVacio(documento, "de documento")) {
        return false;
    }

    if (!expresion.test(documento.value.trim())) {

        mostrarError(
            documento,
            "Ingrese un documento válido de 5 a 20 números."
        );

        return false;
    }

    limpiarError(documento);

    return true;
}


// ============================================
// 8. VALIDAR CORREO
// ============================================

function validarCorreo() {

    const expresion = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!validarVacio(correo, "de correo")) {
        return false;
    }

    if (!expresion.test(correo.value.trim())) {

        mostrarError(
            correo,
            "Ingrese un correo electrónico válido."
        );

        return false;
    }

    limpiarError(correo);

    return true;
}


// ============================================
// 9. VALIDAR TELÉFONO
// ============================================

function validarTelefono() {

    const expresion = /^[0-9+\s()-]{7,20}$/;

    if (!validarVacio(telefono, "de teléfono")) {
        return false;
    }

    const digitos = telefono.value.replace(/\D/g, "");

    if (
        !expresion.test(telefono.value.trim()) ||
        digitos.length < 7 ||
        digitos.length > 15
    ) {

        mostrarError(
            telefono,
            "Ingrese un número de contacto válido."
        );

        return false;
    }

    limpiarError(telefono);

    return true;
}


// ============================================
// 10. VALIDAR INFORMACIÓN ACADÉMICA
// ============================================

function validarAcademico() {

    let valido = true;

    if (!validarVacio(programa, "del programa")) {
        valido = false;
    }

    if (!validarVacio(ficha, "de ficha")) {
        valido = false;
    }

    if (!validarVacio(centro, "del centro de formación")) {
        valido = false;
    }

    if (!validarVacio(jornada, "de jornada")) {
        valido = false;
    }

    return valido;
}


// ============================================
// 11. VALIDAR INFORMACIÓN DEL APOYO ALIMENTARIO
// ============================================

function validarApoyoAlimentario() {

    let valido = true;

    if (!validarVacio(apoyoActual, "de apoyo alimentario actual")) {
        valido = false;
    }

    if (!validarVacio(
        frecuenciaAlimentacion,
        "de frecuencia de dificultades alimentarias"
    )) {
        valido = false;
    }

    if (!validarVacio(
        momentoAlimentacion,
        "de momento del día"
    )) {
        valido = false;
    }

    return valido;
}


// ============================================
// 12. VALIDAR INFORMACIÓN SOCIOECONÓMICA
// ============================================

function validarSocioeconomico() {

    let valido = true;

    if (!validarVacio(situacion, "de situación laboral")) {
        valido = false;
    }

    if (!validarVacio(personas, "de personas a cargo")) {
        valido = false;
    }

    if (!validarVacio(ingresos, "de ingresos")) {
        valido = false;
    }

    return valido;
}


// ============================================
// 13. VALIDAR JUSTIFICACIÓN
// ============================================

function validarJustificacion() {

    if (!validarVacio(justificacion, "de justificación")) {
        return false;
    }

    if (justificacion.value.trim().length < 20) {

        mostrarError(
            justificacion,
            "Explique su situación con al menos 20 caracteres."
        );

        return false;
    }

    limpiarError(justificacion);

    return true;
}


// ============================================
// 14. VALIDAR DECLARACIÓN
// ============================================

function validarDeclaracion() {

    let mensaje = document.getElementById(
        "error-declaracion"
    );

    const contenedor = declaracion.closest(".check");

    if (!declaracion.checked) {

        if (!mensaje) {

            mensaje = document.createElement("small");

            mensaje.id = "error-declaracion";

            mensaje.classList.add("mensaje-error");

            contenedor.after(mensaje);
        }

        mensaje.textContent =
            "Debe aceptar la declaración para continuar.";

        return false;
    }

    if (mensaje) {
        mensaje.remove();
    }

    return true;
}


// ============================================
// 15. VALIDACIÓN GENERAL DEL FORMULARIO
// ============================================

formulario.addEventListener("submit", function(event) {

    event.preventDefault();

    const resultados = [
        validarNombre(),
        validarDocumento(),
        validarCorreo(),
        validarTelefono(),
        validarAcademico(),
        validarApoyoAlimentario(),
        validarSocioeconomico(),
        validarJustificacion(),
        validarDeclaracion()
    ];

    const resultado = resultados.every(Boolean);

    if (!resultado) {

        const primerError = formulario.querySelector(
            ".campo-error, #error-declaracion"
        );

        if (primerError) {
            primerError.scrollIntoView({
                behavior: "smooth",
                block: "center"
            });
        }

        alert("Por favor, revise los campos señalados.");

    } else {

        alert("El formulario se ha completado correctamente.");

        window.location.href = "/Pagina-principal";

    }

});

// ============================================
// 16. LIMPIAR ERRORES AL REINICIAR
// ============================================

formulario.addEventListener("reset", function() {

    setTimeout(function() {

        document.querySelectorAll(".campo-error").forEach(
            campo => limpiarError(campo)
        );

        document.querySelectorAll(
            ".mensaje-error, #error-declaracion"
        ).forEach(
            mensaje => mensaje.remove()
        );

    }, 0);

});
