<?php   
    session_start();
    error_reporting(0);
    require("./autentificacion_class.php");
    require("../conexion.php");
    
    if($conexion->connect_errno) {
        die("Conection failed" . $conexion->connect_errno);
    } else {

        if(!empty($_POST)) {    

        
            $autentificacion = new autentificacion_class();

            if($autentificacion->validar_login()) { 

                if($_SESSION['cambio_clave'] == 1) {

                    echo "<script> window.location.href='../cambio_clave/cambio_clave.php'</script>";
                    die();

                } else {

                    if($_SESSION['tipo'] == 'empleado') {

                        $_SESSION['esAdmin'] = 1;
                        echo "<script> window.location.href='../admin/admin.php'</script>";
                        die();

                    } else {

                        $_SESSION['esAdmin'] = 0;
                        echo "<script> window.location.href='../client/main.php'</script>";
                        die();
                    }
                }

            }
        } 
        
        echo "<script> window.location.href='../index.php'</script>";
    }
?>