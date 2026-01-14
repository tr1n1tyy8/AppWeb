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
        <h3>¡Bienvenid@, <?php echo $_SESSION['usuario_nombre']; ?>!</h3>
        <br>
        <p>Esta es tu página principal. Aquí podrás encontrar toda la información que deseas sobre tu usuario.</p>
        <br>
        <table>
            <tr>
                <th>ID</th><th>Nombre</th><th>Email</th><th>Contraseña</th><th>Edad</th><th>Rol</th>
            </tr>
        <p>Último inicio de sesión: <?php echo $_SESSION['hora_inicio_sesion']; ?></p>
        <a class="boton" href="list.php" style="color: black;">Ir al CRUD</a>
    </div>
</body>
</html>