<?php
    @session_start();
    $variable = "friends";
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
    <title>Vison Chat | Friends</title>
</head>
<body>
    <?php require("../App/Views/Users/header.php"); ?>
    <main class="width">
        <section>
            <h2>Faire une recherche</h2>
            <form class="section_search flex">
                <input type="text" name="search" placeholder="Entrez une recherche">
                <button><i class="fa fa-search"></i> Rechercher</button>
            </form>
        </section>
    </main>

    <?php require("../App/Views/Users/footer.php"); ?>
</body>
</html>

<?php else : ?>

<?php header("Location:/home/login") ?>

<?php endif; ?>
