<!DOCTYPE html>
<html lang="en">
<head>
   

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="main.css" rel="stylesheet" type="text/css">
    <link href="media.css" type="text/css" rel="stylesheet">
</head>
<body class="bodyGray">
        <?php
            include 'navbarmenu.php';

            // Preuzimanje id parametra iz URL-a
            $id = $_GET['id'];

            // Učitaj podatke za konekciju
            include 'credentials.php';

            // Kreiranje konekcije
            $conn = new mysqli($host, $username, $password, $database);

            // Provera konekcije
            if ($conn->connect_error) {
                die("Greška pri učitavanju konekcije: " . $conn->connect_error);
            }

            // Pripremanje SQL upita sa placeholder-om za id
            $sql = "SELECT username, pwd FROM users WHERE id = ?";

            // Pripremi upit
            $stmt = $conn->prepare($sql);

            if ($stmt === false) {
                die("Greška u pripremi upita: " . $conn->error);
            }

            // Veži id kao parametar (tip "i" označava integer)
            $stmt->bind_param("i", $id);

            // Izvrši upit
            $stmt->execute();

            // Dobij rezultate
            $result = $stmt->get_result();

            // Proveri da li je dobijen rezultat
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $username = $row['username'];
                $pwd = $row['pwd'];
            } else {
                echo "Nema rezultata za dati ID.";
            }

            // Zatvori statement i konekciju
            $stmt->close();
            $conn->close();

            include 'cookie.php';
        ?>


        <?php include 'title.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>    
    <script src="main.js"></script>
</body>
</html>