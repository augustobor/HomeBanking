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

        <form action="./login/login_mysql.php" class="login" id="login" method="POST">
            <input class="login_input" id="user" type="text" name="user" placeholder="Usuario">
            <hr/>
            <input class="login_input" id="pass" type="password" name="password" placeholder="Contraseña">
            <hr/>
            <input class="login_submit" type="submit" onclick="validar()" value="Iniciar sesión"/>
            <?php
                session_start();

                switch ($_SESSION['user']) {
                    case "0":
                        header("Location: ./main/main.php");
                        break;
                    case "1":
                        echo "<p class='message'>Usuario o contraseña incorrectos</p>";
                        break;
                    case "2":
                        echo "<p class='message'>El usuario cuenta o contraseña con menos de 6 caracteres</p>";
                        break;
                    case "3":
                        echo "<p class='message'>El usuario debe tener solo numeros y letras</p>";
                        break;
                    default:
                        $_SESSION['user'] = "-1";
                        break;
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