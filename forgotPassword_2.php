<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $email = $_POST['securityCode'];
        echo $email;
    ?>

    <script>
        let recoveryCode = Math.floor(Math.random() * 9000) + 1000;
        console.log(recoveryCode);
    </script>

    
</body>
</html>


