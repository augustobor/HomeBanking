<?php
    session_start();
    require('./validar_admin.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="../favicon.ico">

    <link rel="stylesheet" type="text/css" href= "./styles/admin.css">
    <title>homeBanking | Admin</title>
</head>
<body>
    <menu>
        <ul>
            <li><a href="../salir.php">Salir</a></li>
            <li><a href="./alta_cliente.php">Alta_cliente</a></li>
            <li><a href="./alta_cuenta.php">Alta_cuenta</a></li>
            <li><a href="./depositar.php">Depositar_sueldo</a></li>
            <li><a href="./bajar_cuenta.php">Bajar_cuenta</a></li>
        </ul>
    </menu>
    <main>
        <div>
            <h2>Bienvenido a la vista del admin 😎 <?php echo $_SESSION['user'];?></h2>
            <h2>Selecciona alguna de las opciones del menú</h2>
        </div>
        <?php
            include('../sucess.php');
        ?>
    </main>
</body>
</html>