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
        <p>Aquí encontrarás el listado de los usuarios creados en el sistema.</p>
        <div class="contenedor_list">
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
                        <?php if ($_SESSION['usuario_rol'] === 'admin'): ?>
                            <a href="edit.php?id=<?= $u['id'] ?>" style="color: black;">Editar</a>

                            <!--Formulario para eliminar usuario (onsubmit es JS)-->
                            <form method="POST" action="delete.php?id=<?= $usuario['id'] ?>" onsubmit="return confirm('¿Está seguro de que desea eliminar el usuario?')">
                                <input type="hidden" name="id" value="<?php echo $id;?>"> <!--Para que obtenga el id del usuario a borrar y no se muestre-->
                                <button type="submit" class="del_button">Eliminar</button>
                            </form>

                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <a href="../php/create.php" style="color: black;">Crear Usuario</a>
        <a href="../php/index.php" style="color: black;">Volver al Inicio</a>
    </div>

    <script src="../js/validacion.js"></script>

</body>
</html>