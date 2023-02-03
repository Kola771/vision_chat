<?php 
    @session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>Vision Chat</title>
</head>
<body>
    <div class="big_parent top">
        <div class="parent_form flex">
            <h2><span class="green">Vision</span> Chat Connexion</h2>
            <form class="flex">
                <p id="paragraph"></p>
                <input type="email" name="email" id="email" placeholder="Addresse électronique">
                <button class="validate" type="submit">Valider</button>
            </form>
        </div>
        <div class="condition flex">
            <a href="/home/login">Retourner en arrière</a>
        </div>
    </div>
    
    <script src="/assets/js/forget.js"></script>
</body>
</html>