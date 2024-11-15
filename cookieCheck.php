<?php

    if(isset($_COOKIE['username'])){
        echo "Cookie setovan";
    }
    else{
        header("Location: logIn.php");
    }

?>