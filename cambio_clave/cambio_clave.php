<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../login/styles/style.css">
    <link rel="stylesheet" type="text/css" href="../login/styles/tablet.css" media="screen and (min-width: 680px)">
    <link rel="stylesheet" type="text/css" href="../login/styles/desktop.css" media="screen and (min-width: 1000px)"> 

    <title>homeBanking | Cambio de clave</title>
</head>
<body>
    <main>
        <h1>Cambio de clave</h1>

        <form action="./cambio_mysql.php" onsubmit="return validar();" class="login" id="login" method="POST">
            <input class="login_input" id="pass" type="password" name="password" placeholder="Contraseña">
            <hr/>
            <input class="login_input" id="pass2" type="password" name="password2" placeholder="Repetir Contraseña">
            <hr/>
            <input class="login_submit" type="submit" value="Cambiar contraseña"/>
            
            <?php
                include('../error.php');
            ?>

        </form>
    </main>
    <script src="./cambio_clave.js"></script>
</body>
</html>