const formulario = document.querySelector("form");
const nombreInput = document.getElementById("nombre");
const apellidoInput = document.getElementById("apellido");
const correoInput = document.getElementById("correo");
const telefonoInput = document.getElementById("telefono");
const mensajeInput = document.getElementById("mensaje");
const politicaInput = document.getElementById("politica");

formulario.addEventListener("submit", (e) => {
    e.preventDefault(); // evita que el formulario se envíe automáticamente

    // Validar el nombre
    if (nombreInput.value === "") {
        alert("Por favor, introduce tu nombre");
        nombreInput.focus();
        return; // detiene la ejecución del código si el campo está vacío
    }

    // Validar el apellido
    if (apellidoInput.value === "") {
        alert("Por favor, introduce tu apellido");
        apellidoInput.focus();
        return;
    }

    // Validar el correo electrónico
    const regexEmail = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!regexEmail.test(correoInput.value)) {
        alert("El correo electrónico introducido no es válido");
        correoInput.focus();
        return;
    }

    // Validar el teléfono
    const regexTelefono = /^\d+$/;
    if (!regexTelefono.test(telefonoInput.value)) {
        alert("El número de teléfono introducido no es válido");
        telefonoInput.focus();
        return;
    }

    // Validar el mensaje
    if (mensajeInput.value === "") {
        alert("Por favor, introduce tu mensaje");
        mensajeInput.focus();
        return;
    }

    // Validar la política de privacidad
    if (!politicaInput.checked) {
        alert("Debes aceptar la política de privacidad para enviar el mensaje");
        politicaInput.focus();
        return;
    }

    // Si todos los campos son válidos, permite que el formulario se envíe
    alert("¡Tu mensaje ha sido enviado!");
    formulario.submit();
});

