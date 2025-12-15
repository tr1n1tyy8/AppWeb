// PÁGINA DE VALIDACIÓN SIMPLE DE USUARIOS

document.addEventListener("DOMContentLoaded", function() {

    const forms = document.querySelectorAll("form");    //escucha todos los formularios
    
    forms.forEach(form => {
        form.addEventListener("submit", function(event) {

            if (!form.nombre || !form.email) return;    //aplicamos validación a los formularios con estos campos

            const nombre = form.nombre.value.trim();
            const email = form.email.value.trim();
            const edad = form.edad.value.trim();
            const rol = form.rol.value;
            const contraseña = form.contraseña.value.trim();

            let errores = [];

            // Nombre mínimo 3 caracteres
            if (nombre.length < 3) {
                errores.push("El nombre debe tener al menos 3 caracteres.");
            }

            // Formato email válido
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                errores.push("El formato del email no es válido.");
            }

            // Edad entre 1 y 120 años
            if (isNaN(edad) || edad < 1 || edad > 120) {
                errores.push("La edad debe ser un número entre 1 y 120.");
            }

            // Validar rol
            if (rol !== "user" && rol !== "admin") {
                errores.push("Selecciona un rol válido.");
            }

            if (nombre == null || email == null || edad == null || rol == null || contraseña == null) {
                errores.push("El campo no debe estar vacío.")
            }

            // Si hay errores, no enviar y mostrar mensaje
            if (errores.length > 0) {
                event.preventDefault(); // Evita que se envíe el formulario
                alert(errores.join("\n"));
            }
        });
    });
});