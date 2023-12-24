<?php


require "auth.php" ; 

if ($_POST) {
    if (est_connecter()) {
        $_SESSION = null;
        session_destroy();


    }
}

header("Location: ../login.php");



