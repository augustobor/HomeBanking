<?php
    session_start();
    $conexion = mysqli_connect($_ENV['MYSQLHOST'], $_ENV['MYSQLUSER'], $_ENV['MYSQLPASSWORD'], $_ENV['MYSQLDATABASE'], $_ENV['MYSQLPORT']);
?>

