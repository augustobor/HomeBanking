<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href= "./style.css">
    <title>homeBanking | Alta</title>
</head>
<body>
    <main>
        <h1>Registrar usuario</h1>

        <form action="./register_mysql.php" class="login" id="login" method="POST">
            <input class="login_input" id="name" type="text" name="name" placeholder="Nombre">
            <hr/>
            <input class="login_input" id="surname" type="text" name="surname" placeholder="Apellido">
            <hr/>
            <input class="login_input" id="user" type="text" name="user" placeholder="Usuario">
            <hr/>
            <input class="login_input" id="dni" type="number" name="dni" placeholder="DNI">
            <hr/>
            <input class="login_input" id="pass" type="password" name="password" placeholder="Contraseña">
            <hr/>
            <input class="login_input" id="pass2" type="password" name="password2" placeholder="Repetir Contraseña">
            <hr/>
            <input class="login_submit" type="submit" onclick="validar()" value="Iniciar sesión"/>      
            
            <?php
            
                if(isset($_SESSION['error'])) { ?>
                    <p class='message'>
                    <?php 
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                     </p>
               <?php 
                }
            ?>
        </form>

    </main>
    <script src="./register.js"></script>
</body>
</html>