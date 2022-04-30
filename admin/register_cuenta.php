<?php   

    include("../conexion.php");

    if($conexion->connect_errno) {
        die("La conexión falló" . $conexion->connect_errno);
    } else {

        session_start();
        if(!empty($_POST)) {    

                if(preg_match('/^[A-Za-z]{5,}*$/', $_POST['name'])) {

                    if  (preg_match('/^[A-Za-z]{8,}*$/', $_POST['alias'])) {
                        
                        $sql = "SELECT * FROM cuentas where alias = '" . $_POST['alias'] . "'";
                        $resultado = mysqli_query($conexion, $sql);

                        if($resultado->num_rows == 0) {

                            $sql = "SELECT * FROM cuentas where id_usuario = '" . $_POST['id_user'] . "'";
                            $resultado = mysqli_query($conexion, $sql);

                            if($resultado->num_rows != 0) {
                                
                                $sql = "INSERT INTO cuentas (id_usuario, nombre, alias, saldo, fecha_hora) VALUES 
                                                                                ('" . $_POST['id_user'] . "', '" . $_POST['name'] . "','" . $_POST['alias'] . 
                                                                                "','" . $_POST['saldo'] . "','" . $_POST['date'] . "')";

                                $resultado = mysqli_query($conexion, $sql);
                                if($resultado) {

                                    $_SESSION['sucess'] = "Cuenta creada correctamente";
                                            header("Location: ./admin.php");
                                            die();
                                } else {

                                    $_SESSION['error'] = "Error al crear una cuenta";
                                }

                            } else {
                                $_SESSION['error'] = "No existe un usuario con ese ID";
                            }

                        } else {
                            $_SESSION['error'] = "Ya existe una cuenta con ese alias";
                        }
                        
                    } else {
                        $_SESSION['error'] = "El alias debe tener al menos 8 caracteres alfabéticos";
                    }
                } else {
                    $_SESSION['error'] = "El nombre de la cuenta debe tener al menos 5 caracteres alfabéticos";
                }

            header("Location: ./alta_cuenta.php");
        }
    }
?>