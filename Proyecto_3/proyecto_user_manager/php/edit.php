<?php
// PÁGINA PARA EDITAR EL USUARIO ACTUAL

include "session_check.php";
include "db.php";

// compruebo si el usuario es o no admin, para controlar sus accesos a las urls
if ($_SESSION['usuario_rol'] !== 'admin') {
    header("Location: index.php");
    exit();
}

$id = $_GET["id"];

// Obtener los datos del usuario
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
$stmt->execute([$id]);
$usuario = $stmt->fetch();

// Si el usuario no existe, redirigirlo
if (!$usuario) {
    header("Location: list.php");
    die("Usuario no encontrado");
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="flexbox">
        <h1>Editar Usuario</h1>
<!--Formulario para editar usuario-->
        <form method="POST" action="procesar_edit.php?id=<?= $usuario['id'] ?>"> <!--Comprobar q usuario q se está editando es correcto-->

            <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
            
            <label>Nombre:</label>
            <input type="text" name="nombre" value="<?= $usuario['nombre'] ?>" placeholder="Nombre">

            <label>E-Mail:</label>
            <input type="email" name="email" value="<?= $usuario['email'] ?>" placeholder="Email">

            <label>Nueva Contraseña:</label>
            <input type="password" name="password" value="" placeholder="Contraseña"> <!--No pone valor para que no se hashee la contraseña dos veces (no se podría recuperar)-->

            <label>Edad:</label>
            <input type="number" name="edad" value="<?= $usuario['edad'] ?>" placeholder="Edad">

            <label>Rol:</label>
            <select name="rol">
                <option value="user" <?= ($usuario['rol']=='user') ? 'selected' : '' ?>>Usuario</option>
                <option value="admin" <?= ($usuario['rol']=='admin') ? 'selected' : '' ?>>Administrador</option>
            </select>

            <button type="submit" class="button">Actualizar</button>

        </form>


        <a href="list.php">Volver al listado</a>

    </div>

    <script src="../js/validacion.js"></script>

</body>
</html>