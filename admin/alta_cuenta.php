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
    <title>homeBanking | Alta de cuenta</title>
</head>
<body>
    <main>
        <h1>Crear cuenta</h1>
        <form action="./sql/register_cuenta.php" onsubmit="return validar_cuenta();" method="POST">
            <input class="input" id="name" type="text" name="name" placeholder="Nombre de la cuenta">
            <hr/>
            <input class="input" id="alias" type="text" name="alias" placeholder="Alias">
            <hr/>
            <input class="input" id="id_user" type="number" name="id_user" placeholder="id del usuario dueño">
            <hr/>
            <input class="submit" type="submit" value="Crear cuenta"/>      
            
            <?php
                include('../error.php');
            ?>
        </form>
        <a href="./admin.php">Volver</a>
    </main>
    <script src="./validaciones.js"></script>
</body>
</html>