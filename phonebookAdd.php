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
    
        session_start();
        include "cookieCheck.php";
        include "navbarmenu.php";
        include "credentials.php";
    
    ?>
    Add user
    <hr>

    <br>
    <br>
    <form action="addContact.php">
        First Name:<br>
        <input type="text" name="firstName">
        <br><br>
        Last Name:<br>
        <input type="text" name="lastName">
        <br><br>
        Phone Number:<br>
        <input type="number" name="phoneNumber">
        <br><br>
        <button type="submit">Add user</button>
    </form>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>    
    <script src="main.js"></script>
</body>
</html>