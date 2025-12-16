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
    <div class="flexbox_list">
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
                <td>
                    <a href="edit.php?id=<?$u['id'] ?>">Editar</a>
                    <a href="delete.php?id=<?= $u['id'] ?>">Eliminar</a> 
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="../php/index.php">Volver a la página principal</a> | <a href="../php/create.php">Crear nuevo usuario</a></p>
    </div>
</body>
</html>