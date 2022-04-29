<?php
    session_start();
    $_SESSION['sucess'] = NULL;
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href= "./admin.css">
    <title>homeBanking | Admin</title>
</head>
<body>
    <p class='message'>Vista del admin</p>
    <menu>
        <ul>
            <li><a href="../index.php">Volver</a></li>
            <li><a href="./alta_cliente.php">Dar de alta a cliente</a></li>
        </ul>
    </menu>
    <main>
        <p class='message'><?php echo $_SESSION['sucess'] ?></p>
    </main>

</body>
</html>