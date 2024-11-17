<?php

    $id = $_COOKIE['id'];
    $fName = $_GET['firstName'];
    $sName = $_GET['lastName'];
    $phoneNum = $_GET['phoneNumber'];

    echo $id . " " . $fName . " " . $sName . " " . $phoneNum;

    include "credentials.php";

    $conn = new mysqli($host, $username, $password, $database);

    if($conn -> connect_error){
        die("Connection failed" . $conn -> connect_error);
    }

    $sql = "INSERT INTO contacts (id, firstName, lastName, phoneNumber) VALUES ('$id', '$fName', '$sName', '$phoneNum')";

    if($conn -> query($sql) === TRUE){
        header("Location: phoneBookList.php");
    }
    else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn -> close();
?>