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
    <menu>
        <ul>
            <li><a href="../index.php">Volver</a></li>
            <li><a href="./transferencia.php">Transferir</a></li>
        </ul>
    </menu>
    <main>
        
        <?php
            if(isset($_SESSION['sucess'])) { ?>
                <p class='message'>
                <?php 
                echo $_SESSION['sucess'];
                unset($_SESSION['sucess']);
                ?>
                 </p>
           <?php 
            }
        ?>

        <section class="cuentas"> 

            <h2>Cuentas</h2>
            <div> 
                <?php

                    if($conexion->connect_errno) {
                        die("La conexión falló" . $conexion->connect_errno);
                    } else {

                        $sql = "SELECT * FROM cuentas WHERE id_usuario = '" . $_SESSION['user_id'] . "'";
                                
                        if(($conexion->query($sql))->num_rows > 0) {
                            $resultado = mysqli_query($conexion, $sql);
                            
                            while($fila = mysqli_fetch_array($resultado)) {

                                ?>
                                <article class="cuenta">
                                    <h3><?php echo $fila["alias"]?></h3>
                                    <p><?php echo $fila["nombre"]?></p>
                                    <p>$<?php echo $fila["saldo"]?></p>
                                </article>  
                             
                            <?php
                            }
                        } else {                 
                            $_SESSION['error'] = "No tienes cuentas";
                            ?>
                            <p class="cuenta"><?php echo $_SESSION['error']?></p>
                            <?php
                        }
                    }
                ?>
            </div>            
        </section>

        <section>
            <h2>Ultimos movimientos</h2>
            <?php
                $sql = "SELECT * FROM transacciones WHERE id_cuenta_origen = '" . $_SESSION['user_id'] . "' ORDER BY fecha_hora DESC LIMIT 5";
                
                if(($conexion->query($sql))->num_rows > 0) {
                    $resultado = mysqli_query($conexion, $sql);

                    while($fila = mysqli_fetch_array($resultado)) {
                        ?>
                            <article class="transaccion">
                                <p>Fecha y hora de la transacción: <?php echo $fila["fecha_hora"]?></p>
                                <p>Monto: <?php echo $fila["monto"]?></p>
                                <p>id de la cuenta destino: <?php echo $fila["id_cuenta_destino"]?></p>
                            </article>  
                        <?php
                    }
                }

            ?>
        </section>
    </main>
</body>
</html>