<?php 
    if(!empty($_POST)) {

        if(isset($_POST['nombre'])) {
            if(strlen($_POST['nombre']) < 6) {
                echo "<p class = 'message'>CARACTERES INSUFICIENTES 😯</p>";
            } else {
                echo "<p class = 'message'>BIENVENIDO 😀</p>";
            }  
        }
    }
?>