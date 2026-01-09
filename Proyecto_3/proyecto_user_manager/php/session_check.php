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

?>