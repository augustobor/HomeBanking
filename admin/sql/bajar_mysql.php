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
            

                $sql = "SELECT id FROM cuentas WHERE alias = '" . $_POST['destiny'] . "'";

                $resultado = mysqli_query($conexion, $sql);
                $resultado_id = mysqli_fetch_array($resultado)[0];

                $sql = "SELECT * 
                FROM transacciones 
                WHERE id_cuenta_destino = $resultado_id OR id_cuenta_origen = $resultado_id";

                $resultado = mysqli_query($conexion, $sql);

                //Valido si la cuenta hallada no tiene transacciones
                if($resultado->num_rows == 0) {


                    $sql = "SELECT fecha_hora 
                        FROM cuentas
                        WHERE timestampdiff(month, fecha_hora, NOW()) >= 3 
                        AND alias = '" . $_POST['destiny'] . "';";

                    $resultado = mysqli_query($conexion, $sql);

                    //Valido si el cliente tiene más de 3 meses de antiguedad
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
                        $_SESSION['error'] = "La cuenta tiene menos de 3 meses de antiguedad";
                            
                    }   
                } else {
                    $_SESSION['error'] = "La cuenta a eliminar cuenta con transferencias o depositos hechos";
                }
            
            } else {
                $_SESSION['error'] = "El alias a eliminar no existe";
            }

            
        }

        header("Location: ../bajar_cuenta.php");
        
    }
?>