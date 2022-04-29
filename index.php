 <?php
    session_start();
    $_SESSION['error'] = NULL;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href= "./login/style.css">
    <title>homeBanking | Login</title>
</head>
<body>
    <main>
        <h1>Inicia sesión</h1>

        <form action="./login/login_mysql.php" onsubmit="return validar();" class="login" id="login" method="POST">
            <input class="login_input" id="user" type="text" name="user" placeholder="Usuario">
            <hr/>
            <input class="login_input" id="pass" type="password" name="password" placeholder="Contraseña">
            <hr/>
            <input class="login_submit" type="submit" value="Iniciar sesión"/>
            
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
    <aside id="sidebar">
        <h1>Home Banking</h1>
    </aside>
    <script src="./login/index.js"></script>
</body>
</html>