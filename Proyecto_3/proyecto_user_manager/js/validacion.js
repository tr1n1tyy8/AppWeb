// PÁGINA DE VALIDACIÓN SIMPLE DE USUARIOS

document.addEventListener("DOMContentLoaded", function() {
    const forms = document.querySelectorAll("form");    //escucha todos los formularios

    forms.forEach(form => {
        form.addEventListener("submit", function(event) {

            // Evita que se acumulen mensajes de error
            const erroresAcumulados = form.querySelectorAll(".error-msg");
            erroresAcumulados.forEach(error => error.remove());

            let errores = false;    // en vez de acumular los errores en una lista, acumulo si hay un error (true) o no hay (false) en un valor bool

            // Función para mostrar el error debajo de cada input
            function mostrarError(inputName, mensaje) {
                const inputField = form.querySelector(`[name="${inputName}"]`);
                
                if (inputField) {
                    const textoError = document.createElement("p"); //damos estilos al mensaje
                    textoError.className = "error-msg";
                    textoError.innerHTML = mensaje;
                    textoError.style.color = "red";
                    textoError.style.fontSize = "14px";
                    textoError.style.margin = "5px 0px";

                    // Insertamos el mensaje justo después del campo de entrada
                    inputField.insertAdjacentElement("afterend", textoError);
                    errores = true;
                }
            }

            // Obtenemos los valores de los campos (si existen en el formulario)
            const nombre = form.querySelector('[name="nombre"]');
            const email = form.querySelector('[name="email"]');
            const edad = form.querySelector('[name="edad"]');
            const rol = form.querySelector('[name="rol"]');
            const contraseña = form.querySelector('[name="contraseña"]');

            // Comprobación de campos vacíos
            if (nombre && nombre.value.trim() === "") {
                mostrarError("nombre", "Este campo no puede estar vacío.");
            }
            if (email && email.value.trim() === "") {
                mostrarError("email", "El email es obligatorio.");
            }
            if (edad && edad.value.trim() === "") {
                mostrarError("edad", "Debes introducir una edad.");
            }
            if (contraseña && contraseña.value.trim() === "") {
                mostrarError("contraseña", "La contraseña es obligatoria.");
            }

            // Validación específica de Nombre (mínimo 3 caracteres)
            if (nombre && nombre.value.trim() !== "" && nombre.value.trim().length < 3) {
                mostrarError("nombre", "El nombre debe tener al menos 3 caracteres.");
            }

            // Validación de formato de Email
            if (email && email.value.trim() !== "") {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                if (!emailRegex.test(email.value.trim())) {
                    mostrarError("email", "El formato del email no es válido.");
                }

            }

            // Validación de Edad (1 a 120 años)
            if (edad && edad.value.trim() !== "") {
                const valorEdad = parseInt(edad.value); //funcion que convierte str a int

                if (isNaN(valorEdad) || valorEdad < 1 || valorEdad > 120) {
                    mostrarError("edad", "La edad debe estar entre 1 y 120 años.");
                }

            }

            // Validación de Rol (user o admin)
            if (rol) {

                if (rol.value !== "user" && rol.value !== "admin") {
                    mostrarError("rol", "Selecciona un rol válido (User o Admin).");
                }

            }

            // He sustituido el "si la lista errores tiene contenido", por si el valor de errores es true (para el formulario) o false (continua)
            if (errores) {
                event.preventDefault();
            }
        });
    });
});