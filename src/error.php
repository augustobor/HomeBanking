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