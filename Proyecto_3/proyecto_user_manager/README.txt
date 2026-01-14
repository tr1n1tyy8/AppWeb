PROYECTO USER MANAGER

Este proyecto consiste en una aplicación web completa para la gestión de usuarios, que permite controlar el acceso mediante un sistema de login y realizar operaciones de administración (CRUD) sobre una base de datos.
🛠️ Tecnologías utilizadas

Para el desarrollo de esta plataforma se han empleado las siguientes herramientas y lenguajes:

    - Frontend: HTML5 y CSS3 para la estructura y el diseño visual (incluyendo el uso de Flexbox para layouts dinámicos).

    - Control de errores: JavaScript para validaciones de formularios antes del envío de datos.

    - Backend: PHP para el procesamiento de datos, gestión de sesiones y comunicación con el servidor.

    - Base de Datos: MySQL / MariaDB, gestionada a través de la interfaz PDO de PHP para garantizar mayor seguridad contra inyecciones SQL.


📂 Organización del Proyecto

La estructura de archivos está diseñada para separar la lógica de la presentación:

    /images: Contiene la imagen usada para los estilos CSS.

    /css: Contiene los estilos globales (styles.css) de la página web.

    /js: Scripts de validación de campos (validacion.js) para asegurar que los datos cumplen los requisitos.

    /php: Núcleo funcional de la aplicación:

        - db.php: Configuración de la conexión a la base de datos.

        - login.php y register.php: Creación de cuentas simples a nivel de usuario y autenticación del mismo.

        - procesar_login.php y procesar_register.php: Gestión de autenticación y creación de cuentas.

        - index.php: Página del dashboard del usuario que ha iniciado sesión.

        - list.php: Visualización del listado de usuarios con opciones de gestión.

        - create.php y procesar_create.php: Creación de cuentas a nivel de administrador y procesamiento de ellas.

        - edit.php y procesar_edit.php: Funciones específicas para modificar registros existentes y procesarlos.

        - delete.php: Página de procesamiento para la eliminación de usuarios.

        - session_check.php: Control de sesiones y roles del usuario para gestionar sus permisos.


🚀 Funcionamiento y Opciones

La aplicación ofrece un flujo de trabajo intuitivo para el administrador y los usuarios:

    - Registro y Login: Los nuevos usuarios pueden darse de alta y acceder al sistema. Las contraseñas se almacenan de forma segura mediante hashes cifrados.

    - Panel de Usuario (Index): Una vez dentro, el usuario puede ver su información personal (ID, nombre, email, rol y hora de conexión) y acceder a la lista si es administrador.

    - Gestión de Listados: Se incluye una vista protegida donde se listan todos los usuarios registrados en un formato de tarjetas flexibles que se ajustan al contenido.

    - Acciones Administrativas:

        - Creación: Posibilidad de añadir nuevos usuarios desde el panel.

        - Edición: Modificación de datos existentes.

        - Eliminación: Borrado de registros con confirmación previa para evitar errores.

    - Seguridad: Validación de datos tanto en el navegador (JS) como en el servidor (PHP), y control de acceso mediante sesiones para proteger las páginas privadas.
