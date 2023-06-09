<?php
    session_start();
    require('./validar_cliente.php');
    include('../conexion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="home-banking-transfer">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./styles/transferencia_mobile.css">
    <link rel="stylesheet" type="text/css" href="./styles/transferencia_tablet.css" media="screen and (min-width: 680px)">
    <link rel="stylesheet" type="text/css" href="./styles/transferencia.css" media="screen and (min-width: 1000px)"> 

    <link rel="icon" href="../favicon.ico">

    <title>homeBanking | Transfer</title>
</head>
<body>
    
    <main>
        <h2>My accounts</h2>
        <section>
            
             <?php
                include('./controller/mostrar_alias_cuentas.php');
             ?>

        </section>
        <form   action="./sql/transferencia_mysql.php" 
                onsubmit="return confirm('Are you sure to make this transfer?')" 
                method="POST">
                <input id="origin" type="text" name="origin" placeholder="origin count alias">

                <input id="cash" type="number" name="cash" placeholder="amount">

                <input id="destiny" type="text" name="destiny" placeholder="destiny count alias">

                <input class="submit" type="submit" value="Transfer"/>      
                
                <?php
                    include('../error.php');
                ?>
        </form>

        <h1>Make secure transfers with us</h1>
        <a href="./main.php">Go back</a>
    </main>
    <aside id="sidebar">
        <h2>recent accounts</h2>
        <?php
            include('./controller/ultimas_cuentas.php');
        ?>
    </aside>
</body>
</html>