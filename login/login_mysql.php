<?php   

    include("../conexion.php");

    if($conexion->connect_errno) {
        die("La conexión falló" . $conexion->connect_errno);
    } else {
        session_start();
        if(!empty($_POST)) {    
            
            if ((strlen($_POST['user']) > 6) && (strlen($_POST['password']) > 6)) {

                    if(preg_match('/^[A-Za-z0-9]*$/', $_POST['user'])) {

                        $sql = "SELECT * FROM usuarios WHERE nombre_usuario = '" . $_POST['user'] . "' AND clave = '" . $_POST['password'] . "'";


                        //investigar mas sobre mysqli_fetch_array.
                        $resultado = mysqli_query($conexion, $sql);
                        
                        //var_dump(mysqli_fetch_array($resultado));

                        //die();
                        if($resultado->num_rows > 0) {

                            //fetch_array: transforma la fila del resultado en un array.
                            $filas = mysqli_fetch_array($resultado);

                            if($filas['tipo'] == 'empleado') {

                                header("Location: ../admin/admin.php");
                                die();

                            } else {
                                $_SESSION['user_id'] = $filas['id'];
                                $_SESSION['user'] = $filas['nombre_usuario'];
                                header("Location: ../main/main.php");
                                die();
                            }

                        } else {
                            $_SESSION['error'] = "Usuario o contraseña incorrectos";
                        }

                    } else {
                        $_SESSION['error'] = "El usuario debe tener solo numeros y/o letras";
                    }
                    
            } else {
                $_SESSION['error'] = "El usuario o contraseña no cuentan con más de 6 caracteres";
            }
        }
        
        header("Location: ../index.php");
        
    }
?>