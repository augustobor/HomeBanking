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
                        <h3>Alias: <?php echo $fila["alias"]?></h3>
                        <p>Nombre de la cuenta: <?php echo $fila["nombre"]?></p>
                        <p>Monto: $<?php echo $fila["saldo"]?></p>
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