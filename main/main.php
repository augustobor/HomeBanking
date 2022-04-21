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
    <link rel="stylesheet" type="text/css" href= "./home.css">
    <title>homeBanking | Home</title>
</head>
<body>
    <p class='message'>BIENVENIDO 😀!</p>
    <menu>
        <ul>
            <li><a href="../index.php">Volver</a></li>
            <li><a href="./cuentas.php">Cuentas</a></li>
        </ul>
    </menu>
    <main>
        
        
        <section class="cuentas"> 

            <h1>Cuentas</h1>
            <div> 
                <?php

                    if($conexion->connect_errno) {
                        die("La conexión falló" . $conexion->connect_errno);
                    } else {

                        $sql = "SELECT * FROM cuentas WHERE id_usuario = '" . $_SESSION['user_id'] . "'";
                                
                        if(($conexion->query($sql))->num_rows > 0) {
                            $resultado = mysqli_query($conexion, $sql);
                            $filas = mysqli_fetch_array($resultado);

                            for($i = 0; $i < count($filas); $i++) {
                                ?>
                                <article class="cuenta">
                                    <h2><?php echo $filas[2 - $i]?></h2>
                                    <p><?php echo $filas[4 - $i]?></p>
                                    <p><?php echo $filas[5 - $i]?></p>
                                    <!-- <p><?php echo $filas[5 - $i]['saldo']?></p> WTF FUNCIONA ASI! -->
                                </article>  
                             
                            <?php
                            }
                        } else {                 
                            $_SESSION['error'] = "No tienes cuentas";
                            ?>
                            <p class="message"><?php echo $_SESSION['error']?></p>
                            <?php
                        }
                    }
                ?>
            </div>            
        </section>
    </main>
</body>
</html>