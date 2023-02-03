<?php
    @session_start();
    $variable = "space";
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
    <title>Vison Chat | Space</title>
</head>
<body>
    <?php require("../App/Views/Users/header.php"); ?>
    <main class="width">
        <section class="story">
            <h2>Ajouter une story <?= $_SESSION["username"] ?></h2>
            <div class="flex images">
                <?php if(isset($_SESSION["id"])) : ?>
                    <div class="image_story height">
                        <img src="/assets/users_pictures/<?= $_SESSION["image"] ?>" alt="livre">
                        <form class="flex add_file" action="#" method="post" enctype="multipart/form-data">
                            <input type="file" name="file[]" id="file" multiple>
                            <label for="file" class="file flex"><i class="fas fa-photo-video"></i></label>
                            <button><i class="fa fa-check"></i></button>
                        </form>
                    </div>
                    <div class="image_story">
                        <img src="/assets/story/chapter.jpg" alt="livre">
                        <h3>Votre story</h3>
                    </div>
                <?php endif; ?>
                
                <div class="image_story">
                    <img src="/assets/story/livre.jpg" alt="livre">
                    <h3>Username</h3>
                </div>
                <div class="image_story">
                    <img src="/assets/story/livre.jpg" alt="livre">
                    <h3>Username</h3>
                </div>
                <div class="image_story">
                    <img src="/assets/story/chapter.jpg" alt="livre">
                    <h3>Username</h3>
                </div>
                <div class="image_story">
                    <img src="/assets/story/livre.jpg" alt="livre">
                    <h3>Username</h3>
                </div>
                <div class="image_story">
                    <img src="/assets/story/chapter.jpg" alt="chapter">
                    <h3>Username</h3>
                </div>
                <div class="image_story">
                    <img src="/assets/story/livre.jpg" alt="livre">
                    <h3>Username</h3>
                </div>
                <div class="image_story">
                    <img src="/assets/story/chapter.jpg" alt="chapter">
                    <h3>Username</h3>
                </div>
            </div>
        </section>
        
        <section class="publication flex">
            <div class="author flex">
                <h2 class="order2">Marcos199</h2>
                <img class="order1" src="/assets/story/livre.jpg" alt="livre">
            </div>
            <div class="publish flex">
                <div>
                    <div class="image_publish">
                        <img src="/assets/story/chapter.jpg" alt="chapter">
                    </div>
                    <div class="flex flex_publish">
                        <div class="flex flex_like">
                            <form action="#">
                                <input type="hidden" name="user_id" value="<?= $_SESSION["id"] ?>">
                                <input type="hidden">
                                <button><i class="far fa-heart"></i></button>
                            </form>
                            <p>305 personnes ont aimés cette publication</p>
                        </div>
                        <a href="#"><i class="far fa-comment-alt"></i> 101 commentaires</a>
                    </div>
                </div>
                <p class="description">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus veniam voluptas totam laborum expedita sequi veritatis ea eligendi dolorum ipsa explicabo aspernatur reiciendis ut, libero corrupti provident quis quibusdam tempore! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellendus hic sit, soluta facilis temporibus reprehenderit eveniet cupiditate aliquam ab fugit ex. Error ea alias, provident perspiciatis esse, et incidunt rem id laborum laudantium saepe, porro itaque velit mollitia odio. Officia ab deserunt, aliquam rerum debitis tempore molestias? Quo nemo deserunt eaque vel? Odio porro tempore impedit libero officiis facere, quidem ipsam a aspernatur, totam deserunt cum accusamus dolor laborum quisquam debitis cumque esse explicabo, atque quas. Laborum temporibus blanditiis explicabo nulla culpa. Tempora ab excepturi animi debitis accusamus magnam cum nihil saepe deleniti, provident numquam maiores repellat eligendi tenetur. Ab.
                </p>
            </div>
        </section>

        <section class="friends">
            <h2>Faire de nouvelles connaissances</h2>
            <div class="flex images">
                <figure>
                        <img src="/assets/story/chapter.jpg" alt="chapter">
                    <figcaption>
                        <form action="#">
                            <input type="hidden" name="user_id" value="<?= $_SESSION["id"] ?>">
                            <input type="hidden">
                            <button>Ajouter cet utilisateur</button>
                        </form>
                    </figcaption>
                </figure>
                <figure>
                        <img src="/assets/story/chapter.jpg" alt="chapter">
                    <figcaption>
                        <form action="#">
                            <input type="hidden" name="user_id" value="<?= $_SESSION["id"] ?>">
                            <input type="hidden">
                            <button>Ajouter cet utilisateur</button>
                        </form>
                    </figcaption>
                </figure>
                <figure>
                        <img src="/assets/story/chapter.jpg" alt="chapter">
                    <figcaption>
                        <form action="#">
                            <input type="hidden" name="user_id" value="<?= $_SESSION["id"] ?>">
                            <input type="hidden">
                            <button>Ajouter cet utilisateur</button>
                        </form>
                    </figcaption>
                </figure>
                <figure>
                        <img src="/assets/story/chapter.jpg" alt="chapter">
                    <figcaption>
                        <form action="#">
                            <input type="hidden" name="user_id" value="<?= $_SESSION["id"] ?>">
                            <input type="hidden">
                            <button>Ajouter cet utilisateur</button>
                        </form>
                    </figcaption>
                </figure>
                <figure>
                        <img src="/assets/story/chapter.jpg" alt="chapter">
                    <figcaption>
                        <form action="#">
                            <input type="hidden" name="user_id" value="<?= $_SESSION["id"] ?>">
                            <input type="hidden">
                            <button>Ajouter cet utilisateur</button>
                        </form>
                    </figcaption>
                </figure>
                <figure>
                        <img src="/assets/story/chapter.jpg" alt="chapter">
                    <figcaption>
                        <form action="#">
                            <input type="hidden" name="user_id" value="<?= $_SESSION["id"] ?>">
                            <input type="hidden">
                            <button>Ajouter cet utilisateur</button>
                        </form>
                    </figcaption>
                </figure>
                <figure>
                        <img src="/assets/story/chapter.jpg" alt="chapter">
                    <figcaption>
                        <form action="#">
                            <input type="hidden" name="user_id" value="<?= $_SESSION["id"] ?>">
                            <input type="hidden">
                            <button>Ajouter cet utilisateur</button>
                        </form>
                    </figcaption>
                </figure>
            </div>
        </section>
        
        <section class="publication flex">
            <div class="author flex">
                <h2 class="order2">Marcos199</h2>
                <img class="order1" src="/assets/story/chapter.jpg" alt="chapter">
            </div>
            <div class="publish flex">
                <div>
                    <div class="image_publish">
                        <img src="/assets/story/livre.jpg" alt="livre">
                    </div>
                    <div class="flex flex_publish">
                        <div class="flex flex_like">
                            <form action="#">
                                <input type="hidden" name="user_id" value="<?= $_SESSION["id"] ?>">
                                <input type="hidden">
                                <button><i class="far fa-heart"></i></button>
                            </form>
                            <p>305 personnes ont aimés cette publication</p>
                        </div>
                        <a href="#"><i class="far fa-comment-alt"></i> 101 commentaires</a>
                    </div>
                </div>
                <p class="description">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus veniam voluptas totam laborum expedita sequi veritatis ea eligendi dolorum ipsa explicabo aspernatur reiciendis ut, libero corrupti provident quis quibusdam tempore! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellendus hic sit, soluta facilis temporibus reprehenderit eveniet cupiditate aliquam ab fugit ex. Error ea alias, provident perspiciatis esse, et incidunt rem id laborum laudantium saepe, porro itaque velit mollitia odio. Officia ab deserunt, aliquam rerum debitis tempore molestias? Quo nemo deserunt eaque vel? Odio porro tempore impedit libero officiis facere, quidem ipsam a aspernatur, totam deserunt cum accusamus dolor laborum quisquam debitis cumque esse explicabo, atque quas. Laborum temporibus blanditiis explicabo nulla culpa. Tempora ab excepturi animi debitis accusamus magnam cum nihil saepe deleniti, provident numquam maiores repellat eligendi tenetur. Ab.
                </p>
            </div>
        </section>
    </main>

    <?php require("../App/Views/Users/footer.php"); ?>
</body>
</html>

<?php else : ?>

<?php header("Location:/home/login") ?>

<?php endif; ?>
