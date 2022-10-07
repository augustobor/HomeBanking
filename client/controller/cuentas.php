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
                        <p><?php echo $fila["nombre"]?></p>
                        <p>$<?php echo $fila["saldo"]?></p>
                    </article>  
                <?php
            }
        } else {                 
            $_SESSION['mensaje_cuentas'] = "No tienes cuentas";
            ?>
            <p class="cuenta"><?php echo $_SESSION['mensaje_cuentas']?></p>
            <?php
            unset($_SESSION["mensaje_cuentas"]);
        }
    }
?>