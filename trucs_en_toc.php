<!DOCTYPE html>
<html lang="fr">
<?php
require_once 'inc/html_head.php';
require_once 'inc/global.php';
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

                <h1>TRUCS EN TOC</h1>

                <div id="truc-phrase" class="phrase">
                    <?php
                    require_once 'classes/PDOSetting.php';


                    //Récupération et affichage du sous titre
                    $pdo_sett = new PDOSetting();
                    $setting = $pdo_sett->GetSetting(TRUC_PHRASE_ID);
                    require_once 'inc/subtitle.php';
                    ?>
                </div>
            </div>

            <?php include 'inc/double_sep.php' ?>

        </header>
        <main>
            <section class="latest-news container">
                <div>
                    <?php echo ADD_LOGO ?>
                </div>

                <?php
                require_once 'classes/PDOArticle.php';

                //Recuperation de tous les articles
                $pdoArticle = new PDOArticle();
                $articles = $pdoArticle->GetArticles();

                if (get_class($articles[0]) == 'Article'){

                    foreach ($articles as $index => $article){
                        echo $article->ToStrTrucsPreview();

                        //Ajout d'un trait de séparation après tous les articles sauf le dernier
                        if ($index < count($articles) - 1){
                            include 'inc/simple_sep.php';
                        }
                    }
                }
                //TODO pages de navigation (1,2,3,4,...) via GET
                //  ou bouton afficher la suite (JS+AJAX)

                //Si aucun article ou erreur de connexion ou de requete
                if (!$articles): ?>
                    <div class="error">
                        Impossible d'afficher les articles, veuillez réessayer ulterieurement.
                    </div>
                <?php endif; ?>

            </section>
        </main>

        <?php require_once 'inc/footer.php'; ?>

    </div>
    <script type="application/javascript" src="scripts/js/menu_deployment.js"></script>

    <?php
    //Si utilisateur connecté en tant qu'admin ou redac,
    // ajout du script permettant la modification d'éléments
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] && isset($_SESSION['role'])
        && ($_SESSION['role'] == 'administrator' || $_SESSION['role'] == 'redactor')){

        echo ADMINISTRATION_SCRIPT;
    }
    ?>

</body>
</html>