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

    <title>homeBanking | Transferir</title>
</head>
<body>
    
    <main>
        <h2>Mis Cuentas</h2>
        <section>
            
             <?php
                include('./controller/mostrar_alias_cuentas.php');
             ?>

        </section>
        <form   action="./sql/transferencia_mysql.php" 
                onsubmit="return confirm('Estás seguro de realizar la transerencia?')" 
                method="POST">
                <input id="origin" type="text" name="origin" placeholder="Alias de cuenta origen">

                <input id="cash" type="number" name="cash" placeholder="Monto">

                <input id="destiny" type="text" name="destiny" placeholder="Alias cuenta destino">

                <input class="submit" type="submit" value="Transferir"/>      
                
                <?php
                    include('../error.php');
                ?>
        </form>

        <h1>Transfiere de forma segura con nosotros</h1>
        <a href="./main.php">Volver</a>
    </main>
    <aside id="sidebar">
        <h2>Cuentas recientes</h2>
        <?php
            include('./controller/ultimas_cuentas.php');
        ?>
    </aside>
</body>
</html>