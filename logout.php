<?php
    session_start();

        setcookie('firstname', '', time() - 3600, "/");
        setcookie('lastname', '', time() - 3600, "/");
        setcookie('username', '', time() - 3600, "/");
        setcookie('password', '', time() - 3600, "/");
        setcookie('id', '', time() - 3600, "/");

        unset($_COOKIE['firstname']);
        unset($_COOKIE['lastname']);    
        unset($_COOKIE['username']);
        unset($_COOKIE['password']);
        unset($_COOKIE['id']);
        
        $_SESSION = [];
        session_destroy();

        header("Location: logIn.html"); 
?>