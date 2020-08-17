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
                    echo $setting->getValue();

                    //Si utilisateur connecté en tant qu'admin ou redac,
                    // affichage du logo de modification
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] &&
                            isset($_SESSION['role']) &&
                            ($_SESSION['role'] == 'administrator' || $_SESSION['role'] == 'redactor')){
                        echo MOD_LOGO;
                    }
                    ?>
                </div>
            </div>
            <?php require_once 'inc/double_sep.php' ?>
        </header>
        <main>
            <section class="latest-news container">
                <div>
                    <?php echo ADD_LOGO ?>
                </div>
                <?php
                require_once 'classes/PDOArticle.php';

                //TODO ajouter un article

                //Recuperation de tous les articles
                $pdoArticle = new PDOArticle();
                $res = $pdoArticle->GetArticles();

                if (get_class($res[0]) == 'Article'){

                    foreach ($res as $index => $article){
                        $article->ToStrTrucsPreview();

                        //Ajout d'un trait de séparation après tous
                        // les articles sauf le dernier
                        if ($index < count($res) - 1){
                            echo '<div>';
                            include 'inc/simple_sep.php';
                            echo '</div>';
                        }
                    }
                }
                //TODO pages de navigation (1,2,3,4,...) via GET
                //  ou bouton afficher la suite (JS+AJAX)

                //Si aucun article ou erreur de connexion ou de requete
                if (!$res): ?>
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
    if (IS_REDAC){
        echo ADMINISTRATION_SCRIPT;
    }
    ?>
</body>
</html>