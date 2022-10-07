<?php   
    session_start();
    include("../../conexion.php");

    if($conexion->connect_errno) {
        die("La conexión falló" . $conexion->connect_errno);
    } else {

        
        if(!empty($_POST)) {    

            //Validar que ambos alias sean distintos.
            if($_POST['origin'] != $_POST['destiny']) {

        
                $resultado = mysqli_query(
                    $conexion, 
                    "SELECT * 
                    FROM cuentas 
                    where alias = '" . $_POST['origin'] 
                    . "' and id_usuario = '" . $_SESSION['user_id'] . "'");

                if($resultado->num_rows != 0) {

                    $resultado = mysqli_query($conexion, "SELECT * 
                            FROM cuentas 
                            where alias = '" . $_POST['destiny'] . "'");

                    if($resultado->num_rows != 0) {
                            
                        if($_POST['cash'] > 0) {

                            $resultado = mysqli_query($conexion, "SELECT saldo 
                            FROM cuentas 
                            where alias = '" . $_POST['origin'] . "'");

                            $resultado = mysqli_fetch_array($resultado)['saldo'];


                            if($_POST['cash'] <= $resultado) {


                                    //Actualiza el valor del saldo de la cuenta de destino
                                    $resultado_update_destino = mysqli_query($conexion, "UPDATE cuentas 
                                    SET saldo = '" . $_POST['cash'] . "' 
                                    WHERE alias = '" . $_POST['destiny'] . "'");



                                    //Actualizamos el valor de la cuenta origen obteniendo el saldo actual y restandolo.
                                    $resultado = mysqli_query($conexion, 
                                    "SELECT saldo 
                                    FROM cuentas 
                                    where alias = '" . $_POST['origin'] . "'");
                                    $total = mysqli_fetch_array($resultado)['saldo'];


                                    $resultado_update_origin = mysqli_query($conexion, "UPDATE cuentas 
                                    SET saldo = '" . $total - $_POST['cash'] . "' 
                                    WHERE alias = '" . $_POST['origin'] . "'");



                                    //Obtenemos las variables para insertar la transacción cuenta origen y destino
                        
                                    $resultado = mysqli_query($conexion, "SELECT * 
                                    FROM cuentas 
                                    where alias = '" . $_POST['origin'] . "'");

                                    $id_origen = mysqli_fetch_array($resultado)['id'];


                                    $resultado = mysqli_query($conexion, "SELECT * 
                                    FROM cuentas where alias = '" . $_POST['destiny'] . "'");

                                    $id_destino = mysqli_fetch_array($resultado)['id'];

                                    //Fin de obtener las variables de insert
                                
                                    mysqli_query($conexion, "SET foreign_key_checks = 0");

                                    $resultado_insertar_transferencia = mysqli_query($conexion, "INSERT INTO transacciones (id_cuenta_origen, id_cuenta_destino, tipo , monto, fecha_hora) 
                                    VALUES ('" . $id_origen . "', '" . $id_destino . "', 'transferencia' , '" . $_POST['cash'] . "', NOW())");
                                    
                                    mysqli_query($conexion, "SET foreign_key_checks = 1");

                                    //Actualizar la fecha de la cuenta
                                    $resultado_update_ultima_fecha =  mysqli_query($conexion, "UPDATE cuentas 
                                    SET fecha_hora = NOW() 
                                    WHERE alias = '" . $_POST['origin'] . "'");

                                    if($resultado_update_origin && 
                                        $resultado_update_destino && 
                                        $resultado_insertar_transferencia && 
                                        $resultado_update_ultima_fecha) {

                                        $_SESSION['sucess'] = "Transferencia realizada";
                                        $conexion -> commit();
                                        echo "<script> window.location.href='../main.php'</script>";
                                        die();
                                    } else {
                                        $conexion -> rollback();
                                        $_SESSION['error'] = "Error al transferir";
                                    }
                            } else {
                                $_SESSION['error'] = "el monto de la transferencia es mayor al saldo actual";
                            }
                        } else {
                            $_SESSION['error'] = "El monto debe ser mayor a 0";
                        }
                    } else {
                        $_SESSION['error'] = "No existe el alias de la cuenta destino";
                        }

                } else {
                    $_SESSION['error'] = "Usted no es dueño de la cuenta origen";
                } 
             } else {

                    $_SESSION['error'] = "No se pueden realizar transferencias a si mismos";
            }

            echo "<script> window.location.href='../transferencia.php'</script>";
        }
    }
?>