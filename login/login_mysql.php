<?php   
    $server = "localhost";
    $user = "root";
    $password = "toor";
    $db = "home_banking_data_base";

    $conexion = new mysqli($server, $user, $password, $db);


    if($conexion->connect_errno) {
        die("La conexión falló" . $conexion->connect_errno);
    } else {
        session_start();
        $_SESSION['user'] = "-1";
        if(!empty($_POST)) {    
            
            if ((strlen($_POST['user']) > 6) && (strlen($_POST['password']) > 6)) {
                    if(preg_match('/^(?=.*[a-zA-Z])(?=.*[0-9])[A-Za-z0-9]*$/', $_POST['user'])) {
                        $sql = "SELECT * FROM usuarios WHERE nombre_usuario = '" . $_POST['user'] . "' AND clave = '" . $_POST['password'] . "'";
                        if(($conexion->query($sql))->num_rows > 0) {
                            $_SESSION['user'] = "1";
                        } else {
                            $_SESSION['user'] = "0";
                        }
                    } else {
                        $_SESSION['user'] = "3";
                    }
            } else {
                $_SESSION['user'] = "2";
            }
        }
        
        header("Location: ../index.php");
        
    }
?>