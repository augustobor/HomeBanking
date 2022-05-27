<?php   

    include("../conexion.php");

    if($conexion->connect_errno) {
        die("La conexión falló" . $conexion->connect_errno);
    } else {

        session_start();
        if(!empty($_POST)) {    

                        
            $sql = "SELECT * FROM cuentas where alias = '" . $_POST['origin'] . "' and id_usuario = '" . $_SESSION['user_id'] . "'";
            $resultado = mysqli_query($conexion, $sql);

            if($resultado->num_rows != 0) {

                $sql = "SELECT * FROM cuentas where alias = '" . $_POST['destiny'] . "'";

                $resultado = mysqli_query($conexion, $sql);

                if($resultado->num_rows != 0) {
                         
                    if($_POST['cash'] > 0) {

                        $sql = "SELECT saldo FROM cuentas where alias = '" . $_POST['origin'] . "'";
                        $resultado = mysqli_query($conexion, $sql);

                        
                        if($_POST['cash'] <= $resultado) {


                                //Actualiza el valor del saldo de la cuenta de destino
                                $sql = "UPDATE cuentas SET saldo = '" . $_POST['cash'] . "' WHERE alias = '" . $_POST['destiny'] . "'";
                                $resultado1 = mysqli_query($conexion, $sql);



                                //Actualizamos el valor de la cuenta origen obteniendo el saldo actual y restandolo.
                                $sql = "SELECT saldo FROM cuentas where alias = '" . $_POST['origin'] . "'";
                                $resultado = mysqli_query($conexion, $sql);
                                $total = mysqli_fetch_array($resultado)['saldo'];


                                $sql = "UPDATE cuentas SET saldo = '" . $total - $_POST['cash'] . "' WHERE alias = '" . $_POST['origin'] . "'";
                                $resultado2 = mysqli_query($conexion, $sql);

                                //Obtenemos las variables para insertar la transacción cuenta origen y destino

                                $sql = "SELECT * FROM cuentas where alias = '" . $_POST['origin'] . "'";
                                $resultado = mysqli_query($conexion, $sql);

                                $id_origen = mysqli_fetch_array($resultado)['id_usuario'];


                                $sql = "SELECT * FROM cuentas where alias = '" . $_POST['destiny'] . "'";
                                $resultado = mysqli_query($conexion, $sql);

                                $id_destino = mysqli_fetch_array($resultado)['id_usuario'];

                                //Fin de obtener las variables de insert
                                
                                $sql = "INSERT INTO transacciones (id_cuenta_origen, id_cuenta_destino, tipo , monto, fecha_hora) VALUES ('" . $id_origen . "', '" . $id_destino . "', 'transferencia' , '" . $_POST['cash'] . "', NOW())";
                                $resultado3 = mysqli_query($conexion, $sql);
                                
                                if($resultado1 && $resultado2 && $resultado3) {

                                    $_SESSION['sucess'] = "Transferencia realizada";
                                    $conexion -> commit();
                                    header("Location: ./main.php");
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

            header("Location: ./transferencia.php");
        }
    }
?>