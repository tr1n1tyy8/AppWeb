<?php include "db.php";?>

<!--PÁGINA PARA QUE EL USUARIO INICIE SESIÓN-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-16">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
    <body>
        <div class="flexbox">
                <div class="titulo">
                    <h1>Iniciar Sesión</h1>
                </div>
                <br>

                <form action="procesar_login.php" method="POST">
                    <div class="contenedor_login">
                        <div class="usuario">
                            <label>Nombre de usuario:</label>
                            <br>
                            <input type="text" name="nombre" placeholder="Nombre" style="height:18%; font-size:large"><br><br>
                        </div>
                        <br>
                        <div class="password">
                            <label>Contraseña:</label>
                            <br>
                            <input type="password" name="contraseña" placeholder="Contraseña" style="height:15%; font-size:large"><br><br>
                        </div>
                        <button type="submit" class="boton_login">Iniciar sesión</button>
                    </div>
                </form>

                <p>¿No tiene una cuenta? | <a href="register.php" style="color: black; text-decoration: underline">Regístrese aquí</a></p>
        </div>

        <script src="../js/validacion.js"></script>
        
    </body>
</html>