<!--PÁGINA PARA QUE EL USUARIO INICIE SESIÓN-->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-16">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="icon" href="">
    <title>Inicio de sesión</title>
</head>
    <body>
        <div class="flexbox">
            <div class="titulo">
                <h1>Inicie sesión con sus credenciales</h1>
            </div>
            <br>

            <form action="procesar_login.php" method="post">
                <label>E-mail del usuario:</label>
                <input type="text" name="usuario" required style="height:18%; font-size:large"><br><br>
                <label>Contraseña:</label>
                <input type="password" name="contraseña" required style="height:15%; font-size:large"><br><br>
                <button type="submit">Iniciar sesión</button>
            </form>

            <p>¿No tiene una cuenta? | <a href="create.sphp">Regístrese aquí</a></p>
        </div>
    </body>
</html>