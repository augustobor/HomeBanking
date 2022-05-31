<?php

    include("../../conexion.php");

    if($conexion->connect_errno) {
        die("La conexión falló" . $conexion->connect_errno);
    } else {

        session_start();
        if(!empty($_POST)) {  
            

            $resultado_destiny = mysqli_query($conexion, "SELECT * 
            FROM cuentas 
            where alias = '" . $_POST['destiny'] . "'");

            if($resultado_destiny->num_rows != 0) {
            

                $sql = "SELECT cuentas.fecha_hora 
                        FROM transacciones INNER JOIN cuentas ON transacciones.id_cuenta_origen = cuentas.id_usuario
                        WHERE timestampdiff(month, cuentas.fecha_hora, NOW()) >= 3 
                        AND tipo='transferencia'
                        AND alias = '" . $_POST['destiny'] . "';";

                $resultado = mysqli_query($conexion, $sql);

                if($resultado->num_rows != 0) {

                    mysqli_query($conexion, "SET foreign_key_checks = 0");
    
                    $resultado = mysqli_query($conexion, "DELETE from cuentas 
                    where alias='" . $_POST['destiny'] . "'");
    
                    mysqli_query($conexion, "SET foreign_key_checks = 1");
                    if($resultado) {
    
                    $_SESSION['sucess'] = "Baja realizada";
                    $conexion -> commit();
                    header("Location: ../admin.php");
                    die();
    
                    } else {
                        $conexion -> rollback();
                        $_SESSION['error'] = "Error al dar de baja";
                        header("Location: ../admin.php");
                    }
                            
                } else {
                    $_SESSION['error'] = "La última transferencia de la cuenta con este alias fue hace menos de 3 meses";
                        
                }
            
            } else {
                $_SESSION['error'] = "El alias a eliminar no existe";
            }

            
        }

        header("Location: ../bajar_cuenta.php");
        
    }
?>