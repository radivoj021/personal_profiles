<?php
    ob_start();
    session_start();
    $id = $_COOKIE['id'];
    if(isset($_COOKIE['username'])){
        header("Location: homepage.php?id=$id");
    }
?>
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
        

      /*   if(isset($_COOKIE["username"])) {
            echo "Korisničko ime iz cookie-ja: " . $_COOKIE["username"];
        } else {
            echo "Cookie nije postavljen.";
        }

        if(isset($_COOKIE["pwd"])) {
            echo "Korisničko ime iz cookie-ja: " . $_COOKIE["pwd"];
        } else {
            echo "Cookie nije postavljen.";
        }
 */


?>
    <div id="welcomeTitle">
        TimeTable
    </div>
    <div id="welcomeTitleSmall">
        Organize your time. Save more for tomorrow.
    </div>
    <h3 id="warning">(DEMO VERSION - for testing ONLY)</h3>
    <div>
        
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