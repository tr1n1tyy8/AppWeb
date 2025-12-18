<?php
// PÁGINA PARA EDITAR EL USUARIO ACTUAL

include "db.php";
//include session_check

// Si el usuario no está logado (no tiene id la url)
if (!isset($_GET['id'])) {
    header("Location: list.php");
    exit;
}

$id = $_GET["id"];

// Obtener los datos del usuario
$stmt = $conn->prepare("SELECT id, nombre, email, contraseña, edad, rol FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$usuario = $stmt->get_result()->fetch_assoc();

// Si el usuario no existe, redirigirlo
if (!$usuario) {
    header("Location: list.php");
    echo "El usuario no existe";
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
            <input type="text" name="nombre" value="<?= $usuario['nombre'] ?>" placeholder="Nombre">
            <input type="email" name="email" value="<?= $usuario['email'] ?>" placeholder="Email">
            <input type="password" name="contraseña" value="<?= $usuario['contraseña'] ?>" placeholder="Contraseña">
            <input type="number" name="edad" value="<?= $usuario['edad'] ?>" placeholder="Edad">
            <select name="rol">
                <option value="user" <?= $usuario['rol']=='user'?'selected':'' ?>>Usuario</option>
                <option value="admin" <?= $usuario['rol']=='admin'?'selected':'' ?>>Administrador</option>
            </select>
            <button type="submit" class="button">Actualizar</button>
        </form>
<!--Formulario para eliminar usuario (onsubmit es JS)-->
        <form method="POST" action="delete.php?id=<?$usuario['id']?>" onsubmit="return confirm('¿Está seguro de que desea eliminar el usuario?')">
            <input type="hidden" name="id" value="<?php echo $id;?>"> <!--Para que obtenga el id del usuario a borrar y no se muestre-->
            <button type="submit" class="button">Eliminar</button>
        </form>
        <a href="list.php">Volver al listado</a>
    </div>
    <script src="../js/validacion.js"></script>
</body>
</html>