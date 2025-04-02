<?php
session_start();
if(($_COOKIE['username'] == $_SESSION['username'] && $_COOKIE['password'] == $_SESSION['password'])){
header("Location:homepage.php?id=".$_COOKIE['id']);
}
?>