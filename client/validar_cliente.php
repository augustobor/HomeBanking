<?php
    if(isset($_SESSION['esAdmin'])) {
        if($_SESSION['esAdmin'] == 1) {
            header("Location: ../index.php");
        }
    } else {
        header("Location: ../index.php");
    }
?>