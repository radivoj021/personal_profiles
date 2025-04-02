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
            $id = $_GET['guestId'];

            include 'credentials.php';

            $conn = new mysqli($host, $username, $password, $database);

            if ($conn->connect_error) {
                die("Greška pri učitavanju konekcije: " . $conn->connect_error);
            }

            $sql = "SELECT firstname, lastname FROM users WHERE id = ?";

            $stmt = $conn->prepare($sql);

            if ($stmt === false) {
                die("Greška u pripremi upita: " . $conn->error);
            }

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
            } else {
                echo "Nema rezultata za dati ID.";
            }
        ?>
        <div class="container">
            <div class="row">
                    <div class="" id="leftColumn">
                        <div id="nameTitle"><?php echo $firstname . " " . $lastname;?></div>
                    </div>
            </div>
            <div class="row">
                <div id=profileBody>
                    <button type="button" onclick=addFriend(); class="btn btn-primary">Start Friendship</button>
                    <button id="messageBtn" type="button" class="btn btn-light">Send Message</button>
                </div>
            </div>
        </div>
        
        <?php
            $sql = "SELECT * FROM status WHERE id = ?";

            $stmt = $conn->prepare($sql);

            if ($stmt === false) {
                die("Greška u pripremi upita: " . $conn->error);
            }

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
            } else {
                echo "Nema rezultata za dati ID.";
            }

            $sql = "SELECT * FROM status WHERE id=$id ORDER BY statusId DESC";
                        $result = $conn->query($sql);

                        if($result -> num_rows > 0){
                            while($row = $result -> fetch_assoc()){

                                echo "<div class='container statusBox'>";
                                    echo "<div class='statusBoxName'>";
                                    echo $row['firstName'] . " " . $row['lastName'];
                                    echo "</div>";
                                    echo "<div class='statusBoxDate'>";
                                    echo $row['statusDate'];
                                    echo "</div>";
                                    echo "<div class='statusBoxText'>";
                                    echo $row['statusText'];
                                    echo "</div>";
                                echo "</div>";
                            }   
                        }          
        ?>
        <!--     zakomentarisano jer ne treba da vodi link ka posebnoj stranici nego da se samo izmeni naziv buttona na pending
            <script>
            function addFriend(){
                window.location.href = "addFriend.php";
            }
        </script> -->


    </body>
</html>