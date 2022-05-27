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

                    //Actualiza el valor del saldo de la cuenta de destino
                    $resultado_update_destino = mysqli_query($conexion, "UPDATE cuentas 
                    SET saldo = '" . $_POST['amount'] . "' 
                    WHERE alias = '" . $_POST['destiny'] . "'");


                    //Obtenemos la variable id_destino para insertar la transacción.
                    $id_destino = mysqli_fetch_array($resultado_destiny)['id_usuario'];


                    //Agregamos la transaccion a la base de datos
                    $resultado_insertar_transaccion = mysqli_query($conexion, "INSERT INTO transacciones (id_cuenta_origen, 
                    id_cuenta_destino, tipo , monto, fecha_hora) 
                    VALUES ('". $id_destino ."', '" . $id_destino . "', 'deposito' , '" 
                    . $_POST['amount'] . "', NOW())");
                    

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