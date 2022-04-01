<?php   
    $server = "localhost";
    $user = "root";
    $password = "toor";
    $db = "home_banking_data_base";

    $conexion = new mysqli($server, $user, $password, $db);

    if($conexion->connect_errno) {
        die("La conexión falló" . $conexion->connect_errno);
    } else {

        // echo "Conexión exitosa";
        // $sql = 'SELECT * FROM usuarios';
        // foreach ($conexion->query($sql) as $row) {
        //     print $row['nombre'] . "\t";
        //     print $row['apellido'] . "\t";
        // }
        
    }
?>