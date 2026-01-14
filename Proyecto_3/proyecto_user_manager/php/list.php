<?php
// PÁGINA PARA LISTAR LOS DATOS DEL USUARIO ACTUAL

include "session_check.php";
include "db.php";

// compruebo si el usuario es o no admin, para controlar sus accesos a las urls
if ($_SESSION['usuario_rol'] !== 'admin') {
    header("Location: index.php");
    exit();
}

$stmt = $pdo->query("SELECT * FROM usuarios");
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
        <h1>Listado de Usuarios</h1>
        <div class="contenedor_list">
            <table>
                <tr class="top_table">
                    <th>ID</th><th style="width: 120px;">Nombre</th><th style="width: 200px;">Email</th><th>Contraseña</th><th>Edad</th><th>Rol</th>
                </tr>
                <?php foreach ($usuarios as $u): ?>
                <tr>
                    <td><?= $u['id'] ?></td>
                    <td><?= $u['nombre'] ?></td>
                    <td><?= $u['email'] ?></td>
                    <td><?= $u['contraseña'] ?></td>
                    <td><?= $u['edad'] ?></td>
                    <td><?= $u['rol'] ?></td>

                    <td style="background-color: #EBEEF0; border: none; border-radius: 0px;" class="opciones">
                        <?php if ($_SESSION['usuario_rol'] === 'admin'): ?>
                            <a href="edit.php?id=<?= $u['id'] ?>" style="color: white; text-decoration: none;" class="del_button">Editar</a>

                            <!--Formulario para eliminar usuario (onsubmit es JS)-->
                            <form method="POST" action="delete.php?id=<?= $u['id'] ?>" onsubmit="return confirm('¿Está seguro de que desea eliminar el usuario?')">
                                <!--<input type="hidden" name="id" value=""> Para que obtenga el id del usuario a borrar y no se muestre-->
                                <button type="submit" style="font-size: large;" class="del_button">Eliminar</button>
                            </form>

                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="enlaces">
            <a href="../php/create.php" style="color: white; text-decoration: none;" class="list_button">Crear Usuario</a>
            <a href="../php/index.php" style="color: white; text-decoration: none;" class="list_button">Volver al Inicio</a>
        </div>
    </div>

    <script src="../js/validacion.js"></script>

</body>
</html>