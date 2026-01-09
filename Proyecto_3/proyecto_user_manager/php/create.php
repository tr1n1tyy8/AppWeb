<!--PÁGINA PARA CREAR USUARIOS/REGISTRARSE-->

<?php 
include "session_check.php";
include "db.php";
// compruebo si el usuario es o no admin, para controlar sus accesos a las urls
if ($_SESSION['usuario_rol'] !== 'admin') {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Creación del Usuario</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="flexbox">
        <h1>Registro de Usuario</h1>
        <form method="POST" action="procesar_create.php">
            <div class="contenedor">
                <div class="user">
                    <p>Nombre de usuario:</p>
                    <br>
                    <input type="text" name="nombre" placeholder="Nombre" required>
                </div>
                <div class="mail">
                    <p>Dirección de correo:</p>
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="contraseña">
                    <p>Contraseña:</p>
                    <input type="password" name="password" placeholder="Contraseña" required>
                </div>
                <div class="años">
                    <p>Edad:</p>
                    <input type="number" name="edad" placeholder="Edad" required>
                </div>
                <div class="rol">
                    <p>Rol del usuario:</p>
                    <select name="rol">
                        <option value="user">Usuario</option>
                        <option value="admin">Administrador</option>
                    </select>
                </div>
            </div>
            <br>
            <button class="boton" type="submit">Crear Usuario</button>
        </form>
    </div>
    <script src="../js/validacion.js"></script>
</body>
</html>