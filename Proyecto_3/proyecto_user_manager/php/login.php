<!--PÁGINA PARA QUE EL USUARIO INICIE SESIÓN-->

<?php include "session_check"; include "db.php";?>

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
                <h1>Iniciar Sesión</h1>
            </div>
            <br>

            <form action="procesar_login.php" method="POST">
                <label>E-mail del usuario:</label>
                <input type="email" name="email" placeholder="Email" style="height:18%; font-size:large"><br><br>
                <label>Contraseña:</label>
                <input type="password" name="contraseña" placeholder="Contraseña" style="height:15%; font-size:large"><br><br>
                <button type="submit">Iniciar sesión</button>
            </form>

            <p>¿No tiene una cuenta? | <a href="create.php" style="color: black;">Regístrese aquí</a></p>
        </div>
    </body>
</html>