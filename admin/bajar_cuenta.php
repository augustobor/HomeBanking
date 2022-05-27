<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href= "./styles/bajar.css">
    <title>homeBanking | Bajar cuenta</title>
</head>
<body>
    <main>
        
        <form action="./sql/bajar_mysql.php" onsubmit="" class="login" id="login" method="POST">
            <input id="destiny" type="text" name="destiny" placeholder="Alias de cuenta a eliminar">

            <input class="login_submit" type="submit" value="Eliminar"/>      
            
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

        <a href="./admin.php">Volver</a>

    </main>
</body>
</html>