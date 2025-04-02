<?php
    ob_start();
    include 'cookieCheck.php';    
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bodyGray">
    <div class="container">
        <div class="row">

            <div id="bodyOfThePage">
                <div id="back" class="back">

                    <script>
                        let goBack = document.getElementById("back");

                        goBack.addEventListener("click", function goBack(){
                            window.history.back();
                        });
                    </script>
                    
                    <i class="fa-solid fa-arrow-left"></i>
                </div>
                <form action="searchPage.php">
                    <input id="search" type="text" placeholder="search..."> 
                </form>
            </div>

            <?php
                include 'credentials.php';

                $conn = new mysqli($host, $username, $password, $database);

                if($conn -> connect_error){
                    die("Neuspesna konekcija " . $conn -> connect_error);
                }

                $sql = "SELECT * FROM users";
                $result = $conn->query($sql);



                if($_COOKIE['firstname'] && $_COOKIE['lastname']){
                    if($result -> num_rows > 0){
                        while($row = $result -> fetch_assoc()){
                            $guestId = $row['id'];
                            if($guestId == $_COOKIE['id']){
                                $profileLocation = "<a href='profil.php?id=" . $_COOKIE['id'] . "'>";
                            }
                            else{
                                $profileLocation = "<a href='guestProfile.php?guestId=$guestId'>";
                            }
                            echo $profileLocation;
                            echo "<div class='statusBox'>";
                                echo "<div class='statusBoxName'>";
                                echo $row['firstName'] . " " . $row['lastName'];
                                echo "</div>";
                            echo "</div>";
                            echo "</a>";
                        }
                    }
                }
            ?>

        
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>    
    <script src="main.js"></script>
</body>
</html>