<!DOCTYPE html>
<html lang="fr">
<?php
require_once 'classes/User.php';

session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
    header('Location: /');
}

require_once 'inc/html_head.php'; ?>

<body>
    <header class="container">
        <div class="title">
            <h1 class="fake-logo"><a href="/">FAKE NEWS II</a></h1>
            <div id="phrase">IL REVIENT ET IL EST PAS CONTENT ! MYTHONÉ EN PHP ET MYSQL.</div>
        </div>
        <?php require_once 'inc/double_sep.php' ?>
    </header>

    <main>

        <form method="post" action="/scripts/php/login.php" id="login-form">

            <?php
            if (isset($_GET['err'])){
                switch ($_GET['err']){
                    case 1:
                        echo '<div class="error">Erreur d\'identification</div>';
                }
            }
            ?>

            <div class="input">
<!--                <label for="login">Identifiant</label>-->
                <input type="text" name="login" id="login">
                <span class="floating-label">Utilisateur</span>
            </div>

            <div class="input">
<!--                <label for="passwd">Mot de passe</label>-->
                <input type="password" name="passwd" id="passwd">
                <span class="floating-label">Mot de passe</span>
            </div>

            <!--TODO ajouter icone dans button-->
            <button type="button" onclick="formValidation()">Se connecter</button>
        </form>
    </main>
    <script type="application/javascript" src="scripts/js/login_validation.js"></script>
</body>
</html>