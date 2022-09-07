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
    
    <link rel="stylesheet" type="text/css" href= "./styles/depositar.css">
    <title>homeBanking | Depositar sueldo</title>
</head>
<body>
    <main>
        
        <form action="./sql/depositar_mysql.php" onsubmit="return validar_deposito();" method="POST">
            <input id="destiny" type="text" name="destiny" placeholder="Alias de cuenta destino">

            <input id="amount" type="number" name="amount" placeholder="Sueldo">

            <input class="submit" type="submit" value="Depositar"/>      
            
            <?php
                include('../error.php');
            ?>
        </form>

        <a href="./admin.php">Volver</a>

    </main>
    <script src="./validaciones.js"></script>
</body>
</html>