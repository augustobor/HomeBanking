<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href= "./register.css">
    <title>homeBanking | Login</title>
</head>
<body>
    <main>
        <h1>Registrarme</h1>
        <form action="" class="login" id="login" method="POST">
            <input class="login_input" id="nombre" type="text" name="nombre" placeholder="Nombre">
            <hr/>
            <input class="login_input" id="apellido" type="text" name="apellido" placeholder="Apellido">
            <hr/>
            <input class="login_input" id="dni" type="number" name="dni" placeholder="DNI">
            <hr/>
            <input class="login_input" id="usuario" type="text" name="user" placeholder="Usuario">
            <hr/>
            <input class="login_input" id="pass" type="password" name="password" placeholder="Contraseña">
            <hr/>
            <input class="login_input" id="repeat_pass" type="password" name="repeat_password" placeholder="Repetir Contraseña">
            <hr/>
            <input class="login_submit" type="submit" onclick="validarRegistro()" value="Registrarme"/>
            <?php
                include("register_mysql.php");  
            ?>
        </form>
    </main>
    <script src="./register.js"></script>
</body>
</html>