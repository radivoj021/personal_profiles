<!DOCTYPE html>
<html lang="en">
<head>
    

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="main.css" rel="stylesheet" type="text/css">
    <link href="media.css" type="text/css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">


</head>
<body class="bodyGray">
        <?php

            session_start();
            include 'cookieCheck.php';

            if (!isset($_SESSION['firstname'])) {
                echo "Sesija 'firstname' nije postavljena.";
            }

            

            /* include 'cookieCheck.php'; */
            

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

 /*            include 'cookie.php'; */

         
        ?>


        
    <div class="container" id="statusField">
        <div class=row>
            <div>
                <?php
                    include 'title.php'; 
                    include 'navbarmenu.php';

                ?>
                <i class="fa-solid fa-gear homeIcons"></i>
                <i id="searchIcon" class="fa-solid fa-magnifying-glass homeIcons"></i>
                <i class="fa-solid fa-message homeIcons"></i>
                <script>
                    let searchIcon = document.getElementById("searchIcon");

                    searchIcon.addEventListener("click", function(){
                        window.location.href = "search.php?id=<?php echo $id ?>";
                    })
                </script>
            </div>
            <div>    
                <form action="">
                    <input type="text" id="addStatusText" placeholder="Add your status here...">
                    <script>
                        let status = document.getElementById('addStatusText');
                        

                        status.addEventListener("click", function(){
                            window.location.href = "statusPage.php?id=<?php echo $id ?>";
                        })


                    </script>
                </form>

            </div>
            
        </div>

        <div class="row" id="statusRow">
                <?php

                    include 'credentials.php';

                    $conn = new mysqli($host, $username, $password, $database);


                    if($conn -> connect_error){
                        die("Neuspesna konekcija " . $conn -> connect_error);
                    }

                    $sql = "SELECT * FROM status WHERE id=$id ORDER BY statusId DESC";
                    $result = $conn->query($sql);

                    if($result -> num_rows > 0){
                        while($row = $result -> fetch_assoc()){

                            echo "<div class='statusBox'>";
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



                        /*  echo "<div class='statusBox'>";
                            echo
                            echo $row['firstName'] . " " . $row['lastName'] . " " . $row['statusText'];
                            echo "</div>"; */
                        }
                    }              

                    ?>

        </div>

        

        
    </div>
    
    <!-- <div class='statusBox'>
        <div class='statusBoxName'>

        </div>
        <div class='statusBoxDate'>

        </div>
        <div class='statusBoxText'>

        </div>
    </div>
    -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>    
    <script src="main.js"></script>
</body>
</html>