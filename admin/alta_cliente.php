<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href= "./styles/altas.css">
    <title>homeBanking | Alta de cliente</title>
</head>
<body>
    <main> 
        <h1>Registrar usuario</h1>
        <a href="./admin.php">Volver</a>
        <form action="./sql/register_mysql.php" onsubmit="return validar_cliente();" method="POST">
            <input class="input" id="name" type="text" name="name" placeholder="Nombre">
            <hr/>
            <input class="input" id="surname" type="text" name="surname" placeholder="Apellido">
            <hr/>
            <input class="input" id="user" type="text" name="user" placeholder="Usuario">
            <hr/>
            <input class="input" id="dni" type="text" name="dni" placeholder="DNI">
            <hr/>
            <input class="input" id="pass" type="password" name="password" placeholder="Contraseña">
            <hr/>
            <input class="input" id="pass2" type="password" name="password2" placeholder="Repetir Contraseña">
            <hr/>
            <input class="submit" type="submit" value="Registrar usuario"/>      
            
            <?php
                include('../error.php');
            ?>
        </form>
        
    </main>
    <script src="./validaciones.js"></script>
</body>
</html>