<?php   

    include("../conexion.php");

    if($conexion->connect_errno) {
        die("La conexión falló" . $conexion->connect_errno);
    } else {

        session_start();
        if(!empty($_POST)) {    
            
            if ((strlen($_POST['user']) > 6) && (strlen($_POST['password']) > 6)) {

                    if(preg_match('/^[A-Za-z0-9]*$/', $_POST['user'])) {
 
                        if($_POST['password'] == $_POST['password2']) {

                        
                            $sql = "SELECT * FROM usuarios where dni = '" . $_POST['dni'] . "'";
                            $resultado = mysqli_query($conexion, $sql);

                            if($resultado->num_rows == 0) {

                                $sql = "INSERT INTO usuarios (nombre, apellido, nombre_usuario, clave, dni, tipo, cambio_clave) VALUES 
                                                            ('" . $_POST['name'] . "', '" . $_POST['surname'] . "','" . $_POST['user'] . 
                                                            "','" . $_POST['password'] . "','" . $_POST['dni'] . "', 'comun','1')";

                                $resultado = mysqli_query($conexion, $sql);
                                if($resultado) {

                                    $_SESSION['sucess'] = "Usuario registrado correctamente";
                                    header("Location: ./admin.php");
                                    die();
                                } else {
                                    $_SESSION['error'] = "Error al registrar el usuario";
                                }

                            } else {
                                $_SESSION['error'] = "Ya existe un usuario con ese DNI";
                            }
                        } else {
                            $_SESSION['error'] = "Las contraseñas no coinciden";
                        }
                    } else {
                        $_SESSION['error'] = "El usuario debe tener solo numeros y/o letras";
                    }
                    
            } else {
                $_SESSION['error'] = "El usuario o contraseña no cuentan con más de 6 caracteres";
            }
        }

        header("Location: ./alta_cliente.php");
        
    }
?>