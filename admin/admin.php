<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href= "./admin.css">
    <title>homeBanking | Admin</title>
</head>
<body>
    <menu>
        <ul>
            <li><a href="../index.php">Volver</a></li>
            <li><a href="../index.php">Inicio</a></li>
            <li><a href="../login/login.php">Login</a></li>
            <li><a href="../contacto/contacto.php">Contacto</a></li>
        </ul>
    </menu>
    <main>
        <p class='message'>Vista del admin</p>
        
        <h1>Cuentas</h1>
        <section class="cuentas"> 
            <article class="cuenta">
                <h2>Nombre</h2>
                <p>Alias</p>
                <p>Saldo</p>
            </article>   
            <article class="cuenta">
                <h2>Nombre</h2>
                <p>Alias</p>
                <p>Saldo</p>
            </article>   
            <article class="cuenta">
                <h2>Nombre</h2>
                <p>Alias</p>
                <p>Saldo</p>
            </article>   
        </section>
    </main>
    <?php
        session_start();
        $_SESSION['user'] = "-1";
    ?>
</body>
</html>