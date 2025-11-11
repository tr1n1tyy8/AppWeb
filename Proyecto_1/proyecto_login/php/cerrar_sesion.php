<?php
session_start();
session_destroy();
header("Location: iniciar_sesion.php");
exit;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-16">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Sesión cerrada con éxito</h1>
</body>
</html>