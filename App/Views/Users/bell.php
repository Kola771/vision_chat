<?php
    @session_start();
    $variable = "bell";
?>

<?php if(isset($_SESSION["id"])) : ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b48549a02e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>Vison Chat | Notifications</title>
</head>
<body>
    <?php require("../App/Views/Users/header.php"); ?>
    <main class="width">
        <section class="flex bell_section">
        <h2>Voir toutes les notifications</h2>
            <article class="bell">
                <div class="flex">
                    <h3 class="order2">L'utlisateur Mojombo101 vous a targuez dans un commentaire.</h3>
                    <img class="order1" src="/assets/story/livre.jpg" alt="livre">
                </div>
                <p>Post de Marcos199</p>
                <p>Publier le --/--/--</p>
            </article>
            <article class="bell">
                <div class="flex">
                    <h3 class="order2">L'utlisateur Marcos199 vous a targuez dans un commentaire.</h3>
                    <img class="order1" src="/assets/story/chapter.jpg" alt="chapter">
                </div>
                <p>Post de Asdepic002</p>
                <p>Publier le --/--/--</p>
            </article>
            <article class="bell">
                <div class="flex">
                    <h3 class="order2">L'utlisateur Mojombo101 vous a targuez dans un commentaire.</h3>
                    <img class="order1" src="/assets/story/livre.jpg" alt="livre">
                </div>
                <p>Post de Marcos199</p>
                <p>Publier le --/--/--</p>
            </article>
            <article class="bell">
                <div class="flex">
                    <h3 class="order2">L'utlisateur Mojombo101 vous a targuez dans un commentaire.</h3>
                    <img class="order1" src="/assets/story/chapter.jpg" alt="chapter">
                </div>
                <p>Post de Marcos199</p>
                <p>Publier le --/--/--</p>
            </article>
            <article class="bell">
                <div class="flex">
                    <h3 class="order2">L'utlisateur Marcos199 vous a targuez dans un commentaire.</h3>
                    <img class="order1" src="/assets/story/livre.jpg" alt="livre">
                </div>
                <p>Post de Asdepic002</p>
                <p>Publier le --/--/--</p>
            </article>
            <article class="bell">
                <div class="flex">
                    <h3 class="order2">L'utlisateur Mojombo101 vous a targuez dans un commentaire.</h3>
                    <img class="order1" src="/assets/story/chapter.jpg" alt="chapter">
                </div>
                <p>Post de Marcos199</p>
                <p>Publier le --/--/--</p>
            </article>
    </section>
    </main>

    <?php require("../App/Views/Users/footer.php"); ?>
</body>
</html>

<?php else : ?>

<?php header("Location:/home/login") ?>

<?php endif; ?>
