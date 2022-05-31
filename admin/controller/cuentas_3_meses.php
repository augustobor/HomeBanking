<?php

    include("../conexion.php");

    if($conexion->connect_errno) {
        die("La conexión falló" . $conexion->connect_errno);
    } else {

            //Revisar
                $resultado = mysqli_query($conexion, "SELECT id_cuenta_origen, monto, tipo, cuentas.fecha_hora, alias, timestampdiff(month, cuentas.fecha_hora, NOW()) AS diferencia 
                FROM transacciones INNER JOIN cuentas ON transacciones.id_cuenta_origen = cuentas.id_usuario
                WHERE timestampdiff(month, cuentas.fecha_hora, NOW()) >= 3 
                AND tipo='transferencia'
                GROUP BY id_cuenta_origen;");

            if($resultado->num_rows > 0) {

                echo "<h1>Cuentas que no tienen movimientos hace más de 3 meses</h1>";
                
                echo "<div>";

                while($fila = mysqli_fetch_array($resultado)) {

                    ?>
                    <article class="cuenta">
                        <p>Alias de la cuenta: <?php echo $fila["alias"]?></p>
                        <p>Monto: $<?php echo $fila["monto"]?></p>
                        <p>Ultimo movimiento el <?php echo $fila['fecha_hora'] ?> (hace <?php echo $fila['diferencia']?> meses)</p>
                    </article>     
                <?php
                }

                echo "</div>";

            } else {
                echo "<h1>No hay cuentas que no tienen movimientos hace más de 3 meses</h1>";
            }
                    
           
        }
    
?>