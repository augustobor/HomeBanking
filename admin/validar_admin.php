<?php
    if(isset($_SESSION['esAdmin'])) {
        if($_SESSION['esAdmin'] == 0) {
            header("Location: ../index.php");
        }
    } else {
        header("Location: ../index.php");
    }
?>