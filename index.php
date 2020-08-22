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
                <h1 class="fake-logo"><a href="/">FAKE NEWS II</a></h1>
                <div id="index-phrase" class="phrase">
                    <?php
                    require_once 'classes/PDOSetting.php';

                    //Récuperation et affichage du sous titre
                    $pdo_sett = new PDOSetting();
                    $setting = $pdo_sett->GetSetting(INDEX_PHRASE_ID);
                    require_once 'inc/subtitle.php';
                    ?>

                </div>

            </div>

            <?php require_once 'inc/double_sep.php' ?>

        </header>
        <main>
            <section class="latest-new container">

                <?php
                //Gestion des erreurs
                if (isset($_GET['err']) && !empty($_GET['err'])){
                    require_once 'classes/Html.php';

                    switch (($_GET['err'])){

                        case 1:
                            $mess = 'Erreur lors du chargement de l\'article';
                            break;

                        default:
                            $mess = 'Une erreur est survenue, veuillez réessayer !';
                    }
                    $html = new Html('div', ['class'=>'error'], $mess);
                }
                ?>

                <h2>LES DERNIÈRES <strong>FAKE NEWS</strong>!</h2>

                <div class="flex-article">
                    <?php
                    require_once 'classes/PDOArticle.php';

                    //Recuperation des 3 derniers articles
                    $pdoArticle = new PDOArticle();
                    $articles = $pdoArticle->GetArticles(3);

                    foreach ($articles as $article){
                        if (get_class($article) == 'Article'){
                                echo $article->ToStrHomePreview();
                        }
                    }

                    //Si aucun article ou erreur de connexion ou de requete
                    if (!$articles): ?>
                        <div class="error">
                            Impossible d'afficher les derniers articles, veuillez réessayer ulterieurement.
                        </div>
                    <?php endif; ?>

                </div>

                <button>
                    <a href="/trucs_en_toc.php"><i class="far fa-file"></i> J'EN VEUX ENCORE !</a>
                </button>
            </section>

            <aside class="citation">

                <?php include 'inc/simple_sep.php' ?>

                <IMG src="imgs/banner.jpg" alt="banniere">
                <div class="center container">
                    "ON PEUT TROMPER UNE FOIS MILLE PERSONNES, MAIS ON NE PEUT PAS TROMPER MILLE FOIS UNE PERSONNE."
                    - ÉMILE
                </div>

                <?php include 'inc/simple_sep.php' ?>

            </aside>
        </main>

        <?php require_once 'inc/footer.php'; ?>

    </div>
    <script type="application/javascript" src="scripts/js/menu_deployment.js"></script>
    <script type="application/javascript" src="scripts/js/article_link.js"></script>

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