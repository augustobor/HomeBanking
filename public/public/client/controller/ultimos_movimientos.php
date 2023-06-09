<?php
    $sql = "SELECT * FROM cuentas WHERE id_usuario = '" . $_SESSION['user_id'] . "'";
    
    if($conexion->connect_errno) {
        die("La conexión falló" . $conexion->connect_errno);
    } else {

        if(($conexion->query($sql))->num_rows > 0) {
            

            $id = mysqli_fetch_array(mysqli_query($conexion, $sql));

            $sql = "SELECT * FROM transacciones WHERE (id_cuenta_origen='" . $id['id'] . "' OR id_cuenta_destino='" . $id['id'] . "') ORDER BY fecha_hora DESC LIMIT 5";

            $resultado = mysqli_query($conexion, $sql);

            if($resultado->num_rows > 0) {

                while($fila = mysqli_fetch_array($resultado)) {

                    $resultado_origen = mysqli_query($conexion, "SELECT alias FROM cuentas WHERE id = '" . $fila["id_cuenta_origen"] . "'");
                    $alias_origen = mysqli_fetch_array($resultado_origen);

                    $resultado_destino=mysqli_query($conexion, "SELECT alias FROM cuentas WHERE id = '" . $fila["id_cuenta_destino"] . "'");
                    $alias_destino = mysqli_fetch_array($resultado_destino);
                ?>
                    <article class="transaccion">
                        <h3><?php echo $fila["fecha_hora"]?></h3>
                        <?php
                            if(isset($alias_origen["alias"]) && (isset($alias_destino["alias"])))
                            {
                                ?>
                                <p><?php echo $alias_origen["alias"]?> 
                                sent $<?php echo $fila["monto"]?>
                                to <?php echo $alias_destino["alias"]?></p>
                                <?php
                            } else {
                                ?>
                                <p>Monto: $<?php echo $fila["monto"]?></p>
                                <?php
                            }
                            
                        ?>
                    </article>  
                <?php
                }
            } else {
                $_SESSION['mensaje'] = "You don't have transactions";
                ?>
                <p class="cuenta"><?php echo $_SESSION['mensaje']?></p>
                <?php
            }
        } else {                 
            $_SESSION['mensaje'] = "You don't have transactions";
            ?>
            <p class="cuenta"><?php echo $_SESSION['mensaje']?></p>
            <?php
        }
    }
?>
