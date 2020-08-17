<!DOCTYPE html>
<html lang="fr">
<?php
require_once 'inc/global.php';
if (!IS_ADMIN){
    header('Location: /');
}

require_once 'inc/html_head.php';
?>

<body>
    <div class="wrapper">

        <!-- Bouton de déploiement du menu -->
        <?php require_once 'inc/burger_btn.php'; ?>

        <header class="container">

            <!-- Menu de navigation -->
            <?php require_once 'inc/nav.php'; ?>

            <div class="title">
                <div class="fake-logo">
                    <a href="/">Fake News II</a>
                </div>

                <div id="index-phrase" class="phrase">
                    <?php
                    require_once 'classes/PDOSetting.php';

                    //Récuperation et affichage du sous titre
                    $pdo_sett = new PDOSetting();
                    $setting = $pdo_sett->GetSetting(INDEX_PHRASE_ID);
                    echo $setting->getValue();
                    ?>
                </div>

            </div>

            <?php require_once 'inc/double_sep.php' ?>

        </header>
        <main>
            <section class="container">
                <h1>Gestion des utilisateurs</h1>

                <?php
                require_once 'classes/PDOUser.php';

                $pdo_user = new PDOUser();
                $users = $pdo_user->GetAllUsers();
                $pdo_user->UsersToHTML($users);

                ?>

            </section>
        </main>

        <?php require_once 'inc/footer.php'; ?>

    </div>
    <script type="application/javascript" src="scripts/js/menu_deployment.js"></script>
</body>
</html>