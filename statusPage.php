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
<body>
    <?php


        include "cookieCheck.php";
        $id = $_GET['id'];
    ?>

    <div id="statusCreate">
        <i id="statusBack" class="fa-solid fa-arrow-left back"></i>
        <br>
        <br>
        <h2>Type your text here...</h2>

        
                    
        
        <br>
        <form action="insertStatus.php" method="POST">
            <textarea type="text" id="status" name="statusText"></textarea>
            <input type="hidden" name="id" value="<?php session_start(); echo $_SESSION['id']; ?>">
            <br>
            <br>
            <button id="updateStatusButton">Update Status</button>
         <!--    <script>
                let updateStatusButton = document.getElementById("updateStatusButton");

                updateStatusButton.addEventListener("click", function(){
                    window.location.href = "insertStatus.php?id=<?php echo $id;?>";
                })
            </script> -->
        </form>        
    
        
    </div>

    <script>
        let goBack = document.getElementById("statusBack");

        goBack.addEventListener("click", function goBack(){
            window.history.back();
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>    
    <script src="main.js"></script>
</body>
</html>