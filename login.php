<!DOCTYPE html>
<html lang="fr">
<?php
require_once 'classes/User.php';
require_once 'assets/inc/html_head.php';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
    header('Location: /');
}

?>

<body>
    <header class="container">
        <div class="title">
            <h1 class="fake-logo"><a href="/">FAKE NEWS II</a></h1>
            <div id="phrase">IL REVIENT ET IL EST PAS CONTENT ! MYTHONÉ EN PHP ET MYSQL.</div>
        </div>
        <?php require_once 'assets/inc/separator_double.php' ?>
    </header>

    <main>

        <form method="post" action="/assets/scripts/php/login.php" id="login-form">

            <?php
            if (isset($_GET['err'])){
                require_once 'classes/Html.php';

                switch ($_GET['err']){
                    case 1:
                        $icon = new Html('i', ['class'=>'fas fa-exclamation-triangle']);
                        $html = new Html('div', ['class'=>'error'], $icon->__toString() . 'Erreur d\'identification');
                        echo $html->__toString();
                }
            }
            ?>

            <div class="input">
                <input type="text" name="login" id="login" tabindex="1" required>
                <span class="floating-label">Utilisateur</span>
            </div>

            <div class="input">
                <input type="password" name="passwd" id="passwd" tabindex="2" required>
                <span class="floating-label">Mot de passe</span>
            </div>

            <button type="submit" class="no-link" onclick="formValidation()">Se connecter</button>

            <div class="credentials">
                <label for="credPannel">Voir les utilisateurs</label>
                <input type="checkbox" id="credPannel">

                <ul>
                    <li>
                        <p>Utilisateur standart: </p>
                        <p>Max / azerty</p>
                    </li>
                    <li>
                        <p>Rédacteur: </p>
                        <p>Auteur / azerty</p>
                    </li>
                    <li id="credential_admin">
                        <p>Administrateur: </p>
                        <p>N'hésitez pas à me contacter si vous désirez avoir accès à l'espace administrateur</p>
                    </li>

                </ul>
            </div>
        </form>
    </main>
    <script type="application/javascript" src="assets/scripts/js/login_validation.js"></script>
</body>
</html>