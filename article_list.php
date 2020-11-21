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

                <h1>TRUCS EN TOC</h1>

                <div id="truc-phrase" class="phrase">
                    <?php
                    require_once 'classes/PDOSetting.php';


                    //Récupération et affichage du sous titre
                    $pdo_sett = new PDOSetting();
                    $setting = $pdo_sett->GetSetting(TRUC_PHRASE_ID);
                    require_once 'assets/inc/subtitle.php';
                    ?>
                </div>
            </div>

            <?php include 'assets/inc/separator_double.php' ?>

        </header>
        <main>
            <section class="latest-news container">

                <?php
                //Gestion des erreurs
                if (isset($_GET['err']) && !empty($_GET['err'])){
                    require_once 'classes/Html.php';

                    switch (($_GET['err'])){

                        case 25:
                            $mess = 'Erreur lors de la suppression de l\'article';
                            break;

                        default:
                            $mess = 'Une erreur est survenue, veuillez réessayer !';
                    }
                    $html = new Html('div', ['class'=>'error'], $mess);
                }
                ?>

                <div>
<!--                    --><?php
//                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] && isset($_SESSION['role'])
//                    && ($_SESSION['role'] == 'administrator' || $_SESSION['role'] == 'redactor')){
//                        echo ADD_LOGO;
//                    }
//                    ?>
                </div>

                <?php
                require_once 'classes/PDOArticle.php';

                //Recuperation de tous les articles
                $pdoArticle = new PDOArticle();
                $articles = $pdoArticle->GetArticles();

                if ($articles[0] && get_class($articles[0]) == 'Article'){

                    foreach ($articles as $index => $article){
                        echo $article->ToStrTrucsPreview();

                        //Ajout d'un trait de séparation après tous les articles sauf le dernier
                        if ($index < count($articles) - 1){
                            include 'assets/inc/separator_simple.php';
                        }
                    }
                }

                //Si aucun article ou erreur de connexion ou de requete
                if (!$articles): ?>
                    <div class="error">
                        Impossible d'afficher les articles, veuillez réessayer ulterieurement.
                    </div>
                <?php endif; ?>

            </section>
        </main>

        <?php require_once 'assets/inc/footer.php'; ?>

    </div>
    <script type="application/javascript" src="assets/scripts/js/menu_deployment.js"></script>

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