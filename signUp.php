<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'credentials.php';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Greška pri konekciji: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = $_POST['firstname'] ?? '';
    $lastname = $_POST['lastname'] ?? '';
    $email = $_POST['email'] ?? '';
    $username = $_POST['username'] ?? '';
    $pwd = $_POST['password'] ?? '';

    if (empty($firstname) || empty($lastname) || empty($email) || empty($username) || empty($pwd)) {
        header("Location: signUp.php");
        exit();
    }

    /* $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT); */

    $sql = "INSERT INTO users (firstname, lastname, email, username, pwd) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Greška u pripremi upita: " . $conn->error);
    }

    $stmt->bind_param("sssss", $firstname, $lastname, $email, $username, $pwd);

    if ($stmt->execute()) {
        header("Location:logIn.html");
    } else {
        echo "Greška pri unosu: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
