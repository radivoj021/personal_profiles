<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "phone_book";

    $conn = new mysqli($host, $username, $password, $database);

    if($conn->connect_error){
        die("greska pri ucitavanju konekcije" . $conn->connect_error);
    }

 

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $pwd = $_POST['password'];

     //ako su input polja za login prazna, vraca nazad na login stranicu
     if (empty($firstname) || empty($lastname) || empty($email)  || empty($username) || empty($pwd)) {
        header("Location: index.html");
        exit();
    }

    $sql = "INSERT INTO users (firstname, lastname, username, pwd) VALUES ('$firstname', '$lastname', '$username', '$pwd')";



    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $firstname, $lastname, $username, $pwd);

    if ($stmt === false) {
        die("Greška u pripremi upita: " . $veza->error);
    }

    if($stmt->execute()){
        $last_id = $conn->insert_id;
        header("Location: logIn.html");
        exit();
    }
    else{
        echo "Greska pri unosu. " . $stmt.error;
    }

    $stmt->close();
    $veza->close();
?>