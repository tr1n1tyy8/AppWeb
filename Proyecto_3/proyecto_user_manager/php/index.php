<?php 
    session_start();
    include "session_check.php";
    include "db.php";

    $id_usuario = $_SESSION['usuario_id'];
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
    $stmt->execute([$id_usuario]);
    $usuario = $stmt->fetch();
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
        <h3>¡Bienvenid@, <?php echo $_SESSION['usuario_nombre']; ?>! 🎉</h3>
        <br>
        <p>Esta es tu página principal. Aquí podrás encontrar toda la información que desees sobre tu usuario.</p>
        <br>
        <div class="datos">
            <table>
                <tr class="top_table">
                    <th>ID</th><th style="width: 120px;">Nombre</th><th style="width: 200px;">Email</th><th>Contraseña (cifrada)</th><th>Edad</th><th>Rol</th>
                </tr>
                <tr>
                    <td><?= $usuario['id'] ?></td>
                    <td><?= $usuario['nombre'] ?></td>
                    <td><?= $usuario['email'] ?></td>
                    <td><?= $usuario['contraseña'] ?></td>
                    <td><?= $usuario['edad'] ?></td>
                    <td><?= $usuario['rol'] ?></td>
                </tr>
            </table>
        </div>
        <p style="margin-top: 50px;">Último inicio de sesión: <?php echo $_SESSION['hora_inicio_sesion']; ?></p>
        <div class="opciones_index">
            <a href="list.php" style="text-decoration: none;">Ir al CRUD</a>
            <a href="login.php" style="text-decoration: none;">Cerrar Sesión</a>
        </div>
    </div>
</body>
</html>