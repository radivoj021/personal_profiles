<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'credentials.php';

// Konekcija sa bazom
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Greška pri konekciji: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $pwd = $_POST['password'];

    // Provera praznih polja
    if (empty($username) || empty($pwd)) {
        header("Location: logIn.html?error=empty_fields");
        exit();
    }

    // Dohvatanje korisnika iz baze
    $sql = "SELECT id, firstname, lastname, username, pwd FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Greška u pripremi upita: " . $conn->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Provera lozinke
        if ($pwd != "") {
            // Uspešna prijava
            $_SESSION['id'] = $row['id'];
            $_SESSION['guestId'] = $row['id'];
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['lastname'] = $row['lastname'];
            $_SESSION['username'] = $username;
            $_SESSION['pwd'] = $pwd;
            
            setcookie('id',  $_SESSION['id'], time() + (30 * 24 * 60 * 60 * 120), "/");
            setcookie('guestId', $_SESSION['guestId'], time() + (30 * 24 * 60 * 60 * 120), "/");
            setcookie('firstname', $_SESSION['firstname'], time() + (30 * 24 * 60 * 60 * 120), "/");
            setcookie('lastname',  $_SESSION['lastname'], time() + (30 * 24 * 60 * 60 * 120), "/");
            setcookie('username', $username, time() + (30 * 24 * 60 * 60 * 120), "/");
            setcookie('pwd',  $_SESSION['pwd'], time() + (30 * 24 * 60 * 60 * 120), "/");
           

            header("Location: homepage.php?id=" . $row['id']);
            exit();
        } else {
            // Pogrešna lozinka
            header("Location: logIn.html?error=wrong_password");
            exit();
        }
    } else {
        // Korisnik ne postoji
        header("Location: logIn.html?error=user_not_found");
        exit();
    }
} else {
    echo "Podaci nisu poslati POST metodom.";
    exit();
}
?>
