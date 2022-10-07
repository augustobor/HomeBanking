<?php
    if(isset($_SESSION['esAdmin'])) {
        if($_SESSION['esAdmin'] == 1) {
            echo "<script> window.location.href='../index.php'</script>";
        }
    } else {
        echo "<script> window.location.href='../index.php'</script>";
    }
?>