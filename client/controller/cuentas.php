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
                        <p>Saldo: $<?php echo $fila["saldo"]?></p>

                        <?php
                          
                        $resultado_transferencia = mysqli_query($conexion, "SELECT tipo, monto, transacciones.fecha_hora as fecha_hora, alias, saldo, id_cuenta_origen, id_cuenta_destino 
                        FROM transacciones INNER JOIN cuentas ON cuentas.id = transacciones.id_cuenta_origen 
                        WHERE (id_cuenta_origen='" . $fila['id'] . "' OR id_cuenta_destino='" . $fila['id'] . "') AND tipo='transferencia'
                        ORDER BY transacciones.fecha_hora DESC");

                        if($resultado_transferencia->num_rows > 0) {


                            echo "<div class='transferencias'>";
                            $numero = 1;
                            while($fila_transferencia = mysqli_fetch_array($resultado_transferencia)) {
                                
                                $resultado_destino = mysqli_query($conexion, "SELECT alias FROM cuentas WHERE id = '" . $fila_transferencia['id_cuenta_destino'] . "'");

                                $alias_destino = mysqli_fetch_array($resultado_destino);

                                ?>
                                <article class="transferencia">
                                    <p><?php echo $numero ?></p>
                                    <p>Alias de la cuenta emisora: <?php echo $fila_transferencia["alias"]?></p>
                                    <p>Monto: $<?php echo $fila_transferencia["monto"]?></p>
                                    <p>Alias de la cuenta receptora: <?php echo $alias_destino["alias"]?></p>
                                </article>
                                <?php
                                $numero++;
                            }
                            echo "</div>";
                        } else {
                            
                        }

                    ?>
                    </article>  


                <?php
            }
        } else {                 
            $_SESSION['mensaje'] = "No tienes cuentas";
            ?>
            <p class="cuenta"><?php echo $_SESSION['mensaje']?></p>
            <?php
        }
    }
?>