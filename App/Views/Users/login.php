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
    <title>Vision Chat | Connexion</title>
</head>
<body>
    <div class="big_parent top">
        <div class="parent_form flex">
            <h2><span class="green">Vision</span> Chat Connexion</h2>
            <form class="flex">
                <p id="paragraph"></p>
                <input type="text" name="username" id="username" placeholder="Addresse électronique ou username">
                <input type="password" name="password" id="password" placeholder="Password">
                <button class="validate" type="submit">Connexion</button>
            </form>
        </div>
        <div class="condition flex">
            <a href="/home/forget">Mot de passe oublié ?</a>
            <a href="/home/index">Inscription</a></p>
        </div>
    </div>
    
    <script src="/assets/js/login.js"></script>
</body>
</html>