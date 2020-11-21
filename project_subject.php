<!DOCTYPE html>
<html lang="fr">
<?php
require_once 'assets/inc/html_head.php';
require_once 'assets/inc/global.php';
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

                <h1>SUJET DU PROJET</h1>
            </div>

            <?php include 'assets/inc/separator_double.php' ?>

        </header>

        <main class="container">
            <div>
                <iframe src="assets/subject/Projet-Fake-News-II-Cahier-des-charges.pdf" width="100%" height="1000px"></iframe>
            </div>
        </main>

        <?php require_once 'assets/inc/footer.php'; ?>

    </div>
    <script type="application/javascript" src="assets/scripts/js/menu_deployment.js"></script>
    <script type="application/javascript" src="assets/scripts/js/article_link.js"></script>

    <?php
    //Si utilisateur connecté en tant qu'admin ou redac,
    // Ajout du script d'administration, permet à certains logo d'administration de fonctionner
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] && isset($_SESSION['role'])
        && ($_SESSION['role'] == 'administrator' || $_SESSION['role'] == 'redactor')){

        echo ADMINISTRATION_SCRIPT;
    }
    ?>

</body>
</html>