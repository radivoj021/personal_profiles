<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include 'credentials.php';

    $conn = new mysqli($host, $username, $password, $database);

    if($conn->connect_error){
        die("greska pri ucitavanju konekcije" . $conn->connect_error);
    }

    $username = $_GET['username'];
    $pwd = $_GET['password'];
    $rememberMe = $_GET['rememberCheck'];


    
    //works

    

    //ako su input polja za login prazna, vraca nazad na login stranicu
    if (empty($username) || empty($pwd)) {
        header("Location: logIn.html");
        exit();
    }

    $sql = "SELECT id, firstname, lastname FROM users WHERE username = ? AND pwd = ?";

    $stmt = $conn->prepare($sql);

    if($stmt === false){
        die("Greska u pripremi upita" .$conn->error);
    }

    $stmt->bind_param("ss", $username, $pwd);

    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $id = $row['id'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];

        

            session_start();
        
            $_SESSION['firstname'] = $firstname;
            $_SESSION['lastname'] = $lastname;
            $_SESSION['username'] = $username; 
            $_SESSION['password'] = $pwd;
            $_SESSION['id'] = $id;

            $_SESSION['rememberCheck'] = $rememberMe;
            //works
            
            setcookie('firstname', $_SESSION['firstname'], time() + (30 * 24 * 60 * 60), "/");
            setcookie('lastname', $_SESSION['lastname'], time() + (30 * 24 * 60 * 60), "/");
            setcookie('username', $_SESSION['username'], time() + (30 * 24 * 60 * 60), "/");
            setcookie('password', $_SESSION['password'], time() + (30 * 24 * 60 * 60), "/");
            setcookie('id', $_SESSION['id'], time() + (30 * 24 * 60 * 60), "/");

            header("Location: homepage.php?id=" . $id);
            exit();
        }      
?>