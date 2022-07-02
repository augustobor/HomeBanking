<?php   

    include("../conexion.php");

    if($conexion->connect_errno) {
        die("La conexión falló" . $conexion->connect_errno);
    } else {

        session_start();
        if(!empty($_POST)) {    
            
            if (strlen($_POST['password']) > 6) {

                if ($_POST['password'] == $_POST['password2']) {

                
                    $sql = "UPDATE usuarios SET clave = '" . $_POST['password'] . "', cambio_clave = 0 WHERE id = " . $_SESSION['user_id'];

                    $resultado = mysqli_query($conexion, $sql);
                            
                    if($resultado) {

                        $conexion -> commit();
                        header("Location: ../index.php");
                        die();

                    } else {
                        $_SESSION['error'] = "No se ha podido cambiar la contraseña";
                        $conexion -> rollback();
                    }

                } else {
                    $_SESSION['error'] = "Las contraseñas no coinciden";
                }

            } else {
                $_SESSION['error'] = "La contraseña no cuentan con más de 6 caracteres";
            }

        }
        
        header("Location: ../index.php");
        
    }
?>