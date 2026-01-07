<?php
// PÁGINA QUE COMPRUEBA QUE EL USUARIO ESTÁ LOGADO Y ES ADMIN

//obligo al inicio sesión para que compruebe las variables del usuario y determinar sus permisos
if (session_status() === PHP_SESSION_NONE) {    
    session_start();
}

//si no hay sesión iniciada obligo a redirigir a la página del login
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

// compruebo si el usuario es o no admin, para controlar sus accesos a las urls
if ($_SESSION['usuario_rol'] !== 'admin') {
    header("Location: index.php");
    exit();
}
?>