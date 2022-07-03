<?php   

    require("./autentificacion_class.php");

    require("../conexion.php");

    if($conexion->connect_errno) {
        die("La conexión falló" . $conexion->connect_errno);
    } else {

        session_start();
        if(!empty($_POST)) {    

        
            $autentificacion = new autentificacion_class();

            if($autentificacion->validar_login()) { 

                if($_SESSION['cambio_clave'] == 1) {

                    header("Location: ../cambio_clave/cambio_clave.php");
                    die();

                } else {

                    if($_SESSION['tipo'] == 'empleado') {

                        $_SESSION['esAdmin'] = 1;
                        header("Location: ../admin/admin.php");
                        die();

                    } else {

                        $_SESSION['esAdmin'] = 0;
                        header("Location: ../client/main.php");
                        die();
                    }
                }

            }
        } 
        
        header("Location: ../index.php");
        
    }
?>