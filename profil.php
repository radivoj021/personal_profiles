<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "phone_book";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Greška pri učitavanju konekcije: " . $conn->connect_error);
}

$id = $_GET['id'];

// Pripremi SQL upit sa placeholder-om za ime i prezime
$sql = "SELECT firstname, lastname FROM users WHERE id = ?";

// Pripremi upit
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Greška u pripremi upita: " . $conn->error);
}

// Vezi id kao parametar
$stmt->bind_param("i", $id);

// Izvrši upit
$stmt->execute();

// Dobij rezultate
$result = $stmt->get_result();

// Proveri da li je dobijen rezultat
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    echo "<h1>";
    echo $firstname . " " . $lastname;
    echo "</h1>";
    echo "<hr>";
    echo "<a href='login.html'>go back</a>";
} else {
    header("Location: logIn.html");
    exit();
}



// Zatvori upit i konekciju
$stmt->close();
$conn->close();
?>
