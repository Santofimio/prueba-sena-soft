<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Enviar correo</h2>
    <form data-url="<?php echo getUrl("Email","Email","sendEmail",false,"ajax") ?>" id="email">
        <div>
            <label for="correo">Correo</label>
            <input type="text" name="correo" id="">
        </div>
        <br>
        <div>
            <label for="msm">Mensaje</label>
            <textarea name="msm" id="" cols="30" rows="10"></textarea>
        </div>
        <br>
        <div>
            <input type="button" value="enviar" onclick="sendEmail()">
        </div>
    </form>
</body>
<script src="js/santo.js"></script>
</html>