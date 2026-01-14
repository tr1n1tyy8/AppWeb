<!--PÁGINA PARA QUE EL USUARIO SE REGISTRE-->

<?php include "db.php";?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-16">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
    <body>
        <div class="flexbox">
            <div class="titulo">
                <h1>Registrarse</h1>
            </div>
            <br>

            <form action="procesar_register.php" method="POST">
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
                    <button type="submit">Registrarse</button>
                </div>
            </form>

            <p>¿Ya tiene una cuenta? | <a href="login.php" style="color: black; text-decoration: underline">Inicie sesión aquí</a></p>
        </div>
    </body>
</html>