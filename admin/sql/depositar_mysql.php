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

                if($_POST['amount'] > 0) {

                    //Agarro el monto que tenia anteriormente la cuenta
                    $monto_anterior = mysqli_query($conexion, "SELECT saldo 
                    FROM cuentas 
                    where alias = '" . $_POST['destiny'] . "'");

                    $monto_anterior = mysqli_fetch_array($monto_anterior)['saldo'];

                    //Actualiza el valor del saldo de la cuenta de destino
                    $resultado_update_destino = mysqli_query($conexion, "UPDATE cuentas 
                    SET saldo = '" . $_POST['amount'] + $monto_anterior ."' 
                    WHERE alias = '" . $_POST['destiny'] . "'");

                    //Obtenemos la variable id_destino para insertar la transacción.
                    $id_destino = mysqli_fetch_array($resultado_destiny)['id_usuario'];


                    mysqli_query($conexion, "SET foreign_key_checks = 0");

                    //Agregamos la transaccion a la base de datos
                    $resultado_insertar_transaccion = mysqli_query($conexion, "INSERT INTO transacciones (id_cuenta_origen, 
                    id_cuenta_destino, tipo , monto, fecha_hora) 
                    VALUES ('". $id_destino ."', '" . $id_destino . "', 'deposito' , '" 
                    . $_POST['amount'] . "', NOW())");

                    mysqli_query($conexion, "SET foreign_key_checks = 1");
                    

                    if($resultado_update_destino && $resultado_insertar_transaccion) {

                        $_SESSION['sucess'] = "Deposito realizado";
                        $conexion -> commit();
                        header("Location: ../admin.php");
                        die();

                    } else {
                        $conexion -> rollback();
                        $_SESSION['error'] = "Error al transferir";
                    }

                } else {
                    $_SESSION['error'] = "El monto debe ser mayor que 0";
                }

            } else {
                $_SESSION['error'] = "El alias destino no existe";
            }
        }

        header("Location: ../depositar.php");
        
    }
?>