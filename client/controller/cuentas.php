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

                        <?php
                          
                        $resultado_transferencia = mysqli_query($conexion, "SELECT alias, nombre, saldo , id_usuario, id_cuenta_destino, tipo, transacciones.fecha_hora
                        FROM cuentas INNER JOIN transacciones ON cuentas.id_usuario = transacciones.id_cuenta_origen
                        WHERE id_usuario = '" . $_SESSION['user_id'] . " AND alias = ". $fila['alias'] ."' AND tipo = 'transferencia'");

                        if($resultado_transferencia->num_rows > 0) {

                            echo "<div class='transferencias'>";
                            while($fila_transferencia = mysqli_fetch_array($resultado_transferencia)) {
                                ?>
                                <article class="transferencia">
                                    <p>Alias: <?php echo $fila["alias"]?></p>
                                    <p>Nombre de la cuenta emisora: <?php echo $fila_transferencia["nombre"]?></p>
                                    <p>Monto del emisor: $<?php echo $fila_transferencia["saldo"]?></p>
                           
                                <?php
                                $fila_transferencia = mysqli_fetch_array($resultado_transferencia);
                                ?>
                                    <p>Nombre de la cuenta receptora: <?php echo $fila_transferencia["nombre"]?></p>
                                    <p>Monto del receptor: $<?php echo $fila_transferencia["saldo"]?></p>
                                    <p>Fecha: <?php echo $fila_transferencia["fecha_hora"]?></p>
                                </article>
                                <?php
                            }
                            echo "</div>";
                        } else {
                            
                        }

                    ?>
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