<!--PÁGINA PARA QUE EL USUARIO INICIE SESIÓN-->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-16">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="../css/estilos_formulario.css">
    <link rel="icon" href="">
    <title>Inicio de sesión</title>
</head>
    <body>
        <div class="flexbox">
            <h1>Inicie sesión con sus credenciales</h1>
            <br>

            <form action="procesar_inicio_sesion.php" method="post">
                <label>Usuario:</label>
                <input type="text" name="usuario" required style="height:18%; font-size:large"><br><br>
                <label>Contraseña:</label>
                <input type="password" name="contraseña" required style="height:15%; font-size:large"><br><br>
                <button type="submit">Iniciar sesión</button>
            </form>

            <p style="color: grey;">¿No tiene una cuenta? | <a href="registro.php">Regístrese aquí</a></p>
        </div>
    </body>
</html>