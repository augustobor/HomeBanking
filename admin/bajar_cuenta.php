<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href= "./styles/bajar.css">
    <title>homeBanking | Bajar cuenta</title>
</head>
<body>
    <main>
        <section>
            <?php
                include('./controller/cuentas_3_meses.php');
            ?>
        </section>
        <form action="./sql/bajar_mysql.php" method="POST">
            <input id="destiny" type="text" name="destiny" placeholder="Alias de cuenta a eliminar">

            <input class="submit" type="submit" value="Eliminar"/>      
            
            <?php
                include('../error.php');
            ?>
        </form>

        <a href="./admin.php">Volver</a>

    </main>
</body>
</html>