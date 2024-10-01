<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Poslat vam je kod za reset sifre.</h3>
    <span>Unesite kod koji vam je poslat.</span>
    <br>
    <br>
    <input type="number" name="securityCode">
    <br>
    <br>
    <button type="submit">submit</button>

    

    <script>
        let key = Math.random();
        let securityKey = Math.floor((key + 1) * 1000);

        console.log(securityKey);
    </script>
</body>
</html>