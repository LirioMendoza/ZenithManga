const correoInput = document.getElementById("correo");
const enviarBtn = document.querySelector(".input-group-text");

enviarBtn.addEventListener("click", (e) => {
    e.preventDefault(); // evita que el formulario se envíe automáticamente

    // Validar si el campo de correo electrónico está vacío
    if (correoInput.value === "") {
        alert("¡ERROR!. Por favor, introduce tu correo electrónico.");
        return; // detiene la ejecución del código si el campo está vacío
    }

    // Validar si el correo electrónico tiene un formato válido
    const regexEmail = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!regexEmail.test(correoInput.value)) {
        alert("¡ERROR!. El correo electrónico introducido no es válido.");
        return; // detiene la ejecución del código si el correo electrónico no es válido
    }

    // Si el correo electrónico es válido, permite que el formulario se envíe
    alert("¡LISTO!. Tu correo electrónico ha sido enviado.");
    formulario.submit();
});