<?php

/* $cookieName = "username";
$cookieUsername = $username;
$cookie_duration = time() + (86400 * 7); // Cookie traje 7 dana

if (isset($username)) {
    // Postavljanje cookie-ja sa imenom i rokom trajanja od 7 dana
    setcookie($cookieName, $cookieUsername, $cookie_duration, "/"); 
}

$cookieName = "pwd";
$cookiePwd = $pwd;
$cookie_duration = time() + (86400 * 7); // Cookie traje 7 dana



if (isset($pwd)) {
    // Postavljanje cookie-ja sa imenom i rokom trajanja od 7 dana
    setcookie($cookieName, $cookiePwd, $cookie_duration, "/"); 
}

echo $cookieUsername;
echo $cookiePwd */



session_start();

if(($_COOKIE['username'] == $_SESSION['username'] && $_COOKIE['password'] == $_SESSION['password'])){
    header("Location: homepage.php?id=" . $_COOKIE['id']);
}
?>
