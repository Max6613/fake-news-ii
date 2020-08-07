<!DOCTYPE html>
<html lang="fr">
<?php require_once 'inc/html_head.php'; ?>

<body>
    <header class="container">
        <div class="title">
            <h1 class="fake-logo"><a href="/">FAKE NEWS II</a></h1>
            <div id="phrase">IL REVIENT ET IL EST PAS CONTENT ! MYTHONÉ EN PHP ET MYSQL.</div>
        </div>
        <?php require_once 'inc/html_double_sep.php'?>
    </header>

    <main>
        <?php
        if (isset($_GET['err'])){
            switch ($_GET['err']){
                case 1:
                    echo '<div class="error">Erreur d\'identification</div>';
            }
        }
        ?>
        <form method="post" action="/scripts/php/login.php" id="login-form">
            <div class="input">
                <label for="login">Identifiant</label>
                <input type="text" name="login" id="login">
            </div>

            <div class="input">
                <label for="passwd">Mot de passe</label>
                <input type="password" name="passwd" id="passwd">
            </div>

            <input type="submit">
        </form>
    </main>
</body>
</html>