<?php
    $sql = "SELECT * FROM transacciones WHERE id_cuenta_origen = '" . $_SESSION['user_id'] . "' ORDER BY fecha_hora DESC LIMIT 5";
                
    if(($conexion->query($sql))->num_rows > 0) {
        $resultado = mysqli_query($conexion, $sql);

        $numero = 1;

        while($fila = mysqli_fetch_array($resultado)) {
        ?>
            <article class="transaccion">
                <h3><?php echo $numero?></h3>
                <p>Fecha y hora de la transacción: <?php echo $fila["fecha_hora"]?></p>
                <p>Monto: $<?php echo $fila["monto"]?></p>
                <p>id de la cuenta emisora: <?php echo $fila["id_cuenta_origen"]?></p>
                <p>id de la cuenta receptora: <?php echo $fila["id_cuenta_destino"]?></p>
            </article>  
        <?php
        $numero++;
        }
    }

?>