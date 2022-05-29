<?php
    session_start();
    include("../conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href= "./styles/home.css">
    
    <title>homeBanking | Home</title>
</head>
<body>
    <p class='message'>BIENVENIDO <?php echo $_SESSION['user'];?> 😀!</p>
    
    <?php
        include('../sucess.php');
    ?>
    
    <menu>
        <ul>
            <li><a href="../index.php">Volver</a></li>
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
            <?php
                include('./controller/ultimos_movimientos.php');
            ?>
        </section>
    </main>
    <script src='./lista.js'></script>
</body>
</html>