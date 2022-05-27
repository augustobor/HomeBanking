<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href= "./styles/transferencia.css">
    <title>homeBanking | Transferir</title>
</head>
<body>
    <main>

    <h1>Transfiere de forma segura con nosotros</h1>
        <header>
            <a href="./main.php">Volver</a>
        <header/>
        
        <form action="./sql/transferencia_mysql.php" method="POST">
            <input id="origin" type="text" name="origin" placeholder="Alias de cuenta origen">

            <input id="cash" type="number" name="cash" placeholder="Monto">

            <input id="destiny" type="text" name="destiny" placeholder="Alias cuenta destino">

            <input class="submit" type="submit" value="Transferir"/>      
            
            <?php
                include('../error.php');
            ?>
        </form>

    </main>
</body>
</html>