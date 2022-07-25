<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="./favicon.ico">

    <link rel="stylesheet" type="text/css" href="./login/styles/style.css">
    <link rel="stylesheet" type="text/css" href="./login/styles/tablet.css" media="screen and (min-width: 680px)">
    <link rel="stylesheet" type="text/css" href="./login/styles/desktop.css" media="screen and (min-width: 1000px)"> 

    <title>homeBanking | Login</title>
</head>
<body>
    <main>
        <h1>Inicia sesión</h1>

        <form action="./login/login_mysql.php" onsubmit="return validar();" class="login" id="login" method="POST">
            <input class="login_input" id="user" type="text" name="user" placeholder="Usuario">
            <input class="login_input" id="pass" type="password" name="password" placeholder="Contraseña">
            <input class="login_submit" type="submit" value="Iniciar sesión"/>
            
            <?php
                include('./error.php');
            ?>
            <?php
                include('./sucess.php');
            ?>

        </form>
    </main>
    <aside id="sidebar">
        <h1>Home Banking</h1>
    </aside>
    <script src="./login/index.js"></script>
</body>
</html>