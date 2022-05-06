<?php
    session_start();
    $_SESSION['sucess'] = NULL;
?>
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
    <!-- <p class='message'>Vista del admin</p> -->
    <menu>
        <ul>
            <li><a href="../index.php">Volver</a></li>
            <li><a href="./alta_cliente.php">Alta_cliente</a></li>
            <li><a href="./alta_cuenta.php">Alta_cuenta</a></li>
        </ul>
    </menu>
    <main>
        <div>
            <h2>Bienvenido a la vista del admin 😎</h2>
            <h2>Selecciona alguna de las opciones del menú</h2>
        </div>
        <?php
            if($_SESSION['sucess'] != NULL) {
                echo "<p class='sucess'>" . $_SESSION['sucess'] . "</p>";
                $_SESSION['sucess'] = NULL;
            }
        ?>
    </main>
</body>
</html>