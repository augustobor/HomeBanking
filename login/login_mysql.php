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
                $sql = "SELECT * FROM usuarios WHERE nombre_usuario = '" . $_POST['user'] . "' AND clave = '" . $_POST['password'] . "'";

                if(($conexion->query($sql))->num_rows > 0) {
                    echo "<p class='message'>BIENVENIDO 😀</p>";
                } else {
                    echo "<p class='message'>USUARIO O CONTRASEÑA INCORRECTOS 😯</p>";
                }
            }
        }
        
    }
?>