<?php


class autentificacion_class {

    
    public function validar_login() {

        require("../conexion.php");

        if ((strlen($_POST['user']) >= 6) && (strlen($_POST['password']) >= 6)) {

            if(preg_match('/^[A-Za-z0-9]*$/', $_POST['user'])) {

                $sql = "SELECT * FROM usuarios WHERE nombre_usuario = '" . $_POST['user'] . "' AND clave = '" . $_POST['password'] . "'";

                $resultado = mysqli_query($conexion, $sql);
                
                if($resultado->num_rows > 0) {

                    
                    $filas = mysqli_fetch_array($resultado);
                    
                    $_SESSION['user'] = $filas['nombre'];
                    $_SESSION['user_id'] = $filas['id'];
                    $_SESSION['cambio_clave'] = $filas['cambio_clave'];
                    $_SESSION['tipo'] = $filas['tipo'];

                    return true;

                } else {
                    $_SESSION['error'] = "Usuario o contraseña incorrectos";
                }

            } else {
                $_SESSION['error'] = "El usuario debe tener solo numeros y/o letras";
            }
            
        } else {
            $_SESSION['error'] = "El usuario o contraseña no cuentan con más de 6 caracteres";
        }

        return false;
        
    }


    public function validar_cambio_contrasenia() {

        require("../conexion.php");

        if ((strlen($_POST['password']) >= 6) && (strlen($_POST['password2']) >= 6)) {

            if ($_POST['password'] == $_POST['password2']) {

                return true;
                
            } else {
                $_SESSION['error'] = "Las contraseñas no coinciden";
            }

        } else {
            $_SESSION['error'] = "La contraseña no cuentan con más de 6 caracteres";
        
        }

        return false;

    }
}


?>