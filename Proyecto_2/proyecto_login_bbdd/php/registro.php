<!--PÁGINA PARA REGISTRARSE SI EL USUARIO NO TIENE CUENTA-->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-16">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../css/form_styles.css">
    <link rel="icon" href="">
</head>
<body>
    <div class="flexbox">
        <div class="titulo">
            <h1>Regístrese si no tiene una cuenta</h1>
        </div>
        <br>

        <form action="procesar_registro.php" method="post">
            <label>Nombre de usuario:</label>
            <input type="text" name="usuario" style="height:18%; font-size:large" required ><br><br>
            <label>Contraseña:</label>
            <input type="password" name="password" style="height:15%; font-size:large" required ><br><br>
            <button type="submit">Registrarse</button>
        </form>

        <p>¿Ya tiene una cuenta? | <a href="login.php">Inicie sesión aquí</a></p>
    </div>
</body>
</html>