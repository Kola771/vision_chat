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
    <div class="big_parent">
        <section class="big_parent_section">
            <h2>Etape à suivre</h2>
            <ul class="flex list">
                <li class="active">1</li>
                <li>2</li>
                <li>3</li>
                <li>4</li>
            </ul>
        </section>
        <div class="parent_form flex">
            <h2><span class="green">Vision</span> Chat Sign up</h2>
            <form class="flex form_one">
                <p id="id"></p>
                <input type="text" name="firstname" id="firstname" placeholder="Firstname">
                <input type="text" name="lastname" id="lastname" placeholder="Lastname">
                <input type="date" name="date" id="date" placeholder="Date de naissance">
                    <button class="event_one validate" type="submit">Validate</button>
            </form>
            <form class="flex form_two">
                <h3>Crééz votre avatar</h3>
                <p id="paragraph"></p>
                <input type="email" name="useremail" id="useremail" placeholder="Addresse électronique">
                <input type="text" name="username" id="username" placeholder="Username">
                <input type="text" name="wordkey" id="wordkey" placeholder="Wordkey">
                    <button class="event_two validate" type="submit">Validate</button>
            </form>
            <form class="flex form_three">
                <h3>Informations personnelles</h3>
                <p id="paragraphe"></p>
                    <select name="sexe" id="sexe">
                        <option value="" disabled selected>Selectionner votre genre</option>
                        <option value="Masculin">Masculin</option>
                        <option value="Féminin">Féminin</option>
                        <option value="Autres">Autres</option>
                    </select>
                    <select name="matrimonial" id="matrimonial">
                        <option value="" disabled selected>Votre situation matrimoniale</option>
                        <option value="Célibataire">Célibataire</option>
                        <option value="En couple">En couple</option>
                        <option value="Compliqué">Compliqué</option>
                        <option value="Union libre">Union libre</option>
                    </select>
                    <button class="event_three validate" type="submit">Validate</button>
            </form>
            <form class="flex form_four">
                <h3>Password</h3>
                <p id="paragraphes"></p>
                <input type="password" name="password" id="password" placeholder="Password">
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm password">
                    <button class="event_four validate" type="submit">Validate</button>
            </form>
        </div>
        <button class="back">Back</button>
    </div>

    <script src="/assets/js/index.js"></script>
</body>
</html>