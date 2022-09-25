<?php

    $sql = "SELECT * FROM cuentas WHERE id_usuario = '" . $_SESSION['user_id'] . "'";           
    $resultado = mysqli_query($conexion, $sql);
                
    while($fila = mysqli_fetch_array($resultado)) {
        ?>
        <article class="cuenta">
            <p>Alias: <?php echo $fila["alias"]?></p>
            <p>Monto: $<?php echo $fila["saldo"]?></p>
        </article>
                                
        <?php

    }
?>