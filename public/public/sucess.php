<?php
    if(isset($_SESSION['sucess'])) { ?>
    <p class='message'>
    <?php 
        echo $_SESSION['sucess'];
        unset($_SESSION['sucess']);
    ?>
    </p>
    <?php 
    }
?>