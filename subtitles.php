<!DOCTYPE html>
<html lang="fr">
<?php
require_once 'assets/inc/global.php';
require_once 'assets/inc/html_head.php';


//Si aucun utilisateur connecté ou non administrateur, redirection vers la page d'accueil
if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin']
    && isset($_SESSION['role']) && ($_SESSION['role'] == ADMIN || $_SESSION['role'] == REDAC))){

    header('Location: /');
}
?>

<body>
    <div class="wrapper">

        <!-- Bouton de déploiement du menu -->
        <?php require_once 'assets/inc/burger_btn.php'; ?>

        <header class="container">

            <!-- Menu de navigation -->
            <?php require_once 'assets/inc/nav.php'; ?>

            <div class="title">
                <div class="fake-logo">
                    <a href="/">Fake News II</a>
                </div>

                <div id="admin-phrase" class="phrase">

                    <?php
                    require_once 'classes/PDOSetting.php';

                    //Récupération et affichage du sous titre
                    $pdo_sett = new PDOSetting();
                    $setting = $pdo_sett->GetSetting(ADMIN_PHRASE_ID);
                    require_once 'assets/inc/subtitle.php';
                    ?>

                </div>

            </div>

            <?php include 'assets/inc/separator_double.php' ?>

        </header>
        <main>
            <section class="container">
                <h1>Gestion des sous-titres des pages</h1>

                <div class="subtitle subtitle-header">
                    <span class="subtitle-name">Page</span>
                    <span class="subtitle-value">Phrase</span>
                </div>

                <?php
                require_once 'classes/PDOSetting.php';

                $pdo_set = new PDOSetting();
                $settings = $pdo_set->GetAllSettings();

                foreach ($settings as $setting){
                    if ($setting && get_class($setting) == 'Setting'){
                        echo $setting->__toString();
                    }
                }
                ?>

            </section>
        </main>

        <?php require_once 'assets/inc/footer.php'; ?>

    </div>
    <script type="application/javascript" src="assets/scripts/js/menu_deployment.js"></script>

</body>
</html>