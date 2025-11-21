<?php
//PÁGINA DE BIENVENIDA SI EL INICIO DE SESIÓN HA SIDO EXITOSO

session_start();
if (!isset($_SESSION['usuario'])) {
header("Location: iniciar_sesion.php");
exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-16">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Bienvenida</title>
    <link rel="stylesheet" href="../css/estilos_pagina_principal.css">
    <link rel="icon" href="">
</head>
<body>
    <div class="flexbox">
        <h1>Bienvenid@, <?php echo $_SESSION['usuario']; ?> 🎉</h1>
        <p>Has iniciado sesión correctamente.</p>
        <p>¿Qué desea hacer ahora?</p>
        <button><a href="index.php">Navegar</a></button>
        <button><a href="cerrar_sesion.php">Cerrar sesión</a></button>
    </div>
</body>
</html>