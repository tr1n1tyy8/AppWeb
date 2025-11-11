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
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="icon" href="">
</head>
<body>
    <div class="flexbox">
        <h1>Bienvenido, <?php echo $_SESSION['usuario']; ?> 🎉</h1>
        <p>Has iniciado sesión correctamente.</p>
        <p>¿Qué desea hacer ahora?</p>
        <li>
            <ul><p>Navegar</p></ul>
        </li>
        <li><p><a href="cerrar_sesion.php">Cerrar sesión</a></p></li>
    </div>
</body>
</html>