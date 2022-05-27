<?php   

    include("../../conexion.php");

    if($conexion->connect_errno) {
        die("La conexión falló" . $conexion->connect_errno);
    } else {

        session_start();
        if(!empty($_POST)) {    

                        
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

                                $id_origen = mysqli_fetch_array($resultado)['id_usuario'];


                                $resultado = mysqli_query($conexion, "SELECT * 
                                FROM cuentas where alias = '" . $_POST['destiny'] . "'");

                                $id_destino = mysqli_fetch_array($resultado)['id_usuario'];

                                //Fin de obtener las variables de insert
                            

                                $resultado_insertar_transferencia = mysqli_query($conexion, "INSERT INTO transacciones (id_cuenta_origen, id_cuenta_destino, tipo , monto, fecha_hora) 
                                VALUES ('" . $id_origen . "', '" . $id_destino . "', 'transferencia' , '" . $_POST['cash'] . "', NOW())");
                                
                                if($resultado_update_origin && 
                                    $resultado_update_destino && 
                                    $resultado_insertar_transferencia) {

                                    $_SESSION['sucess'] = "Transferencia realizada";
                                    $conexion -> commit();
                                    header("Location: ../main.php");
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
                    $_SESSION['error'] = "No existe la cuenta destino";
                    }

            } else {
                 $_SESSION['error'] = "Usted no es dueño de la cuenta origen";
            }

            header("Location: ../transferencia.php");
        }
    }
?>