<?php

    include("../../conexion.php");

    if($conexion->connect_errno) {
        die("La conexión falló" . $conexion->connect_errno);
    } else {

        session_start();
        if(!empty($_POST)) {  
            

            //Verificar baja de cuentas 3 meses del lado del servidor 
            
            $resultado_destiny = mysqli_query($conexion, "SELECT * 
            FROM cuentas 
            where alias = '" . $_POST['destiny'] . "'");

            if($resultado_destiny->num_rows != 0) {

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
                    }
                    
            } else {
                $_SESSION['error'] = "El alias a eliminar no existe";
            }
        }

        header("Location: ../bajar_cuenta.php");
        
    }
?>