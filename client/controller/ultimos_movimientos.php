<?php
    $sql = "SELECT * FROM cuentas WHERE id_usuario = '" . $_SESSION['user_id'] . "'";
    

    if(($conexion->query($sql))->num_rows > 0) {
        

        $id = mysqli_fetch_array(mysqli_query($conexion, $sql));

        $numero = 1;

        $sql = "SELECT * FROM transacciones WHERE (id_cuenta_origen='" . $id['id'] . "' OR id_cuenta_destino='" . $id['id'] . "') ORDER BY fecha_hora DESC LIMIT 5";

        $resultado = mysqli_query($conexion, $sql);

        while($fila = mysqli_fetch_array($resultado)) {

            $resultado_origen = mysqli_query($conexion, "SELECT alias FROM cuentas WHERE id = '" . $fila["id_cuenta_origen"] . "'");
            $alias_origen = mysqli_fetch_array($resultado_origen);

            $resultado_destino=mysqli_query($conexion, "SELECT alias FROM cuentas WHERE id = '" . $fila["id_cuenta_destino"] . "'");
            $alias_destino = mysqli_fetch_array($resultado_destino);
        ?>
            <article class="transaccion">
                <h3><?php echo $numero?></h3>
                <p>Fecha y hora de la transacción: <?php echo $fila["fecha_hora"]?></p>
                <p>Monto: $<?php echo $fila["monto"]?></p>
                <p>alias de la cuenta emisora: <?php echo $alias_origen["alias"]?></p>
                <p>alias de la cuenta receptora: <?php echo $alias_destino["alias"]?></p>
            </article>  
        <?php
        $numero++;
        }
    } else {                 
            $_SESSION['mensaje'] = "No tienes transacciones";
            ?>
            <p class="cuenta"><?php echo $_SESSION['mensaje']?></p>
            <?php
    }

?>