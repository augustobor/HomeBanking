<?php   

    require("../login/autentificacion_class.php");

    include("../conexion.php");

    if($conexion->connect_errno) {
        die("La conexión falló" . $conexion->connect_errno);
    } else {

        session_start();
        if(!empty($_POST)) {    
            
            $autentificacion = new autentificacion_class();

            if($autentificacion->validar_cambio_contrasenia()) {

                
                    $sql = "UPDATE usuarios SET clave = '" . $_POST['password'] . "', cambio_clave = 0 WHERE id = '" . $_SESSION['user_id'] . "'";

                    $sql = "UPDATE usuarios SET clave = Roma2018, cambio_clave = 0 WHERE id = 2";
                    $resultado = mysqli_query($conexion, $sql);
                            
                    if($resultado) {

                        $conexion -> commit();
                        $_SESSION['sucess'] = "Contraseña modificada correctamente. Inicie sesión con su nueva contraseña";
                        echo "<script> window.location.href='../index.php'</script>";
                        die();

                    } else {
                        $_SESSION['error'] = "No se ha podido cambiar la contraseña";
                        $conexion -> rollback();
                    }

            }
        
        }

        echo "<script> window.location.href='../index.php'</script>";
    }
?>