<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="home-banking-login">
    <meta name="charset" charset="UTF-8">
    <meta name="UX" http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="./favicon.ico">

    <link rel="stylesheet" type="text/css" href="./login/styles/style.css" media>
    <link rel="stylesheet" type="text/css" href="./login/styles/tablet.css" media="screen and (min-width: 680px)">
    <link rel="stylesheet" type="text/css" href="./login/styles/desktop.css" media="screen and (min-width: 1000px)"> 

    <title>homeBanking | Login</title>
</head>
<body>
    <main>
        <h1>Login session</h1>

        <form action="./login/login_mysql.php" onsubmit="return validate();" class="login" id="login" method="POST">
            <input class="login_input" id="user" type="text" name="user" placeholder="user">
            <input class="login_input" id="pass" type="password" name="password" placeholder="password">
            <input class="login_submit" type="submit" value="Login"/>
            
            <?php
                include('./error.php');
            ?>
            <?php
                include('./sucess.php');
            ?>
            
            <p class='message'>
                user proof: sebaiako2022 <br/>
                Pass: MiContra2022 <br/>
            </p>

        </form>
    </main>
    <aside id="sidebar">
    </aside>
    <script src="./login/index.js"></script>
</body>
</html>
