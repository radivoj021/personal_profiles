<?php
    session_start();
?>
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
<body>
    

    <?php
        
        include "cookieCheck.php";

        include 'navbarmenu.php';

        $id = $_COOKIE['id'];

        include 'credentials.php';

        $conn = new mysqli($host, $username, $password, $database);

        if($conn -> connect_error){
            die("Neuspesna konekcija " . $conn -> connect_error);
        }

        $sql = "SELECT * from contacts WHERE id=$id";
        $result = $conn->query($sql);

        if($result -> num_rows > 0){
            echo "<table border='1'>";
            echo "<tr><th>Ime i prezime</th><th>Telefon</th></tr>";
            while($row = $result -> fetch_assoc()){
                echo "<tr><td>" . $row['firstName'] . " " . $row['lastName'] . "</td><td>" . $row['phoneNumber'] . "</td></tr>";
            }
        }

        echo "<a href='phonebookAdd.php'><button>add user</button>";
    ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>    
    <script src="main.js"></script>
</body>
</html>