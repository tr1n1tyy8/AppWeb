<?php 
    session_start();
    include "session_check.php";
    include "db.php";
?>

<!-- PÁGINA PRINCIPAL DEL USUARIO-->
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>UserManager</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="flexbox_index">
        <h1>Dashboard de <?php echo $_SESSION['usuario_nombre']; ?></h1>
        <p>¡Bienvenid@, <?php echo $_SESSION['usuario_nombre']; ?>!</p>
        <br>
        <p>Esta es tu página de usuario. Aquí... </p>
        <br>
        <p>Último inicio de sesión: <?php echo $_SESSION['hora_inicio_sesion']; ?></p>
        <a class="boton" href="list.php" style="color: black;">Ir al CRUD</a>
    </div>
</body>
</html>