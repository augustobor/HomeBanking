<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href= "./login/style.css">
    <title>homeBanking | Login</title>
</head>
<body>
    <main>
        <h1>Inicia sesión</h1>

        <!-- <?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?> -->

        <form action="" class="login" id="login" method="POST">
            <input class="login_input" id="user" type="text" name="user" placeholder="Usuario">
            <hr/>
            <input class="login_input" id="pass" type="password" name="password" placeholder="Contraseña">
            <hr/>
            <input class="login_submit" type="submit" onclick="validar()" value="Iniciar sesión"/>
            <?php
                include("./login/login_mysql.php");  
            ?>
        </form>
    </main>
    <aside id="sidebar">
        <h1>Home Banking</h1>
        <h2>¿No tienes cuenta?</h2>
        <a href="./register/register.php">Registrate</a>
    </aside>
    <script src="./login/index.js"></script>
</body>
</html>