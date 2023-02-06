<?php
    @session_start();
    $variable = "sms";
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
    <title>Vison Chat | Chat</title>
</head>
<body>
    <?php require("../App/Views/Users/header.php"); ?>
    <main class="width">
        <section>
            <h2>Recherche</h2>
            <form class="section_search flex">
                <input type="text" name="search" placeholder="Entrez une recherche">
                <button type="submit"><i class="fa fa-search"></i> Rechercher</button>
            </form>
        </section>
        <section class="other_sms">
            <h2>Personnes en ligne</h2>
            <div class="flex">
                <div>
                    <a href="#"><img class="order1" src="/assets/story/livre.jpg" alt="livre"></a>
                    <div class="absolute"></div>
                </div>
                <div>
                    <a href="#"><img class="order1" src="/assets/story/chapter.jpg" alt="chapter"></a>
                    <div class="absolute"></div>
                </div>
                <div>
                    <a href="#"><img class="order1" src="/assets/story/livre.jpg" alt="livre"></a>
                    <div class="absolute"></div>
                </div>
                <div>
                    <a href="#"><img class="order1" src="/assets/story/chapter.jpg" alt="chapter"></a>
                    <div class="absolute"></div>
                </div>
                <div>
                    <a href="#"><img class="order1" src="/assets/story/livre.jpg" alt="livre"></a>
                    <div class="absolute"></div>
                </div>
                <div>
                    <a href="#"><img class="order1" src="/assets/story/chapter.jpg" alt="chapter"></a>
                    <div class="absolute"></div>
                </div>
            </div>
        </section>
        <section class="sms">
            <h2>Messages</h2>
            <article>
                <div class="flex article_sms">
                    <h3 class="order2">Username</h3>
                    <img class="order1" src="/assets/story/chapter.jpg" alt="chapter">
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </article>
            <article>
                <div class="flex article_sms">
                    <h3 class="order2">Username</h3>
                    <img class="order1" src="/assets/story/livre.jpg" alt="livre">
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </article>
            <article>
                <div class="flex article_sms">
                    <h3 class="order2">Username</h3>
                    <img class="order1" src="/assets/story/chapter.jpg" alt="chapter">
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </article>
            <article>
                <div class="flex article_sms">
                    <h3 class="order2">Username</h3>
                    <img class="order1" src="/assets/story/livre.jpg" alt="livre">
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </article>
            <article>
                <div class="flex article_sms">
                    <h3 class="order2">Username</h3>
                    <img class="order1" src="/assets/story/chapter.jpg" alt="chapter">
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </article>
            <article>
                <div class="flex article_sms">
                    <h3 class="order2">Username</h3>
                    <img class="order1" src="/assets/story/livre.jpg" alt="livre">
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </article>
            <article>
                <div class="flex article_sms">
                    <h3 class="order2">Username</h3>
                    <img class="order1" src="/assets/story/chapter.jpg" alt="chapter">
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </article>
        </section>
    </main>

    <?php require("../App/Views/Users/footer.php"); ?>
</body>
</html>

<?php else : ?>

<?php header("Location:/home/login") ?>

<?php endif; ?>
