<?php
    session_start();
    include("../conexion.php");
    require('./validar_cliente.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="../favicon.ico">

    <link rel="stylesheet" type="text/css" href="./styles/home_mobile.css">
    <link rel="stylesheet" type="text/css" href="./styles/home_tablet.css" media="screen and (min-width: 680px)">
    <link rel="stylesheet" type="text/css" href="./styles/home.css" media="screen and (min-width: 1000px)"> 
    
    <title>homeBanking | Home</title>
</head>
<body>
    <p class='message'>Bienvenido <?php echo $_SESSION['user'];?> 😀!</p>
    
    <?php
        include('../sucess.php');
    ?>
    
    <menu>
        <ul>
            <li><a href="../salir.php">Salir</a></li>
            <li><a href="./transferencia.php">Transferir</a></li>
        </ul>
    </menu>
    <main>

        <section> 
            <h2>Cuentas</h2>
            <div> 
            <?php
                include('./controller/cuentas.php');
            ?>
            </div>            
        </section>

        <section>
            <h2>Ultimos movimientos</h2>
            <div class='transferencias-display'>
                <?php
                    include('./controller/ultimos_movimientos.php');
                ?>
            </div>
        </section>
    </main>
    <script src='./lista.js'></script>
</body>
</html>