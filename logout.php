<?php
    session_start();

        setcookie('username', $_SESSION['username'], time() - 3600, "/");
        setcookie('password', $_SESSION['password'], time() - 3600, "/");
        setcookie('id', $_SESSION['id'], time() - 3600, "/");

        unset($_COOKIE['username']);
        unset($_COOKIE['password']);
        unset($_COOKIE['id']);

        echo $_COOKIE['username'];

        header("Location: logIn.html"); 
?>