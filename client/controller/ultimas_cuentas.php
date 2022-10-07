<?php

    $sql = "SELECT id_cuenta_destino
    FROM transacciones INNER JOIN cuentas ON transacciones.id_cuenta_origen = cuentas.id 
    WHERE id_usuario = '" . $_SESSION['user_id'] . "'";

    $resultado = mysqli_query($conexion, $sql);
    
    if ($resultado->num_rows >   0) {

        $id_cuenta_destino = mysqli_fetch_array($resultado)["id_cuenta_destino"];

        $sql = "SELECT id_cuenta_origen
        FROM transacciones INNER JOIN cuentas ON transacciones.id_cuenta_origen = cuentas.id 
        WHERE id_usuario = '" . $_SESSION['user_id'] . "'";

        $resultado = mysqli_query($conexion, $sql);

        $id_cuenta_origen = mysqli_fetch_array($resultado)["id_cuenta_origen"];

        $sql = "SELECT * FROM transacciones WHERE id_cuenta_origen = $id_cuenta_origen LIMIT 8;";
        $resultado = mysqli_query($conexion, $sql);

        while($fila = mysqli_fetch_array($resultado)) {
                    
            $sql = "SELECT * 
            FROM transacciones INNER JOIN cuentas ON transacciones.id_cuenta_destino = cuentas.id 
            WHERE transacciones.id_cuenta_destino = $fila[id_cuenta_destino]
            group by id_cuenta_destino;";

            $resultado = mysqli_query($conexion, $sql);

            while($fila2 = mysqli_fetch_array($resultado)) {
                ?>
                <article class="cuentas_destino">
                    <p>Alias: <?php echo $fila2["alias"]?></p>
                </article>
                                    
                <?php
            }
        }            
    }   
?>