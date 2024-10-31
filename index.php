<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TimeTable</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="main.css" rel="stylesheet" type="text/css">
    <link href="media.css" type="text/css" rel="stylesheet">
</head>
<body id="mainBody">

<?php

include 'credentials.php';

$conn = new mysqli($host, $username, $password, $database);

// Provera konekcije
if ($conn->connect_error) {
    die("Greška pri učitavanju konekcije: " . $conn->connect_error);
}

// Priprema SQL upita za provere korisnika
$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Proveri da li je korisnik pronađen
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Proveri lozinku (uporedi sa hashed lozinkom u bazi)
    if (password_verify($pwd, $row['pwd'])) {
        // Postavi kolačiće ili sesije za korisnika
        setcookie("username", $username, time() + (86400 * 30), "/"); // Kolačić na 30 dana
        $_SESSION['username'] = $username; // Postavi sesiju za korisnika

        // Preusmeri korisnika na njegov profil
        header("Location: profile.php"); // Promeni putanju do svoje stranice
        exit(); // Zaustavi dalje izvršavanje
    } else {
        echo "Neispravna lozinka.";
    }
} else {
    echo "Korisnik nije pronađen.";
}

// Zatvori konekciju
$stmt->close();
$conn->close();




if(isset($_COOKIE["username"])) {
    echo "Korisničko ime iz cookie-ja: " . $_COOKIE["username"];
} else {
    echo "Cookie nije postavljen.";
}

if(isset($_COOKIE["pwd"])) {
    echo "Korisničko ime iz cookie-ja: " . $_COOKIE["pwd"];
} else {
    echo "Cookie nije postavljen.";
}


?>


    <div id="welcomeTitle">
        TimeTable
    </div>
    <div id="welcomeTitleSmall">
        Organize your time. Save more for tomorrow.
    </div>
    <div id="welcomeText">
        Welcome to TimeTable, your all-in-one platform for organizing your daily activities! Here, you'll find a personal journal to keep track of important tasks and events. Our phonebook feature helps you manage and store all your essential contacts in one place. Explore the gallery to view and share memorable moments with friends and family. With a variety of other useful tools, TimeTable is designed to simplify and enrich your day-to-day life!
    </div>
    <div id="buttonField">
        <form id="signinForm" action="logIn.html">
            <button class="welcomeButtons">Log in</button>
        </form>
        <form id="signupForm" action="signUp.html">
            <button class="welcomeButtons">Sign up</button>
        </form>
        
    </div>
</body>
</html>