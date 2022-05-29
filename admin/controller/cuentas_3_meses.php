<?php

    include("../conexion.php");

    if($conexion->connect_errno) {
        die("La conexión falló" . $conexion->connect_errno);
    } else {

            //Revisar
            $resultado = mysqli_query($conexion, "SELECT id_cuenta_origen, monto, tipo ,MAX(transacciones.fecha_hora), alias, timestampdiff(month, transacciones.fecha_hora, NOW()) AS diferencia 
            FROM transacciones INNER JOIN cuentas ON transacciones.id_cuenta_origen = cuentas.id_usuario
            WHERE timestampdiff(month, transacciones.fecha_hora, NOW()) >= 0 AND tipo='transferencia' 
            ORDER BY id_cuenta_origen;");

            if($resultado->num_rows != 0) {

                echo "<h1>Cuentas que no tienen movimientos hace más de 3 meses</h1>";
                
                echo "<div>";

                while($fila = mysqli_fetch_array($resultado)) {

                    ?>
                    <article class="cuenta">
                        <p>Alias de la cuenta: <?php echo $fila["alias"]?></p>
                        <p>Monto: $<?php echo $fila["monto"]?></p>
                        <p>Ultimo movimiento el <?php echo $fila["MAX(transacciones.fecha_hora)"]?> (Hace <?php echo $fila['diferencia']?> meses) </p>
                    </article>     
                <?php
                }

                echo "</div>";

            } else {
                echo "<h1>No hay cuentas que no tienen movimientos hace más de 3 meses</h1>";
            }
                    
           
        }
    
?>