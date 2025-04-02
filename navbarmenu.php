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
        
            
        $id = $_COOKIE['id'];
        
        ?>

        <nav class="navbar bg-body-tertiary fixed-top" id="navbarMenuProfile">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Timetable</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="homepage.php?id=<?php echo $id?>">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="profil.php?id=<?php echo $id?>">My profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Inbox</a>
                        </li>
                        <hr>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="phoneBookList.php?id=<?php echo $id?>">Phonebook</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">To Do list</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Diary</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Gallery</a>
                        </li>
                        <br>
                        <br>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="deleteAccount.php">Delete My Account</a>
                        </li>
                        <li class="nav-item">
                            <a id="logOut" class="nav-link active" aria-current="page" href="logout.php">Log Out</a>
                        </li>
                    </ul>
                    </form>
                </div>
                </div>
            </div>
        </nav>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> 
    </body>
</html>