<?php
// PÁGINA PARA LISTAR LOS DATOS DEL USUARIO ACTUAL

include "db.php";

$stmt = $conn->query("SELECT * FROM usuarios");
$usuarios = $stmt->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Listado de Usuarios</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="flexbox">
        <h1>Usuarios</h1>
        <table>
            <tr>
                <th>ID</th><th>Nombre</th><th>Email</th><th>Contraseña</th><th>Edad</th><th>Rol</th>
            </tr>
            <?php foreach ($usuarios as $u): ?>
            <tr>
                <td><?= $u['id'] ?></td>
                <td><?= $u['nombre'] ?></td>
                <td><?= $u['email'] ?></td>
                <td><?= $u['contraseña'] ?></td>
                <td><?= $u['edad'] ?></td>
                <td><?= $u['rol'] ?></td>
            </tr>
            <form action="edit.php?id=<?= $u['id'] ?>" method="get">
                <button class="boton" type="submit">Editar</a>
            </form>
                
                <a class="boton-delete" href="delete.php?id=<?= $u['id'] ?>">Eliminar</a>
            <form action="create.php" method="get">
                <button class="boton" type="submit">Crear Usuario</button>
            </form>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>