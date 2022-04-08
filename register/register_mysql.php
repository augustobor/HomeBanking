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

            if (strlen($_POST['user']) < 6 || strlen($_POST['password']) < 6) {

                echo "<p class='message'>El usuario y contraseña deben tener como minimo 6 caracteres</p>";
            } else {
       
                if(preg_match('/^(?=.*[a-zA-Z])(?=.*[0-9])[A-Za-z0-9_ ]*$/', $_POST['user']) && preg_match('/^(?=.*[a-zA-Z])(?=.*[0-9])[A-Za-z0-9_ ]*$/', $_POST['password'])) {


                    if ($_POST['password'] != $_POST['repeat_password']) {
                        echo "<p class='message'>Las contraseñas no coinciden</p>";
                    } else {

                        
                            $query = "SELECT * FROM usuarios WHERE nombre_usuario = '" . $_POST['user'] . "'";
                            $result = mysqli_query($conexion, $query);
                            if (mysqli_num_rows($result) > 0) {
                                    echo "<p class='message'>El nombre no se encuentra disponible</p>";
                            } else {

                                $query = "SELECT * FROM usuarios WHERE dni = '" . $_POST['dni'] . "'";
                                $result = mysqli_query($conexion, $query);

                                if (mysqli_num_rows($result) > 0) {
                                        echo "<p class='message'>El DNI ya se encuentra en la base de datos</p>";
                                } else {
                                    $sql = "INSERT INTO usuarios (nombre, apellido, nombre_usuario, clave, dni) VALUES ('" . $_POST['nombre'] . "', '" . $_POST['apellido'] . "', '" . $_POST['user'] . "', '" . $_POST['password'] . "', '" . $_POST['dni'] . "')";
                                    
                                    if(mysqli_query($conexion, $sql)) {
                                        echo "<script>alert('Bienvenido')</script>";
                                        header("Location: ../index.php");
                                        die(); 
        
                                    } else {
                                        echo '<script>alert("Error al registrar el usuario")</script>';
                                    }
                                    
                                }
                            }
                        }
                     }
                    }
            }
        }
?>