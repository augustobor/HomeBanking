<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href= "./styles/style.css">
    <title>homeBanking | Alta</title>
</head>
<body>
    <main>
        <h1>Crear cuenta</h1>
        <a href="./admin.php">Volver</a>
        <form action="./sql/register_cuenta.php" onsubmit="return validar_cuenta();" class="login" id="login" method="POST">
            <input class="login_input" id="name" type="text" name="name" placeholder="Nombre de la cuenta">
            <hr/>
            <input class="login_input" id="alias" type="text" name="alias" placeholder="Alias">
            <hr/>
            <input class="login_input" id="id_user" type="number" name="id_user" placeholder="id del usuario dueño">
            <hr/>
            <input class="login_submit" type="submit" value="Crear cuenta"/>      
            
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
    <script src="./validaciones.js"></script>
</body>
</html>