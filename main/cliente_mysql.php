<?php
    include("../conexion.php");

    if($conexion->connect_errno) {
        die("La conexión falló" . $conexion->connect_errno);
    } else {
        $sql = "SELECT * FROM cuentas WHERE id_usuario = '" . $_POST['user'] . "'";
                        
        if(($conexion->query($sql))->num_rows > 0) {
            /*HACER EL FOR*/ 
        } else {
            $_SESSION['user'] = "1";
        }
    }   
?>