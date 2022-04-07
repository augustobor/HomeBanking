<?php   
    $server = "localhost";
    $user = "root";
    $password = "toor";
    $db = "home_banking_data_base";

    $conexion = new mysqli($server, $user, $password, $db);

    if($conexion->connect_errno) {
        die("La conexión falló" . $conexion->connect_errno);
    } else {
        

        if(!empty($_POST)) {

            if (strlen($_POST['user']) > 6 && strlen($_POST['password']) > 6) {
                if(preg_match('/^(?=.*[a-zA-Z])(?=.*[0-9])[A-Za-z0-9_ ]*$/', $_POST['user'])) {
                    if ($_POST['password'] == $_POST['repeat_password']) {

                        $sql = "INSERT INTO usuarios (nombre, apellido, nombre_usuario, clave, dni) VALUES 
                        ('" . $_POST['nombre'] . "', '" . $_POST['apellido'] . "', '" . $_POST['user'] . "', '" 
                        . $_POST['password'] . "', '" . $_POST['dni'] . "')";
        
    
                        $query = "SELECT * FROM usuarios WHERE nombre_usuario = '" . $_POST['user'];
                        
                        if(($conexion->query($query))->num_rows > 0) {
                            echo "<p class='message'>El nombre no se encuentra disponible</p>";
                        } else {
                            header("Location: ../index.php");
                            die();
                            if (($result = mysqli_query($conexion, $sql)) === false) {
                                die(mysqli_error($conn));
                            } else {
                                header("Location: ../index.php");
                                die();
                                mysqli_query($conexion, $sql);
                            }
                            
                        }
                    }
                }
            }
        }
        
    }
?>