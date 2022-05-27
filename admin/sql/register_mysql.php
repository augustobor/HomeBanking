<?php

    function validar_pass($pass) {
    
        $isPass = false;
        $isPassAlpha = false;
        $isPassNum = false;
        $isPassSpecial = false;

        for ($i = 0; $i < strlen($pass); $i++) {

            if (!preg_match('/[A-Za-z]/', $pass[$i])) {
                $isPassAlpha = true;
            }
            
            if (!preg_match('/[0-9]/', $pass[$i])) {
                $isPassNum = true;
            }

            if (!preg_match('/["!@#$%&*()_+-=?¿¡]/', $pass[$i])) {
                $isPassSpecial = true;
            }
        }

        if($isPassAlpha && ($isPassNum || $isPassSpecial)) {
            $isPass = true;
        }

        return $isPass;
    }

    include("../../conexion.php");

    if($conexion->connect_errno) {
        die("La conexión falló" . $conexion->connect_errno);
    } else {

        session_start();
        if(!empty($_POST)) {  
              
            if ((strlen($_POST['name']) > 0) && (strlen($_POST['surname']) > 0)) {

                if(preg_match('/^[A-Za-z]+$/', $_POST['name']) && preg_match('/^[A-Za-z]+$/', $_POST['surname'])) {
                    
                    if ((strlen($_POST['user']) >= 6) && (strlen($_POST['password']) >= 6)) {

                        if (validar_pass($_POST['password'])) {

                                    if(preg_match('/^[0-9]*$/', $_POST['dni'])) {

                                        if($_POST['password'] == $_POST['password2']) {

                                        
                                            $sql = "SELECT * FROM usuarios where nombre_usuario = '" . $_POST['user'] . "'";
                                            $resultado = mysqli_query($conexion, $sql);

                                            if($resultado->num_rows == 0) {

                                                $sql = "SELECT * FROM usuarios where dni = '" . $_POST['dni'] . "'";
                                                $resultado = mysqli_query($conexion, $sql);

                                                if($resultado->num_rows == 0) {

                                                    $sql = "INSERT INTO usuarios (nombre, apellido, nombre_usuario, clave, dni, tipo, cambio_clave) VALUES 
                                                                                ('" . $_POST['name'] . "', '" . $_POST['surname'] . "','" . $_POST['user'] . 
                                                                                "','" . $_POST['password'] . "','" . $_POST['dni'] . "', 'comun','1')";

                                                    $resultado = mysqli_query($conexion, $sql);
                                                    if($resultado) {

                                                        $_SESSION['sucess'] = "Usuario registrado correctamente";
                                                        $conexion -> commit();
                                                        header("Location: ../admin.php");
                                                        die();

                                                    } else {
                                                        
                                                        $conexion -> rollback(); 
                                                        $_SESSION['error'] = "Error al registrar el usuario";
                                                    }

                                                } else {
                                                    $_SESSION['error'] = "Ya existe un usuario con ese DNI";
                                                }
                                            } else {
                                                $_SESSION['error'] = "Ya existe un usuario con ese nombre de usuario"; 
                                            }
                                        } else {
                                            $_SESSION['error'] = "Las contraseñas no coinciden";
                                        }
                                    } else {
                                        $_SESSION['error'] = "El dni debe contener solo numeros";
                                    }
                            } else {
                                $_SESSION['error'] = "La contraseña debe contener mayusuculas, minusculas y un digito o caracter especial";
                        }                    
                    } else {
                        $_SESSION['error'] = "El usuario o contraseña no cuentan con más de 6 caracteres";
                    } 
                } else {
                    $_SESSION['error'] = "El nombre y apellido solo deben contener letras";
                }
            } else {
                $_SESSION['error'] = "El nombre y el apellido son obligatorios";
            }
        }

        header("Location: ../alta_cliente.php");
        
    }
?>