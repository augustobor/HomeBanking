<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href= "./style.css">
    <title>homeBanking | Login</title>
</head>
<body>
    <main>
        <h1>Inicia sesión</h1>

        <!-- <?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?> -->

        <form action="validar.php" class="login" method="POST">
            <div class="login_input">
                <input type="text" name="nombre" placeholder="Usuario">
                <hr/>
            </div>
            
            <div class="login_input">
                <input type="password" name="password" placeholder="Contraseña">
                <hr/>
            </div>
            <input type="submit" value="Iniciar sesión"/>
            <?php
                include("mysql.php")    
            ?>
        </form>
    </main>
    <aside id="sidebar">
        <h1>Home Banking</h1>
        <h2>¿No tienes cuenta?</h2>
        <a href="register.html">Registrate</a>
    </aside>
</body>
</html>