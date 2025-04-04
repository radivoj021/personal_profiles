<?php
    ob_start();
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TimeTable</title>   

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="main.css" type="text/css" rel="stylesheet">
    <link href="media.css" type="text/css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

</head>
<body class="bodyGray">
    <div class="container" id="container1">
        <div class="row">
        <?php
            include 'cookieCheck.php';

            /* echo $_SESSION['username'] . " " . $_SESSION['password'];  <--- works */

            /* include 'title.php'; */
            
            include 'credentials.php';

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

                $_SESSION["firstname"] = $firstname;
                $_SESSION["lastname"] = $lastname;
                setcookie("firstname",$firstname,time()+(30*24*60*60),"/");
                setcookie("lastname",$lastname,time()+(30*24*60*60),"/");
                ?>
        </div>

        <div class="row">
            <div class="" id="leftColumn">
                <div id="nameTitle"><?php echo $firstname . " " . $lastname;?></div>
                
                <div id="homePageIcon"><a href="homepage.php?id=<?php echo $id?>"><i class="fa-solid fa-house"></i></a></div>
                

                <?php
                    include 'navbarmenu.php';
                ?>
            </div>
        </div> 
        <?php
            } else {
                header("Location: logIn.html");
                exit();
            }
            // Zatvori upit i konekciju
            $stmt->close();
            $conn->close();
        ?>
    </div>

    <div class="container">
    <div class="row statusRow">
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
                                echo "<div class='row nameDate'>";
                                    echo "<div class='statusBoxName'>";
                                    echo $row['firstName'] . " " . $row['lastName'];
                                    echo "</div>";                                 

                                    echo "<div class='statusBoxDate'>";
                                    echo $row['statusDate'];
                                    echo "</div>";
                                echo "</div>";

                                echo "<div class='textActions'>";
                                    echo "<div class='statusBoxText'>";
                                    echo $row['statusText'];
                                    echo "</div>";

                                    echo "<div class='deleteStatus'>";
                                    echo "<a href='deleteStatus.php'>Delete</a>";
                                    echo "</div>";

                                    echo "<div class='row likeRow'>";
                                    echo "<div class='like'>Like</div>";
                                    echo "</div>";
                                echo "</div>";    
                            echo "</div>";
                        }
                    }              

                    ?>

        </div>
    </div>
    



    <script src="cookie.js"></script> <!-- Uključivanje JavaScript fajla -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>    
    <script src="main.js"></script>
</body>
</html>