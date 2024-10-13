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


    //ako su input polja za login prazna, vraca nazad na login stranicu
    if (empty($username) || empty($pwd)) {
        header("Location: logIn.html");
        exit();
    }

    $sql = "SELECT id FROM users WHERE username = ? AND pwd = ?";

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
        header("Location: profil.php?id=" . $id);
        exit();
    }
?>