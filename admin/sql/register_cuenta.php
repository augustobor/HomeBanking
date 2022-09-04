<?php   

    include("../../conexion.php");

    if($conexion->connect_errno) {
        die("La conexión falló" . $conexion->connect_errno);
    } else {

        session_start();
        if(!empty($_POST)) {    

                if(strlen($_POST['name']) >= 5) {

                    if  (strlen($_POST['alias']) >= 8) {

                        if (preg_match('/^[A-Za-z]+$/', $_POST['name']) && preg_match('/^[A-Za-z]+$/', $_POST['alias'])) {
                        

                                $resultado = mysqli_query($conexion, "SELECT * 
                                FROM cuentas where alias = '" . $_POST['alias'] . "'");

                                if($resultado->num_rows == 0) {

                                    $resultado = mysqli_query($conexion, "SELECT * 
                                    FROM usuarios 
                                    where id = '" . $_POST['id_user'] . "'");

                                    if($resultado->num_rows != 0) {
                                        

                                        $resultado = mysqli_query($conexion, "INSERT INTO cuentas (id_usuario, nombre, alias, saldo, fecha_hora) VALUES 
                                        ('" . $_POST['id_user'] . "', '" . $_POST['name'] . "','" . $_POST['alias'] . 
                                        "', '0', NOW())");


                                        if($resultado) {

                                            $_SESSION['sucess'] = "Cuenta creada correctamente";
                                            header("Location: ../admin.php");
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
                             $_SESSION['error'] = "El nombre y alias deben ser alfabeticos";
                        }
                        
                    } else {
                        $_SESSION['error'] = "El alias debe tener al menos 8 caracteres alfabéticos";
                    }
                } else {
                    $_SESSION['error'] = "El nombre de la cuenta debe tener al menos 5 caracteres alfabéticos";
                }

            header("Location: ../alta_cuenta.php");
        }
    }
?>