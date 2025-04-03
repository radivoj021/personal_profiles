<?php
ob_start();
session_start();

// Preuzimanje podataka iz sesije
/* $_SESSION['firstname'];
$_SESSION['lastname'];
$_SESSION['id'];

setcookie('firstname', $_SESSION['firstname'], time() + (30 * 24 * 60 * 60), "/");
setcookie('lastname', $_SESSION['lastname'], time() + (30 * 24 * 60 * 60), "/"); */

$id = $_COOKIE['id'];
$fname = $_COOKIE['firstname'];
$lname = $_COOKIE['lastname'];
$date = date("j F Y");

// Provera da li su podaci iz sesije i POST-a dostupni
if (isset($_SESSION["id"]) && isset($_POST['statusText'])) {
    $id = $_SESSION["id"]; // ID iz sesije
    $statusText = $_POST['statusText']; // Tekst statusa iz POST-a

    // Debug ispis (možete ga ukloniti)
    echo "ID iz sesije: $id<br>";
    echo "Ime: $fname<br>";
    echo "Prezime: $lname<br>";
    echo "Tekst statusa: $statusText<br>";
    echo "datum: " . $date;

    // Uključivanje kredencijala za bazu
    include 'credentials.php';

    // Kreiranje konekcije
    $conn = new mysqli($host, $username, $password, $database);

    // Provera konekcije
    if ($conn->connect_error) {
        die("Greška pri konekciji: " . $conn->connect_error);
    }

    // SQL upit za unos podataka
    $sql = "INSERT INTO status (id, firstName, lastName, statusText, statusDate) VALUES (?, ?, ?, ?, ?)";

    // Priprema upita
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Greška u pripremi upita: " . $conn->error);
    }

    // Vezivanje parametara ("issss" označava integer, string, string, string, string)
    $stmt->bind_param("issss", $id, $fname, $lname, $statusText, $date);

    // Izvršenje upita
    if ($stmt->execute()) {
        echo "Podaci uspešno uneseni!";
    } else {
        echo "Greška pri unosu podataka: " . $stmt->error;
    }

    // Zatvaranje statement-a i konekcije
    $stmt->close();
    $conn->close();

    // Preusmeravanje korisnika (uklonite komentar za aktivaciju)
} else {
    echo "Nedostaju podaci za unos.";
}

header("Location: homepage.php?id=$id"); 
?>