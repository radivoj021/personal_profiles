<?php
    session_start();

        setcookie('firstname', $_SESSION['firstname'], time() - 3600, "/");
        setcookie('lastname', $_SESSION['lastname'], time() - 3600, "/");
        setcookie('username', $_SESSION['username'], time() - 3600, "/");
        setcookie('password', $_SESSION['password'], time() - 3600, "/");
        setcookie('id', $_SESSION['id'], time() - 3600, "/");

        unset($_COOKIE['firstname']);
        unset($_COOKIE['lastname']);    
        unset($_COOKIE['username']);
        unset($_COOKIE['password']);
        unset($_COOKIE['id']);

        echo $_COOKIE['username'];
    
        session_destroy();

        header("Location: login.html"); 
?>